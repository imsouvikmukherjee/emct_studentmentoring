<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Subject;
use App\Models\StudentDetail;
use App\Models\StudentSubject;

class SubjectController extends Controller
{
    public function subject(){
        // $subjects = Subject::with('department')
        //     ->orderBy('id', 'desc')
        //     ->paginate(10);
            // dd('echo');

        return view('admin.subjects');
    }

    public function addSubject(){
        $departments = DB::table('department')->orderBy('department_name','asc')->get();
        return view('admin.add-subject', ['departments' => $departments]);
    }

    public function addSubjectStore(Request $request){
        $validate = $request->validate([
            'department' => 'required',
            'name' => 'required|string|max:100',
            'code' => 'required|string|max:100',
            'semester' => 'required|integer|min:1|max:8',
            'session' => 'required|string|max:20',
            'type' => 'required|in:theory,practical,other',
            'description' => 'nullable|string',
            'other_description' => 'required_if:type,other',
            'credits' => 'required|integer|min:1|max:10'
        ]);

        // Create the subject
        $subject = new Subject();
        $subject->name = $validate['name'];
        $subject->code = $validate['code'];
        $subject->department_id = $validate['department'];
        $subject->semester = $validate['semester'];
        $subject->session = $validate['session'];
        $subject->type = $validate['type'];
        $subject->credits = $validate['credits'];

        // If subject type is 'other', include the description
        if($validate['type'] == 'other') {
            $subject->description = $validate['other_description'];
        } else {
            $subject->description = $validate['description'] ?? null;
        }

        $subject->save();

        return redirect()->route('subject')
            ->with('success', '<strong>'.$validate['name'].'</strong> - Subject added successfully');
    }

    public function subjectDelete($id){
        $id = decrypt($id);
        Subject::destroy($id);
        return redirect()->route('subject')
            ->with('success', 'Subject deleted successfully!');
    }

    public function assignSubjects() {
        $departments = DB::table('department')->orderBy('department_name', 'asc')->get();
        $subjects = [];

        return view('admin.assign-subjects', [
            'departments' => $departments,
            'subjects' => $subjects
        ]);
    }

    public function getStudentsByDepartment(Request $request) {
        $request->validate([
            'department_id' => 'required|exists:department,id',
            'session' => 'required|string'
        ]);

        $students = DB::table('student_details')
            ->select('student_details.id', 'student_details.reg_no', 'student_details.roll_no', 'users.name')
            ->join('users', 'student_details.user_id', '=', 'users.id')
            ->where('users.department', $request->department_id)
            ->where('student_details.session', $request->session)
            ->orderBy('users.name')
            ->get();

        return response()->json($students);
    }

    public function getSubjectsByDepartment(Request $request) {
        $request->validate([
            'department_id' => 'required|exists:department,id',
            'semester' => 'required|integer|min:1|max:8',
            'session' => 'required|string'
        ]);

        $subjects = Subject::where('department_id', $request->department_id)
            ->where('semester', $request->semester)
            ->where('session', $request->session)
            ->orderBy('name')
            ->get();

        return response()->json($subjects);
    }

    public function assignSubjectsStore(Request $request) {
        $validate = $request->validate([
            'department_id' => 'required|exists:department,id',
            'semester' => 'required|integer|min:1|max:8',
            'session' => 'required|string',
            'academic_year' => 'required|string',
            'student_ids' => 'required|array',
            'student_ids.*' => 'exists:student_details,id',
            'subject_ids' => 'required|array',
            'subject_ids.*' => 'exists:subjects,id'
        ]);

        $assignedCount = 0;

        foreach($validate['student_ids'] as $studentId) {
            foreach($validate['subject_ids'] as $subjectId) {
                // Check if assignment already exists
                $exists = StudentSubject::where('student_id', $studentId)
                    ->where('subject_id', $subjectId)
                    ->where('semester', $validate['semester'])
                    ->where('academic_year', $validate['academic_year'])
                    ->exists();

                if(!$exists) {
                    StudentSubject::create([
                        'student_id' => $studentId,
                        'subject_id' => $subjectId,
                        'semester' => $validate['semester'],
                        'academic_year' => $validate['academic_year']
                    ]);

                    $assignedCount++;
                }
            }
        }

        return redirect()->route('assign.subjects')
            ->with('success', $assignedCount . ' subject assignments created successfully!');
    }
}
