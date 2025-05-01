<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function adminUser()
    {
        $users = DB::table('users')
            ->select('users.*', 'department.department_name')
            ->leftJoin('department', 'users.department', '=', 'department.id')
            ->whereIn('users.usertype', ['Admin', 'Mentor'])
            ->orderBy('users.name', 'asc')
            ->paginate(5);

        return view('admin.users', ['users' => $users]);
    }


    public function addUser(){
        $departments = DB::table('department')->orderBy('department_name','asc')->get();
        return view('admin.add-user', ['departments' => $departments]);
    }


    public function addUserStore(Request $request){
        $validate = $request->validate([
            'department' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|lowercase|email|unique:users,email',
            'contact' => 'required|digits:10',
            'password' => [
            'required',
            'string',
            'min:8',
            'max:20',
            'regex:/[a-z]/',
            'regex:/[A-Z]/',
            'regex:/[0-9]/',
            'regex:/[@$!%*?&]/',

        ],
            'confirm_password' => 'required|string|same:password',
            'usertype' => 'required'
        ]);

        $currentDate = Carbon::now()->format('Y-m-d');

       DB::table('users')->insert([
        'department' => $validate['department'],
        'name' => $validate['name'],
        'email' => $validate['email'],
        'contact' => $validate['contact'],
        'password' => Hash::make($validate['password']),
        'usertype' => $validate['usertype'],
        'created_at' => $currentDate
       ]);


       return redirect()->route('admin_user')->with('success','User added successfully!');
    }


    public function userDelete($id){
        $id = decrypt($id);

        DB::table('users')->where('id',$id)->delete();
        return redirect()->route('admin_user')->with('success','User deleted successfully!');
    }


    public function resetPassword($id){
        $id = decrypt($id);
        $user = DB::table('users')->select('id','name')->where('id',$id)->first();
        // dd($user);
        return view('admin.user-change-password', ['user' => $user]);
    }

    public function resetPasswordStore(Request $request, $id){
        $id = decrypt($id);

        $validate = $request->validate([
            'password' => [
                'required',
                'string',
                'min:8',
                'max:20',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*?&]/',

            ],
                'confirm_password' => 'required|string|same:password',
        ]);

        $currentDate = Carbon::now()->format('Y-m-d');

        DB::table('users')->where('id',$id)->update([
            'password' => Hash::make($validate['password']),
            'updated_at' => $currentDate
        ]);

        return redirect()->route('admin_user')->with('success','Password has been successfully updated!');

    }
}
