<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function AllUsers()
    {
        $allUsers = DB::table('users')
        ->join('users', 'users.id', '=', 'profiles.user_id')
        ->join('departments', 'departments.id', '=', 'profiles.dept_id')
        //->where('profiles.index_number', $request->index_number)
        ->select('users.id AS id', 'name', 'email', 'dept_name', 'profile_photo', 'index_number', 'is_admin')
        ->get();

        //$allUsers = User::whereBetween('created_at', [date("Y-m-d ", strtotime('2024-02-10')), date("Y-m-d ", strtotime('2024-08-20'))])->get();
        
        //dd($allUsers);
        return view('admin.reports.all_users', compact('allUsers'));
    }

    public function getUserInfo()
    {
        return view('admin.reports.get_user_info');
    }

    public function getDateRangeFilter()
    {
        $users = User::all();

        return view('admin.reports.get_users_by_date_range', compact('users'));
    }

    public function getUsersByDateRange(Request $request)
    {
        // Get the start and end date from the request
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Retrieve users created within the specified date range
        $users = User::whereBetween('created_at', [$startDate, $endDate])->get();

        //dd($users);

        // Return the users, either as a JSON response or pass to a view
        return view('admin.reports.get_users_by_date_range', compact('users'));
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
