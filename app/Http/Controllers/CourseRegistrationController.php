<?php

namespace App\Http\Controllers;

use App\Models\CourseRegistration;
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
        $semester = $request['semester'];
        //dd($entries);

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
                    ->where('courses.semester', $semester)
                    ->select('courses.course_code', 'courses.course_title', 'courses.credit_hours')
                    ->get();

        //dd($get_courses);

        $total_credit_hours = DB::table('courses')
                        ->join('profiles', 'profiles.level', '=', 'courses.level')
                        ->where('profiles.user_id', $request['user_id'])
                        ->where('courses.dept_id', $dept[0]['dept_id'])
                        ->where('courses.semester', $semester)
                        ->select('credit_hours')
                        ->sum('credit_hours');
        

        //dd($total_credit_hours);
        return view('student.course_registration.course_list', compact('get_courses', 'total_credit_hours', 'details', 'semester'));
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

    public function Store(Request $request)
    {
        //dd($request->all());

        $this->validate($request, [
            'course_code' => 'required'],
            ['course_code.required'=>'You need to select all courses.']
        );

        /* $course_codes = $request['course_code'];

        //dd($course_codes);

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
        } */
        //$array_size = sizeof($data);

        
        // for ($x = 0; $x <= $array_size - 1; $x++) {
        //     //echo $x;
        //     foreach ($x as $value) {
        //         return $value;
        //     }
        // }

        

        // //$data[$x]['course_code'];

        // dd($data[$x]['course_code']);

        // CourseRegistration::insert($data);

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

            //$profile = Profile::where('user_id', Auth::id())->select('level', 'index_number')->first();

            //dd($profile);

            CourseRegistration::insert($data);
            // CourseRegistration::upsert(
            //     ['user_id' => Auth::id(), 'level' => $profile->level, 'semester' => $request['semester'], 'index_number' => $profile->index_number],
            //     ['user_id', 'level', 'semester', 'index_number'],
            //     ['course_code']
            // );

            //dd($data);
            // $data = MaintenanceRequest::create(
            //     [
            //         'user_id' => Auth::id(),
            //         'customer_name' => $request['customer_name'],
            //         'address' => $request['address'],
            //         'phone' => $request['phone'],
            //         'contact_person' => $request['contact_person'],
            //         //'instrument_make' => $request['instrument_make'],
            //         //'instrument_type' => $request['instrument_type'],
            //         //'serial_number' => $request['serial_number'],
            //         //'fault_description' => $str_json_fault,
            //         //'accessories' => $str_json_accessories,
            //         'message' => $request['message'],
            //         'delivery' => $request['delivery'],
            //         'ticket_number' => $ticket_number,
            //         'request_status' => $request['request_status'],
            //     ]
            // );
            // //dd($data);
            // $data->save();

            return response()->json(['success' => "Saved Successfully"], 201);
        } else {
            return response()->json(['error' => 'Something went wrong!'], 422);
        }
    }
}
