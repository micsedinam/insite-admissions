<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function AllUsers()
    {
        $allUsers = DB::table('profiles')
        ->join('users', 'users.id', '=', 'profiles.user_id')
        ->join('departments', 'departments.id', '=', 'profiles.dept_id')
        //->where('profiles.index_number', $request->index_number)
        ->select('users.id AS id', 'name', 'email', 'dept_name', 'profile_photo', 'index_number', 'is_admin')
        ->get();
        
        return view('admin.reports.all_users', compact('allUsers'));
    }

    public function getUserInfo()
    {
        return view('admin.reports.get_user_info');
    }

    public function getUser(Request $request)
    {
        $getUser = DB::table('profiles')
        ->join('users', 'users.id', '=', 'profiles.user_id')
        ->join('departments', 'departments.id', '=', 'profiles.dept_id')
        ->where('profiles.index_number', $request->index_number)
        ->select('name', 'email', 'dept_name', 'profile_photo', 'index_number')
        ->first();

        return view('admin.reports.get_user_info', compact('getUser'));
    }
}
