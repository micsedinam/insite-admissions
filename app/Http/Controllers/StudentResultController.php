<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Department;
use App\Models\Profile;
use App\Models\StudentResult;
use Illuminate\Http\Request;

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

       /*  $this->validate(
            $request,
            [
            'name' => 'required'
            ],
            ['name.required'=>'You need to enter a name of a District',
                'name.unique'=>"$request->name already exist!"]
        ); */

        if ($request->ajax()) {
            //return response()->json(StudentResult::create($request->all()));
            //dd($request->all());
            return response()->json(
                StudentResult::create(
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
                )
            );
        } else {
            return response()->json(['error' => 'Something went wrong!'], 422);
        }
    }

    public function showStudentResultInformation()
    {
        $result = StudentResult::all();

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

}
