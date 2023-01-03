<?php

namespace App\Http\Controllers;

use App\Models\ContinuousAssessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CAController extends Controller
{
    public function index()
    {
        return view('admin.assessment.add');
    }

    public function Store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, 
            [
                'index_number' => 'required',
                'course_code' => 'required',
                'assessment_type' => 'required',
                'assessment_score' => 'required',
            ],
            [
                'index_number.required'=>'You need to enter an index number.',
                'course_code.required'=>'You need to enter a course code.',
                'assessment_type.required'=>'You need to select an assessment type.',
                'assessment_score.required'=>'You need to enter an assessment score.',
            ]
        );
        

        $totalca = DB::table('continuous_assessments')
                    ->where('index_number', '=', $request['index_number'])
                    ->where('course_code', '=', $request['course_code'])
                    ->select('quiz1', 'quiz2', 'assessment1', 'assessment2', 'assessment3')
                    ->first();


        $quiz1 = $totalca->quiz1;
        $quiz2 = $totalca->quiz2;
        $assessment1 = $totalca->assessment1;
        $assessment2 = $totalca->assessment2;
        $assessment3 = $totalca->assessment3;

        if ($request['assessment_type'] == "quiz1") {
            $quiz1 = $request['assessment_score'];
        } elseif ($request['assessment_type'] == "quiz2") {
            $quiz2 = $request['assessment_score'];
        } elseif ($request['assessment_type'] == "assessment1") {
            $assessment1 = $request['assessment_score'];
        } elseif ($request['assessment_type'] == "assessment2") {
            $assessment2 = $request['assessment_score'];
        } elseif ($request['assessment_type'] == "assessment3") {
            $assessment3 = $request['assessment_score'];
        }

        //$totalca = 0;

        

        $sum = $totalca->quiz1 + $totalca->quiz2 + $totalca->assessment1 + $totalca->assessment2 + $totalca->assessment3 + $request['assessment_score'];

        if ($sum > 40) {
            alert()->warning('Sweet Alert with warning.')->autoclose(3500);
        }
        

        dd($sum);

        DB::table('continuous_assessments')
            ->updateOrInsert(
                ['index_number' => $request['index_number'], 'course_code' => $request['course_code']],
                [
                    'index_number' => $request['index_number'],
                    'course_code' => $request['course_code'],
                    'quiz1' => $quiz1,
                    'quiz2' => $quiz2,
                    'assessment1' => $assessment1,
                    'assessment2' => $assessment2,
                    'assessment3' => $assessment3,
                    'total_ca' => 0,
                ]
            );



        

        if ($request->ajax()) {

            
            return response()->json(Department::create($request->all()));
        } else {
            return response()->json(['error' => 'Something went wrong!'], 422);
        }
    }

    public function showDepartmentInformation()
    {
        $dept = $this->DeptInformation();
        return view('admin.department.show', compact('dept'));

    }

    public function DeptInformation()
    {
        return Department::all();
    }

    public function editDept(Request $request)
    {
        if ($request->ajax()) {
            return response(Department::find($request->id));
        }
    }

    public function updateDept(Request $request)
    {
        $this->validate($request,[
            'dept_name' => 'required|min:5|unique:departments'],
            ['dept_name.required'=>'You need to enter a programme name.',
                'dept_name.unique'=>"This entry already exists!"]
        );
        if ($request->ajax()) {
            return response(Department::updateOrCreate(['id'=>$request->dept_id], $request->all()));
        }
    }
}
