<?php

namespace App\Http\Controllers;

use App\Imports\AssessmentsImport;
use App\Models\ContinuousAssessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use UxWeb\SweetAlert\SweetAlert;

class CAController extends Controller
{
    public function index()
    {
        return view('admin.assessment.add');
    }

    public function importAssessment(Request $request)
    {
        //Excel::import(new CoursesImport, 'users.xlsx');
        Excel::import(new AssessmentsImport, $request->file('assessments')->store('temp'));

        $message = "Assessments imported successfully.";

        alert()->success($message, 'All good!')->persistent();

        return redirect()->back();
        
        //return redirect('/')->with('success', 'All good!');
    }

    public function Store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, 
            [
                'index_number' => 'required',
                'course_code' => 'required',
                'quiz1' => 'required',
                'quiz2' => 'required',
                'assessment1' => 'required',
                'assessment2' => 'required',
                'assessment3' => 'required',
            ],
            [
                'index_number.required'=>'You need to enter an index number.',
                'course_code.required'=>'You need to enter a course code.',
                'quiz1.required'=>'You need to enter quiz one score.',
                'quiz2.required'=>'You need to enter quiz two score.',
                'assessment1.required'=>'You need to enter assessment one score.',
                'assessment2.required'=>'You need to enter assessment two score.',
                'assessment3.required'=>'You need to enter assessment three score.',
            ]
        );

        /* $totalca = DB::table('continuous_assessments')
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
 */


        
        //dd($request->all(), $request->ajax());
        if ($request->ajax()) {
            //dd($request->all());
            return response()->json(
                ContinuousAssessment::create(
                    [
                        'index_number' => $request['index_number'],
                        'course_code' => $request['course_code'],
                        'quiz1' => $request['quiz1'],
                        'quiz2' => $request['quiz2'],
                        'assessment1' => $request['assessment1'],
                        'assessment2' => $request['assessment2'],
                        'assessment3' => $request['assessment3'],
                        'total_ca' => $request['quiz1'] + $request['quiz2'] + $request['assessment1'] + $request['assessment2'] + $request['assessment3'],
                    ]
                )
            );
        } else {
            return response()->json(['error' => 'Something went wrong!'], 422);
        }
    }

    public function showCAInformation()
    {
        $ca = $this->CAInformation();
        return view('admin.assessment.show', compact('ca'));

    }

    public function CAInformation()
    {
        return ContinuousAssessment::all();
    }

    public function editCA(Request $request)
    {
        if ($request->ajax()) {
            return response(ContinuousAssessment::find($request->id));
        }
    }

    public function updateCA(Request $request)
    {
        $this->validate($request, 
            [
                'index_number' => 'required',
                'course_code' => 'required',
                'quiz1' => 'required',
                'quiz2' => 'required',
                'assessment1' => 'required',
                'assessment2' => 'required',
                'assessment3' => 'required',
            ],
            [
                'index_number.required'=>'You need to enter an index number.',
                'course_code.required'=>'You need to enter a course code.',
                'quiz1.required'=>'You need to enter quiz one score.',
                'quiz2.required'=>'You need to enter quiz two score.',
                'assessment1.required'=>'You need to enter assessment one score.',
                'assessment2.required'=>'You need to enter assessment two score.',
                'assessment3.required'=>'You need to enter assessment three score.',
            ]
        );

        if ($request->ajax()) {
            return response(
                ContinuousAssessment::updateOrCreate(
                    ['id'=>$request->ca_id], 
                    [
                        'index_number' => $request['index_number'],
                        'course_code' => $request['course_code'],
                        'quiz1' => $request['quiz1'],
                        'quiz2' => $request['quiz2'],
                        'assessment1' => $request['assessment1'],
                        'assessment2' => $request['assessment2'],
                        'assessment3' => $request['assessment3'],
                        'total_ca' => $request['quiz1'] + $request['quiz2'] + $request['assessment1'] + $request['assessment2'] + $request['assessment3'],
                    ]
                )
            );
        }
    }
}
