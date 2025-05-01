<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssignedmentorController extends Controller
{

    public function viewAssignMentees(){

        $mentorEmail = session('email'); // or session()->get('email')

    // Get mentor's ID using the email (you can also store and use ID directly from session if available)
    $mentor = DB::table('users')->where('email', $mentorEmail)->first();

        $assignedData = DB::table('assigned_mentor')
        ->select(
            'assigned_mentor.id',
            'mentor_users.name as mentor_name',
            'mentee_users.name as mentee_name',
            'mentee_users.email as mentee_email',
            'student_details.session',
            'department.department_name as department_name'
        )
        ->join('users as mentor_users', 'assigned_mentor.mentor_id', '=', 'mentor_users.id')
        ->join('student_details', 'assigned_mentor.mentee_id', '=', 'student_details.id')
        ->join('users as mentee_users', 'student_details.user_id', '=', 'mentee_users.id')
        ->join('department', 'mentee_users.department', '=', 'department.id')
        ->where('assigned_mentor.mentor_id', $mentor->id)
        ->orderBy('assigned_mentor.id', 'desc')
        ->get();

        return view('admin.view-assign-mentees', ['assignedData' => $assignedData]);
    }


    public function viewAssignedMentor(){

        $assignedData = DB::table('assigned_mentor')
        ->select(
            'assigned_mentor.id',
            'mentor_users.name as mentor_name',
            'mentee_users.name as mentee_name',
            'mentee_users.email as mentee_email',
            'student_details.session',
            'department.department_name as department_name'
        )
        ->join('users as mentor_users', 'assigned_mentor.mentor_id', '=', 'mentor_users.id')
        ->join('student_details', 'assigned_mentor.mentee_id', '=', 'student_details.id')
        ->join('users as mentee_users', 'student_details.user_id', '=', 'mentee_users.id')
        ->join('department', 'mentee_users.department', '=', 'department.id')
        ->orderBy('assigned_mentor.id', 'desc')
        ->get();


        // dd($assignedData);
        return view('admin.view-assigned-mentors', ['assignedData' => $assignedData]);
    }

    public function assignMentor(){

        $mentors = DB::table('users')->where('usertype','Mentor')->orderBy('name','asc')->get();
        // dd($mentors);
        $mentees = DB::table('student_details')->select('student_details.id','student_details.session','users.id AS userid','users.name','users.email','users.contact','department.department_name')
        ->join('users','student_details.user_id','=','users.id')
        ->join('department','users.department','=','department.id')
        ->orderBy('department.department_name','asc')->get();
        // dd($mentees);

        $departments = DB::table('department')->orderBy('department_name','asc')->get();
        $sessions = DB::table('student_details')
        ->select('session')
        ->distinct()
        ->get();

        $assignedMentees = DB::table('assigned_mentor')
        ->pluck('mentee_id')
        ->toArray();


        return view('admin.assign-mentor',['mentors' => $mentors, 'mentees' => $mentees, 'departments' => $departments, 'sessions' => $sessions, 'assignedMentees' => $assignedMentees]);
    }


    public function filterMentees(Request $request)
{
    $mentees = DB::table('student_details')
        ->select('student_details.id', 'student_details.session', 'users.id AS userid', 'users.name', 'users.email', 'department.department_name')
        ->join('users', 'student_details.user_id', '=', 'users.id')
        ->join('department', 'users.department', '=', 'department.id');
        // $mentor = null;

    if ($request->department) {
        $mentees->where('users.department', $request->department);
    }

    if ($request->session) {
        $mentees->where('student_details.session', $request->session);
    }

    // if ($request->mentorId) {
    //     $mentees->where('users.id', $request->mentorId);
    // }

    $mentees = $mentees->orderBy('users.name', 'asc')->get();
    // dd($mentees);

    $assignedMentees = DB::table('assigned_mentor')
    ->pluck('mentee_id')
    ->toArray();

    return response()->json([
        'mentees' => $mentees,
        'assignedMentees' => $assignedMentees,
    ]);
}


    public function assignMentorStore(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'mentor' => 'required|exists:users,id',
            'mentee_ids' => 'required|json',
        ]);

        $mentorId = $request->mentor;
        $menteeIds = json_decode($request->mentee_ids, true);

        foreach ($menteeIds as $menteeId) {
            DB::table('assigned_mentor')->insert([
                'mentor_id' => $mentorId,
                'mentee_id' => $menteeId,
                'created_at' => now(),
            ]);
        }

        return redirect()->route('view_assign_mentors')->with('success', 'Mentees assigned successfully!');
    }


    public function assignMentorDelete($id){
        $id = decrypt($id);
        DB::table('assigned_mentor')->where('id',$id)->delete();
        return redirect()->route('view_assign_mentors')->with('success','The assigned mentor has been successfully removed.');
    }


    public function bulkDelete(Request $request){
        $request->validate([
            'selected_ids' => 'required|array|min:1',
            'selected_ids.*' => 'integer',
        ]);


      $deletedCount  =  DB::table('assigned_mentor')->whereIn('id', $request->selected_ids)->delete();

        return redirect()->back()->with('success', '<strong>'.$deletedCount.'</strong>'.' - assigned mentees have been successfully removed from the system.');
    }

}
