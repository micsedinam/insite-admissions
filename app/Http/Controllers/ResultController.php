<?php

namespace App\Http\Controllers;

use App\Imports\SemesterResultImport;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use UxWeb\SweetAlert\SweetAlert;

class ResultController extends Controller
{
    public function index()
    {
        return view('admin.results.importResult');
    }

    public function importResult(Request $request)
    {

        Excel::import(new SemesterResultImport, $request->file('result')->store('temp'));

        $message = "Results imported successfully.";

        alert()->success($message, 'All good!')->persistent();

        return redirect()->back();
        
    }

    public function showResultInformation()
    {
        $result = Result::all();

        return view('admin.results.show', compact('result'));

    }

    public function getTranscript(Request $request)
    {
        //dd($request->all());

        $details = DB::table('profiles')
            ->join('users', 'users.id', '=', 'profiles.user_id')
            ->join('departments', 'departments.id', '=', 'profiles.dept_id')
            ->where('profiles.index_number', $request->index_number)
            ->select('name', 'dept_name', 'profile_photo', 'index_number')
            ->first();
        //dd($details);

        $studentdept = DB::table('profiles')
            ->where('index_number', $request->index_number)
            ->select('dept_id')
            ->first();
        //dd($studentdept->dept_id);

        //$courses = Courses::where('dept_id', '=', $studentdept->dept_id)->get();
        //dd($courses);

        /* $get_transcript = DB::table('results')
            ->crossJoin('courses', 'courses.dept_id', '=', 'results.dept_id')
            ->where('index_number', '=', "IMC/BJ/22/0023")
            ->where('results.course_code', '=', 'courses.course_code')
            ->select('index_number', 'results.semester', 'results.level', 'score', 'results.course_code')
            ->orderBy('results.level')
            ->get(); */
        
        //dd($get_transcript);

        //$index_number = $request->index_number;

        //dd($index_number);

        $trans = DB::select(
            "SELECT
                courses.course_code, 
                courses.course_title,
                courses.credit_hours,
                results.index_number, 
                results.course_code, 
                results.semester, 
                results.`level`, 
                results.score
            FROM
                results,
                courses
            WHERE
                results.index_number = '$request->index_number' AND
                results.course_code = courses.course_code AND
                results.dept_id = courses.dept_id"
        );
        //dd($trans);

        return view('admin.transcripts.studentTranscript', compact('trans', 'details'));
    }
}
