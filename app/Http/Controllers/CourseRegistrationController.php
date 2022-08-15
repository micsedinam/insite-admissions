<?php

namespace App\Http\Controllers;

use App\Models\CourseRegistration;
use App\Models\Courses;
use App\Models\Profile;
use App\Models\Registered;
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
        //$semester = $request['semester'];
        //dd($entries);

        $profile = Profile::where('user_id', Auth::id())->select('dept_id', 'semester')->first();
        //$level = Profile::where('user_id', $request['user_id'])->select('level')->get()->toArray();

        //dd($dept[0]['dept_id']);
        //dd($level[0]['level']);

        $details = DB::table('profiles')
                    ->join('users', 'users.id', '=', 'profiles.user_id')
                    ->join('departments', 'departments.id', '=', 'profiles.dept_id')
                    ->where('profiles.user_id', Auth::id())
                    ->select('name', 'dept_name', 'profile_photo', 'index_number', 'level', 'semester')
                    ->first();

        //dd($details);

        $get_courses = DB::table('courses')
                    ->join('profiles', 'profiles.level', '=', 'courses.level')
                    ->join('users', 'users.id', '=', 'profiles.user_id')
                    ->join('departments', 'departments.id', '=', 'profiles.dept_id')
                    ->where('profiles.user_id', Auth::id())
                    ->where('courses.dept_id', $profile->dept_id)
                    ->where('courses.semester', $profile->semester)
                    ->select('courses.course_code', 'courses.course_title', 'courses.credit_hours')
                    ->get();

        //dd($get_courses);

        $total_credit_hours = DB::table('courses')
                        ->join('profiles', 'profiles.level', '=', 'courses.level')
                        ->where('profiles.user_id', Auth::id())
                        ->where('courses.dept_id', $profile->dept_id)
                        ->where('courses.semester', $profile->semester)
                        ->select('credit_hours')
                        ->sum('credit_hours');
        

        //dd($total_credit_hours);
        return view('student.course_registration.course_list', compact('get_courses', 'total_credit_hours', 'details'));
    }

    public function Export(Request $request){

        $profile = Profile::where('user_id', Auth::id())->select('dept_id', 'semester')->first();

        $details = DB::table('profiles')
                    ->join('users', 'users.id', '=', 'profiles.user_id')
                    ->join('departments', 'departments.id', '=', 'profiles.dept_id')
                    ->where('profiles.user_id', Auth::id())
                    ->select('name', 'dept_name', 'profile_photo', 'index_number', 'level', 'semester')
                    ->first();

        $get_courses = DB::table('courses')
                    ->join('profiles', 'profiles.level', '=', 'courses.level')
                    ->join('users', 'users.id', '=', 'profiles.user_id')
                    ->join('departments', 'departments.id', '=', 'profiles.dept_id')
                    ->where('profiles.user_id', Auth::id())
                    ->where('courses.dept_id', $profile->dept_id)
                    ->get();

        $total_credit_hours = DB::table('courses')
                        ->join('profiles', 'profiles.level', '=', 'courses.level')
                        ->where('profiles.user_id', Auth::id())
                        ->where('courses.dept_id', $profile->dept_id)
                        ->select('credit_hours')
                        ->sum('credit_hours');
        
   
        if($request->get("export")==1){
           $pdf = Pdf::loadView('student.course_registration.export', compact('get_courses', 'total_credit_hours', 'details'));
           
           return $pdf->download(Auth::user()->name.'semester_courses.pdf');
        }
        //return redirect()->back();
        return view('student.course_registration.export', compact('get_courses', 'total_credit_hours', 'details'));
    }

    public function Store(Request $request)
    {
        //dd($request->all());

        $this->validate($request, [
            'course_code' => 'required'],
            ['course_code.required'=>'You need to select all courses.']
        );

        if ($request->ajax()) {

            //dd($request->all());
            $course_codes = $request->get('course_code');

            $data=array();

            foreach($course_codes as $course)
            {
                $data[] = [
                    'course_code' => $course,
                    'user_id' => $request['user_id'],
                    'level' => $request['level'],
                    'semester' => $request['semester'],
                    'index_number' => $request['index_number'],
                ];                 
            }

            CourseRegistration::insert($data);

            Registered::create([
                'user_id' => $request['user_id'],
                'level' => $request['level'],
                'semester' => $request['semester'],
            ]);

            return response()->json(['success' => "Saved Successfully"], 201);
        } else {
            return response()->json(['error' => 'Something went wrong!'], 422);
        }
    }

    public function Registered()
    {
        $registered = DB::table('registereds')
            ->join('profiles', 'profiles.level', '=', 'registereds.level')
            ->where('registereds.user_id', Auth::id())
            ->select('registereds.semester', 'profiles.level', 'registereds.user_id')
            ->first();
            
        $sem = $registered->semester;
        $lvl = $registered->level;
        $usr = $registered->user_id;
        dd($sem, $lvl, $usr);
        return view('layouts.student', compact('sem', 'lvl', 'usr'));
    }
}
