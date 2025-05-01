<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AcademicDetailsController extends Controller
{
    // Sessions Methods
    public function sessions()
    {
        $sessions = session('academic_sessions', []);
        return view('admin.session', compact('sessions'));
    }

    public function addSession()
    {
        return view('admin.add-session');
    }

    public function storeSession(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $sessions = session('academic_sessions', []);
        $newId = count($sessions) + 1;
        
        $newSession = [
            'id' => $newId,
            'name' => $request->name,
            'description' => $request->description ?? '',
            'is_active' => $request->has('is_active') ? true : false,
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString()
        ];
        
        $sessions[] = $newSession;
        session(['academic_sessions' => $sessions]);

        return redirect()->route('admin.sessions')->with('success', 'Session added successfully');
    }

    public function updateSession(Request $request, $academicSession)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $sessions = session('academic_sessions', []);
        $sessionIndex = collect($sessions)->search(function($item) use ($academicSession) {
            return $item['id'] == $academicSession;
        });
        
        if ($sessionIndex !== false) {
            $sessions[$sessionIndex]['name'] = $request->name;
            $sessions[$sessionIndex]['description'] = $request->description ?? '';
            $sessions[$sessionIndex]['is_active'] = $request->has('is_active') ? true : false;
            $sessions[$sessionIndex]['updated_at'] = now()->toDateTimeString();
            
            session(['academic_sessions' => $sessions]);
        }

        return redirect()->route('admin.sessions')->with('success', 'Session updated successfully');
    }

    public function destroySession($academicSession)
    {
        $sessions = session('academic_sessions', []);
        $departments = session('departments', []);
        
        // Check if session has departments
        $hasDepartments = collect($departments)->contains(function($item) use ($academicSession) {
            return $item['academic_session_id'] == $academicSession;
        });
        
        if ($hasDepartments) {
            return redirect()->back()->with('error', 'Cannot delete this session as it has departments associated with it');
        }
        
        $filteredSessions = collect($sessions)->filter(function($item) use ($academicSession) {
            return $item['id'] != $academicSession;
        })->values()->all();
        
        session(['academic_sessions' => $filteredSessions]);

        return redirect()->route('admin.sessions')->with('success', 'Session deleted successfully');
    }

    // Departments Methods
    public function departments()
    {
        $departments = session('departments', []);
        $sessions = session('academic_sessions', []);
        
        // Add session info to each department
        $departmentsWithSessions = collect($departments)->map(function($dept) use ($sessions) {
            $session = collect($sessions)->firstWhere('id', $dept['academic_session_id']);
            $dept['academic_session'] = $session ?? null;
            return $dept;
        })->all();
        
        return view('admin.department', ['departments' => $departmentsWithSessions]);
    }

    public function addDepartment()
    {
        $sessions = session('academic_sessions', []);
        return view('admin.add-department', compact('sessions'));
    }

    public function storeDepartment(Request $request)
    {
        $request->validate([
            'academic_session_id' => 'required',
            'name' => 'required|string|max:255'
        ]);

        $departments = session('departments', []);
        $newId = count($departments) + 1;
        
        $newDepartment = [
            'id' => $newId,
            'academic_session_id' => $request->academic_session_id,
            'name' => $request->name,
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString()
        ];
        
        $departments[] = $newDepartment;
        session(['departments' => $departments]);

        return redirect()->route('admin.departments')->with('success', 'Department added successfully');
    }

    public function updateDepartment(Request $request, $department)
    {
        $request->validate([
            'academic_session_id' => 'required',
            'name' => 'required|string|max:255'
        ]);

        $departments = session('departments', []);
        $departmentIndex = collect($departments)->search(function($item) use ($department) {
            return $item['id'] == $department;
        });
        
        if ($departmentIndex !== false) {
            $departments[$departmentIndex]['academic_session_id'] = $request->academic_session_id;
            $departments[$departmentIndex]['name'] = $request->name;
            $departments[$departmentIndex]['updated_at'] = now()->toDateTimeString();
            
            session(['departments' => $departments]);
        }

        return redirect()->route('admin.departments')->with('success', 'Department updated successfully');
    }

    public function destroyDepartment($department)
    {
        $departments = session('departments', []);
        $semesters = session('semesters', []);
        
        // Check if department has semesters
        $hasSemesters = collect($semesters)->contains(function($item) use ($department) {
            return $item['department_id'] == $department;
        });
        
        if ($hasSemesters) {
            return redirect()->back()->with('error', 'Cannot delete this department as it has semesters associated with it');
        }
        
        $filteredDepartments = collect($departments)->filter(function($item) use ($department) {
            return $item['id'] != $department;
        })->values()->all();
        
        session(['departments' => $filteredDepartments]);

        return redirect()->route('admin.departments')->with('success', 'Department deleted successfully');
    }

    public function getDepartmentsBySession($sessionId)
    {
        $departments = session('departments', []);
        $filteredDepartments = collect($departments)->where('academic_session_id', $sessionId)->values()->all();
        
        return response()->json($filteredDepartments);
    }

    // Semesters Methods
    public function semesters()
    {
        $semesters = session('semesters', []);
        $departments = session('departments', []);
        $sessions = session('academic_sessions', []);
        
        // Add department and session info to each semester
        $semestersWithDetails = collect($semesters)->map(function($sem) use ($departments, $sessions) {
            $department = collect($departments)->firstWhere('id', $sem['department_id']);
            $sem['department'] = $department ?? null;
            
            if ($department) {
                $academicSession = collect($sessions)->firstWhere('id', $department['academic_session_id']);
                $sem['department']['academicSession'] = $academicSession ?? null;
            }
            
            return $sem;
        })->all();
        
        return view('admin.semester', ['semesters' => $semestersWithDetails]);
    }

    public function addSemester()
    {
        $sessions = session('academic_sessions', []);
        $departments = session('departments', []);
        return view('admin.add-semester', compact('sessions', 'departments'));
    }

    public function storeSemester(Request $request)
    {
        $request->validate([
            'department_id' => 'required',
            'type' => 'required|in:odd,even',
            'months' => 'required|array|min:1'
        ]);

        $semesters = session('semesters', []);
        $newId = count($semesters) + 1;
        
        $newSemester = [
            'id' => $newId,
            'department_id' => $request->department_id,
            'type' => $request->type,
            'months' => $request->months,
            'is_active' => true,
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString()
        ];
        
        $semesters[] = $newSemester;
        session(['semesters' => $semesters]);

        return redirect()->route('admin.semesters')->with('success', 'Semester added successfully');
    }

    public function updateSemester(Request $request, $semester)
    {
        $request->validate([
            'department_id' => 'required',
            'type' => 'required|in:odd,even',
            'months' => 'required|array|min:1'
        ]);

        $semesters = session('semesters', []);
        $semesterIndex = collect($semesters)->search(function($item) use ($semester) {
            return $item['id'] == $semester;
        });
        
        if ($semesterIndex !== false) {
            $semesters[$semesterIndex]['department_id'] = $request->department_id;
            $semesters[$semesterIndex]['type'] = $request->type;
            $semesters[$semesterIndex]['months'] = $request->months;
            $semesters[$semesterIndex]['is_active'] = true;
            $semesters[$semesterIndex]['updated_at'] = now()->toDateTimeString();
            
            session(['semesters' => $semesters]);
        }

        return redirect()->route('admin.semesters')->with('success', 'Semester updated successfully');
    }

    public function destroySemester($semester)
    {
        $semesters = session('semesters', []);
        
        $filteredSemesters = collect($semesters)->filter(function($item) use ($semester) {
            return $item['id'] != $semester;
        })->values()->all();
        
        session(['semesters' => $filteredSemesters]);

        return redirect()->route('admin.semesters')->with('success', 'Semester deleted successfully');
    }
} 