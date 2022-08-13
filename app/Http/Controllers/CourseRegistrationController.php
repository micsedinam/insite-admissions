<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class CourseRegistrationController extends Controller
{
    public function index()
    {
        return view('student.course_registration.register');
    }

    public function getCourses(Request $request)
    {
        //dd($request->all());
        $dept = Profile::where('user_id', $request['user_id'])->select('dept_id')->get()->toArray();
        //$level = Profile::where('user_id', $request['user_id'])->select('level')->get()->toArray();

        //dd($dept[0]['dept_id']);
        //dd($level[0]['level']);

        $details = DB::table('profiles')
                    ->join('users', 'users.id', '=', 'profiles.user_id')
                    ->join('departments', 'departments.id', '=', 'profiles.dept_id')
                    ->where('profiles.user_id', $request['user_id'])
                    ->select('name', 'dept_name', 'profile_photo', 'index_number', 'level')
                    ->first();

        //dd($details);

        $get_courses = DB::table('courses')
                    ->join('profiles', 'profiles.level', '=', 'courses.level')
                    ->join('users', 'users.id', '=', 'profiles.user_id')
                    ->join('departments', 'departments.id', '=', 'profiles.dept_id')
                    ->where('profiles.user_id', $request['user_id'])
                    ->where('courses.dept_id', $dept[0]['dept_id'])
                    ->get();

        $total_credit_hours = DB::table('courses')
                        ->join('profiles', 'profiles.level', '=', 'courses.level')
                        ->where('profiles.user_id', $request['user_id'])
                        ->where('courses.dept_id', $dept[0]['dept_id'])
                        ->select('credit_hours')
                        ->sum('credit_hours');
        

        //dd($total_credit_hours);
        return view('student.course_registration.course_list', compact('get_courses', 'total_credit_hours', 'details'));
    }

    public function Export(Request $request){

        $dept = Profile::where('user_id', Auth::id())->select('dept_id')->get()->toArray();

        $details = DB::table('profiles')
                    ->join('users', 'users.id', '=', 'profiles.user_id')
                    ->join('departments', 'departments.id', '=', 'profiles.dept_id')
                    ->where('profiles.user_id', Auth::id())
                    ->select('name', 'dept_name', 'profile_photo', 'index_number', 'level')
                    ->first();

        $get_courses = DB::table('courses')
                    ->join('profiles', 'profiles.level', '=', 'courses.level')
                    ->join('users', 'users.id', '=', 'profiles.user_id')
                    ->join('departments', 'departments.id', '=', 'profiles.dept_id')
                    ->where('profiles.user_id', Auth::id())
                    ->where('courses.dept_id', $dept[0]['dept_id'])
                    ->get();

        $total_credit_hours = DB::table('courses')
                        ->join('profiles', 'profiles.level', '=', 'courses.level')
                        ->where('profiles.user_id', Auth::id())
                        ->where('courses.dept_id', $dept[0]['dept_id'])
                        ->select('credit_hours')
                        ->sum('credit_hours');
        
   
        if($request->get("export")==1){
           $pdf = Pdf::loadView('student.course_registration.export', compact('get_courses', 'total_credit_hours', 'details'));
           
           return $pdf->download(Auth::user()->name.'semester_courses.pdf');
        }
        //return redirect()->back();
        return view('student.course_registration.export', compact('get_courses', 'total_credit_hours', 'details'));
    }


}