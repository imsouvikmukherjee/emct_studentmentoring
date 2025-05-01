<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function adminDashboard(){

        $user = DB::table('users')->whereIn('usertype', ['Mentor', 'Admin'])->count();
        $mentee = DB::table('users')->where('usertype','Student')->count();

        return view('admin.index', ['user' => $user, 'mentee' => $mentee]);
    }
}
