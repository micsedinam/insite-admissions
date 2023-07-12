<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Department;
use App\Models\Profile;
use App\Models\StudentResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class StudentResultController extends Controller
{
    public function index()
    {
        $dept = Department::all();
        $index_number = Profile::all();
        $course = Courses::all();

        return view('admin.results.add', compact('dept', 'index_number', 'course'));
    }

    public function showIndexNumbers(Request $request)
    {
        if($request->ajax())
        {
            return response(Profile::where('dept_id',$request->dept_id)->get());
        }
    }

    public function createStudentResult(Request $request)
    {
       //dd($request->all());

        $this->validate(
            $request,
            [
            'course_code' => 'required'
            ],
            ['course_code.required'=>'You need to enter a course code',
                'name.unique'=>"$request->name already exist!"]
        );

        $assessment = $request['first_quiz'] + $request['second_quiz'] + $request['first_assessment'] + $request['second_assessment'] + $request['third_assessment'];
        $exam = $request['theory_exam'] + $request['practical_exam'];
        //dd($assessment);

        if ($assessment > 40) {

            $message = "Continuous assessment cannot be greater than 40% of total score";

            alert()->error($message, 'Sorry!')->persistent();

            return redirect()->back()->withInput();

        } elseif ($exam > 60) {

            $message = "Exam score cannot be greater than 60% of total score";

            alert()->error($message, 'Sorry!')->persistent();

            return redirect()->back()->withInput($request->all());

        } else {

            $student_result = StudentResult::create(
                [
                    'index_number' => $request['index_number'],
                    'course_code' => $request['course_code'],
                    'dept_id' => $request['dept_id'],
                    'level' => $request['level'],
                    'semester' => $request['semester'],
                    'first_quiz' => $request['first_quiz'],
                    'second_quiz' => $request['second_quiz'],
                    'first_assessment' => $request['first_assessment'],
                    'second_assessment' => $request['second_assessment'],
                    'third_assessment' => $request['third_assessment'],
                    'theory_exam' => $request['theory_exam'],
                    'practical_exam' => $request['practical_exam'],
                    'total_marks' => $request['first_quiz'] + $request['second_quiz'] + $request['first_assessment'] + $request['second_assessment'] + $request['third_assessment'] + $request['theory_exam'] + $request['practical_exam'],
                ]
            );

            $student_result->save();

            $message = "Record has been saved successfully";

            alert()->success($message, 'Success!')->persistent();

            return redirect()->back();

        }

        //dd($request->ajax());

        /* if ($request->ajax()) {
            //return response()->json(StudentResult::create($request->all()));

            //return response()->json(['info' => "I am able to reach here"], 201);

            //dd($request->all());
            $assessment = $request['first_quiz'] + $request['second_quiz'] + $request['first_assessment'] + $request['second_assessment'] + $request['third_assessment'];
            //dd($assessment);

            //$request->inputWithDefault();

            if ($assessment > 40) {

                //$message = "Continuous assessment cannot be greater than 40% of total score";

                return response()->json(['error' => "Continuous assessment cannot be greater than 40% of total score"], 201);

            } else {

                $student_result = StudentResult::create(
                    [
                        'index_number' => $request['index_number'],
                        'course_code' => $request['course_code'],
                        'dept_id' => $request['dept_id'],
                        'level' => $request['level'],
                        'semester' => $request['semester'],
                        'first_quiz' => $request['first_quiz'],
                        'second_quiz' => $request['second_quiz'],
                        'first_assessment' => $request['first_assessment'],
                        'second_assessment' => $request['second_assessment'],
                        'third_assessment' => $request['third_assessment'],
                        'theory_exam' => $request['theory_exam'],
                        'practical_exam' => $request['practical_exam'],
                        'total_marks' => $request['first_quiz'] + $request['second_quiz'] + $request['first_assessment'] + $request['second_assessment'] + $request['third_assessment'] + $request['theory_exam'] + $request['practical_exam'],
                    ]
                );
                $student_result->save();
            }
            return response()->json(['success' => "Saved Successfully"], 201);

        } else {
            return response()->json(['error' => 'Something went wrong!'], 422);
        } */
    }

    public function showStudentResultInformation()
    {
        $result = DB::table('student_results')
                ->join('courses', 'student_results.course_code', 'courses.course_code')
                ->select('student_results.*', 'courses.course_title')
                ->groupBy('student_results.id')
                ->get();
        
        //dd($result);

        return view('admin.results.show', compact('result'));

    }

    public function editStudentResult(Request $request)
    {
        if ($request->ajax()) {
            return response(StudentResult::find($request->id));
        }
    }

    public function updateStudentResult(Request $request)
    {
        /* $this->validate($request,[
            'name' => 'required|unique:districts,district_id'],
            ['name.required'=>'You need to enter district',
                'name.unique'=>"$request->name already exist!"]
        ); */
        
        if($request->ajax())
        {
            return response(StudentResult::updateOrCreate(
                ['id'=>$request->result_id], 
                [
                    'index_number' => $request['index_number'],
                    'course_code' => $request['course_code'],
                    'dept_id' => $request['dept_id'],
                    'level' => $request['level'],
                    'semester' => $request['semester'],
                    'first_quiz' => $request['first_quiz'],
                    'second_quiz' => $request['second_quiz'],
                    'first_assessment' => $request['first_assessment'],
                    'second_assessment' => $request['second_assessment'],
                    'third_assessment' => $request['third_assessment'],
                    'theory_exam' => $request['theory_exam'],
                    'practical_exam' => $request['practical_exam'],
                    'total_marks' => $request['first_quiz'] + $request['second_quiz'] + $request['first_assessment'] + $request['second_assessment'] + $request['third_assessment'] + $request['theory_exam'] + $request['practical_exam'],
                ]
            ));
        }
    }

    public function deleteResult(Request $request)
    {
        if($request->ajax())
        {
            StudentResult::destroy($request->id);
        }
    }

}
