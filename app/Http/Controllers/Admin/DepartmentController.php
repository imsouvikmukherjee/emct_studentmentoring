<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    public function department(){

        $departments = DB::table('department')->orderBy('id','desc')->paginate(5);

        return view('admin.department', ['departments' => $departments]);
    }

    public function addDepartment(){
        return view('admin.add-department');
    }

    public function addDepartmentStore(Request $request){
        $validate = $request->validate([
            'department_name' => 'required|string|unique:department,department_name',
            'description' => 'nullable'
        ]);

        DB::table('department')->insert([
            'department_name' => $validate['department_name'],
            'description' => $validate['description']
        ]);

        return redirect()->route('department')->with('success','<strong>'.$validate['department_name'].'</strong> - Department added successfully');
    }


    // DepartmentController.php
public function destroy($id)
{
    $id = decrypt($id);
    DB::table('department')->where('id',$id)->delete();
    return redirect()->route('department')->with('success','Department Deleted Successfully!');
}

}
