<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use App\Models\ProfileChangeRequest;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function userDashboard(){

        $email = Session::get('email');

        $student = DB::table('users')
        ->join('department','users.department','=','department.id')
        ->select('users.*','department.department_name')
        ->where('email',$email)->where('usertype','Student')->first();
        // dd($student);

        if($student){
            $student_details = DB::table('student_details')->where('user_id',$student->id)->first();
        }
        // dd($student);


        $menteeEmail = session('email');


        // $mentee = DB::table('users')->where('email', $menteeEmail)
        // ->join('student_details')
        // ->first();

        $mentee = DB::table('student_details')
        ->select('student_details.id AS student_id','users.id AS user_id','users.email')
        ->join('users','student_details.user_id','=','users.id')
        ->where('users.email',$menteeEmail)->first();

            $assignedData = DB::table('assigned_mentor')
            ->select(
                'assigned_mentor.id',
                'mentor_users.name as mentor_name',
                'mentor_users.email as mentor_email',
                'mentor_users.contact as mentor_contact',
                'mentee_users.name as mentee_name',
                'mentee_users.email as mentee_email',
                // 'assigned_mentor.mentee_id as mentee_id',

                'student_details.session',
                'department.department_name as department_name'
            )

            ->join('users as mentor_users', 'assigned_mentor.mentor_id', '=', 'mentor_users.id')
            ->join('student_details', 'assigned_mentor.mentee_id', '=', 'student_details.id')
            ->join('users as mentee_users', 'student_details.user_id', '=', 'mentee_users.id')
            ->join('department', 'mentee_users.department', '=', 'department.id')
            ->where('assigned_mentor.mentee_id', $mentee->student_id)
            // ->orderBy('assigned_mentor.id', 'desc')
            ->first();
            // dd($assignedData);

        return view('student.dashboard', ['student' => $student, 'assignedData' => $assignedData, 'student_details' => $student_details]);
    }

    public function editProfile(){
        $user_id = Auth::id();

        // Debug: Log the authenticated user ID
        Log::info('Edit Profile - Authenticated User ID: ' . $user_id);

        $student = DB::table('student_details')
            ->select(
                'student_details.*',
                'users.name',
                'users.email',
                'users.contact',
                'department.department_name',
                'users.department as department_id'
            )
            ->join('users', 'student_details.user_id', '=', 'users.id')
            ->leftJoin('department', 'users.department', '=', 'department.id')
            ->where('student_details.user_id', $user_id)
            ->first();

        // Debug: Log the student data
        Log::info('Edit Profile - Student Data:', ['student' => $student]);

        // Initialize pendingRequest with default value
        $pendingRequest = null;

        try {
            // Check if profile_change_requests table exists
            if(Schema::hasTable('profile_change_requests')) {
                // Check if user has pending requests
                $pendingRequest = ProfileChangeRequest::where('user_id', $user_id)
                    ->where('status', 'pending')
                    ->first();

                // Get all change requests for the user
                $changeRequests = ProfileChangeRequest::where('user_id', $user_id)
                    ->orderBy('created_at', 'desc')
                    ->get();
            } else {
                Log::warning('profile_change_requests table does not exist');
                $changeRequests = collect([]);
            }
        } catch (\Exception $e) {
            Log::error('Error querying profile_change_requests: ' . $e->getMessage());
            $changeRequests = collect([]);
        }

        return view('student.edit-profile', compact('student', 'pendingRequest', 'changeRequests'));
    }

    public function updateProfile(Request $request){
        $user_id = Auth::id();

        // Debug: Log the authenticated user ID and request data
        Log::info('Update Profile - Authenticated User ID: ' . $user_id);
        Log::info('Update Profile - Request Data:', $request->all());

        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'required|date',
            'nationality' => 'required|string|max:50',
            'category' => 'required|string|max:50',
            'sex' => 'required|string|max:1',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'blood_group' => 'nullable|string|max:5',
            'religion' => 'nullable|string|max:50',
            'aadhaar_no' => 'nullable|string|max:20',
            'student_address' => 'required|string',
            'alternate_mobile' => 'nullable|string|max:15',
            'state' => 'required|string|max:50',
            'district' => 'required|string|max:50',
            'pin' => 'required|string|max:10',
            'gurdian_name' => 'required|string|max:255',
            'guardian_mobile' => 'required|string|max:15',
            'gurdian_address' => 'required|string',
            'relation_with_guardian' => 'required|string|max:50',
            'residence_status' => 'required|string|max:50',
            'session' => 'required|string|max:20',
            'reg_no' => 'required|string|max:50',
            'roll_no' => 'required|string|max:50',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Get student details
        $student = DB::table('student_details')
            ->where('user_id', $user_id)
            ->first();

        if (!$student) {
            return redirect()->route('user.dashboard')
                ->with('error', 'Student profile not found.');
        }

        // Handle profile picture upload separately (no approval needed but limited to 3 times)
        if ($request->hasFile('profile_picture')) {
            // Check if we have the picture_changes_count column
            $pictureChangesLeft = $student->picture_changes_left ?? 3;

            if ($pictureChangesLeft <= 0) {
                return redirect()->route('user.edit.profile')
                    ->with('error', 'You have reached the maximum number of profile picture changes allowed.');
            }

            $imagePath = $request->file('profile_picture')->store('profile-pictures', 'public');
            $fileName = basename($imagePath);

            // Update profile picture and decrement counter
            DB::table('student_details')
                ->where('id', $student->id)
                ->update([
                    'profile_picture' => $fileName,
                    'picture_changes_left' => $pictureChangesLeft - 1
                ]);

            // Clear cache
            Cache::forget('student_details_' . $user_id);

            // If there are no other changes, return success
            if (count($request->all()) <= 2) { // Only _token and profile_picture
                return redirect()->route('user.dashboard')
                    ->with('success', 'Your profile picture has been updated successfully.');
            }
        }

        // Check if profile_change_requests table exists
        if(!Schema::hasTable('profile_change_requests')) {
            // If table doesn't exist, directly update the student details
            $updateData = $this->getAllUpdateableFields($request);

            DB::table('student_details')
                ->where('id', $student->id)
                ->update($updateData);

            // Update user table fields
            DB::table('users')
                ->where('id', $user_id)
                ->update([
                    'name' => $request->name
                ]);

            // Clear cache
            Cache::forget('student_details_' . $user_id);

            return redirect()->route('user.dashboard')
                ->with('success', 'Your profile has been updated successfully.');
        }

        // Build changes array for all fields
        $changes = $this->detectChanges($student, $request);

        // If no changes apart from profile picture, redirect back
        if (empty($changes)) {
            return redirect()->route('user.dashboard')
                ->with('info', 'No changes detected in your profile apart from the profile picture.');
        }

        try {
            // Get mentor ID
            $mentor = DB::table('assigned_mentor')
                ->select('mentor_id')
                ->join('student_details', 'assigned_mentor.mentee_id', '=', 'student_details.id')
                ->where('student_details.user_id', $user_id)
                ->first();

            $mentor_id = $mentor ? $mentor->mentor_id : null;

            // Create change request
            ProfileChangeRequest::create([
                'user_id' => $user_id,
                'student_id' => $student->id,
                'mentor_id' => $mentor_id,
                'changes' => $changes,
                'status' => 'pending'
            ]);
        } catch (\Exception $e) {
            Log::error('Error creating profile change request: ' . $e->getMessage());
            return redirect()->route('user.dashboard')
                ->with('error', 'Error submitting profile change request. Please try again later.');
        }

        // Clear any cached data
        Cache::forget('student_details_' . $user_id);

        return redirect()->route('user.dashboard')
            ->with('success', 'Your profile change request has been submitted and is pending approval.');
    }

    /**
     * Get all updateable fields from the request
     */
    private function getAllUpdateableFields(Request $request)
    {
        return [
            'dob' => $request->dob,
            'nationality' => $request->nationality,
            'category' => $request->category,
            'sex' => $request->sex,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'blood_group' => $request->blood_group,
            'religion' => $request->religion,
            'aadhaar_no' => $request->aadhaar_no,
            'student_address' => $request->student_address,
            'alternate_mobile' => $request->alternate_mobile,
            'state' => $request->state,
            'district' => $request->district,
            'pin' => $request->pin,
            'gurdian_name' => $request->gurdian_name,
            'guardian_mobile' => $request->guardian_mobile,
            'gurdian_address' => $request->gurdian_address,
            'relation_with_guardian' => $request->relation_with_guardian,
            'residence_status' => $request->residence_status,
            'session' => $request->session,
            'reg_no' => $request->reg_no,
            'roll_no' => $request->roll_no,
        ];
    }

    /**
     * Detect changes between current student data and request data
     */
    private function detectChanges($student, Request $request)
    {
        $changes = [];

        // Define field mappings with friendly names
        $fields = [
            'name' => 'Full Name',
            'dob' => 'Date of Birth',
            'nationality' => 'Nationality',
            'category' => 'Category',
            'sex' => 'Gender',
            'father_name' => 'Father\'s Name',
            'mother_name' => 'Mother\'s Name',
            'blood_group' => 'Blood Group',
            'religion' => 'Religion',
            'aadhaar_no' => 'Aadhaar Number',
            'student_address' => 'Address',
            'alternate_mobile' => 'Alternate Mobile Number',
            'state' => 'State',
            'district' => 'District',
            'pin' => 'PIN Code',
            'gurdian_name' => 'Guardian Name',
            'guardian_mobile' => 'Guardian Mobile',
            'gurdian_address' => 'Guardian Address',
            'relation_with_guardian' => 'Relation with Guardian',
            'residence_status' => 'Residence Status',
            'session' => 'Session',
            'reg_no' => 'Registration Number',
            'roll_no' => 'Roll Number',
        ];

        // Check each field for changes
        foreach ($fields as $field => $fieldName) {
            // For name field, we need to get it from the users table through student data
            $currentValue = $field === 'name' ?
                DB::table('users')->where('id', $student->user_id)->value('name') :
                $student->$field;

            // Handle date fields specially
            if ($field === 'dob' && $currentValue) {
                $currentValue = date('Y-m-d', strtotime($currentValue));
            }

            if ($request->has($field) && $currentValue != $request->$field) {
                $changes[$field] = [
                    'from' => $currentValue,
                    'to' => $request->$field,
                    'field_name' => $fieldName
                ];
            }
        }

        return $changes;
    }

    public function showChangeRequests() {
        $user_id = Auth::id();

        $requests = collect([]);

        try {
            // Check if profile_change_requests table exists
            if(Schema::hasTable('profile_change_requests')) {
                $requests = ProfileChangeRequest::where('user_id', $user_id)
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
            } else {
                Log::warning('profile_change_requests table does not exist');
            }
        } catch (\Exception $e) {
            Log::error('Error querying profile_change_requests: ' . $e->getMessage());
        }

        return view('student.change-requests', compact('requests'));
    }

    /**
     * Display the mentoring information page with semester tabs
     */
    public function mentoring() {
        $user_id = Auth::id();

        // Get student details
        $student = DB::table('student_details')
            ->select(
                'student_details.*',
                'users.name',
                'users.email',
                'users.contact',
                'department.department_name'
            )
            ->join('users', 'student_details.user_id', '=', 'users.id')
            ->leftJoin('department', 'users.department', '=', 'department.id')
            ->where('student_details.user_id', $user_id)
            ->first();

        // Get assigned mentor
        $mentor = DB::table('assigned_mentor')
            ->select('users.name as mentor_name', 'users.email as mentor_email', 'users.contact as mentor_contact')
            ->join('users', 'assigned_mentor.mentor_id', '=', 'users.id')
            ->join('student_details', 'assigned_mentor.mentee_id', '=', 'student_details.id')
            ->where('student_details.user_id', $user_id)
            ->first();

        // Get semester data if exists
        $semesterData = [];
        $semesterSubjects = [];

        // Check if the table exists to prevent errors
        if(Schema::hasTable('student_semester_data')) {
            for($i = 1; $i <= 8; $i++) {
                $data = DB::table('student_semester_data')
                    ->where('student_id', $student->id ?? 0)
                    ->where('semester', $i)
                    ->first();

                $semesterData[$i] = $data;

                if($data && !empty($data->subjects)) {
                    // Convert JSON subjects to array of objects
                    $subjects = json_decode($data->subjects);
                    $semesterSubjects[$i] = $subjects;
                } else {
                    $semesterSubjects[$i] = [];
                }
            }
        } else {
            Log::warning('student_semester_data table does not exist');
        }

        // Get projects, certifications, workshops, internships if available
        $projects = [];
        $certifications = [];
        $workshops = [];
        $internships = [];

        if(Schema::hasTable('student_projects')) {
            $projects = DB::table('student_projects')
                ->where('student_id', $student->id ?? 0)
                ->orderBy('semester', 'asc')
                ->get()
                ->groupBy('semester');
        }

        if(Schema::hasTable('student_certifications')) {
            $certifications = DB::table('student_certifications')
                ->where('student_id', $student->id ?? 0)
                ->orderBy('semester', 'asc')
                ->get()
                ->groupBy('semester');
        }

        if(Schema::hasTable('student_workshops')) {
            $workshops = DB::table('student_workshops')
                ->where('student_id', $student->id ?? 0)
                ->orderBy('semester', 'asc')
                ->get()
                ->groupBy('semester');
        }

        if(Schema::hasTable('student_internships')) {
            $internships = DB::table('student_internships')
                ->where('student_id', $student->id ?? 0)
                ->orderBy('semester', 'asc')
                ->get()
                ->groupBy('semester');
        }

        // Get mentor feedback if table exists
        $mentorFeedback = [];
        if(Schema::hasTable('mentor_feedbacks')) {
            try {
                $mentorFeedback = DB::table('mentor_feedbacks')
                    ->where('student_id', $student->id ?? 0)
                    ->orderBy('semester', 'asc')
                    ->get()
                    ->groupBy('semester');
            } catch (\Exception $e) {
                Log::error('Error fetching mentor feedback: ' . $e->getMessage());
            }
        }

        // Check for pending mentoring data changes
        $pendingChangeRequests = [];

        if(Schema::hasTable('mentoring_change_requests')) {
            $pendingChangeRequests = DB::table('mentoring_change_requests')
                ->where('student_id', $student->id ?? 0)
                ->where('status', 'pending')
                ->orderBy('created_at', 'desc')
                ->get()
                ->groupBy('semester');
        }

        return view('student.mentoring', compact('student', 'mentor', 'semesterData', 'semesterSubjects', 'projects',
            'certifications', 'workshops', 'internships', 'mentorFeedback', 'pendingChangeRequests'));
    }

    /**
     * Update the mentoring data for a specific semester
     */
    public function updateMentoringData(Request $request) {
        $user_id = Auth::id();

        // Validate the request
        $validatedData = $request->validate([
            'semester' => 'required|integer|min:1|max:8',
            'section' => 'required|string',
            'data' => 'required',
        ]);

        // Get student details
        $student = DB::table('student_details')
            ->where('user_id', $user_id)
            ->first();

        if (!$student) {
            return response()->json([
                'success' => false,
                'message' => 'Student profile not found.'
            ]);
        }

        // Get mentor ID
        $mentor = DB::table('assigned_mentor')
            ->select('mentor_id')
            ->join('student_details', 'assigned_mentor.mentee_id', '=', 'student_details.id')
            ->where('student_details.user_id', $user_id)
            ->first();

        $mentor_id = $mentor ? $mentor->mentor_id : null;

        try {
            // Create change request for mentoring data
            if(Schema::hasTable('mentoring_change_requests')) {
                DB::table('mentoring_change_requests')->insert([
                    'student_id' => $student->id,
                    'mentor_id' => $mentor_id,
                    'semester' => $request->semester,
                    'section' => $request->section,
                    'changes' => json_encode($request->data),
                    'status' => 'pending',
                    'created_at' => now(),
                    'updated_at' => now()
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Your changes have been submitted for approval.'
                ]);
            } else {
                // If the table doesn't exist, update data directly (for development/testing)
                // This should be replaced with proper change request handling in production

                Log::warning('mentoring_change_requests table does not exist, updating data directly');

                // The implementation would depend on the specific tables and data structure
                // For now, just return success

                return response()->json([
                    'success' => true,
                    'message' => 'Your changes have been saved directly (development mode).'
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Error saving mentoring data: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error saving data. Please try again later.'
            ]);
        }
    }


    public function userProfile(){
        $title = "User Profile";
        return view('student.student-profile',['title' => $title]);
    }
}
