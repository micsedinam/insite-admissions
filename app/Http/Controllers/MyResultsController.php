<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyResultsController extends Controller
{
    public function index()
    {
        return view('student.results.results');
    }

    public function check(Request $request)
    {
        //dd($request->all());
        $auth_user_id = Auth::id();

        $details = DB::table('profiles')
                ->join('users', 'users.id', '=', 'profiles.user_id')
                ->join('departments', 'departments.id', '=', 'profiles.dept_id')
                ->where('profiles.user_id', Auth::id())
                ->select('name', 'dept_name', 'profile_photo', 'index_number', 'level', 'semester')
                ->first();
        
        $results = DB::select(
            "SELECT
                student_results.course_code, 
                courses.dept_id, 
                courses.credit_hours, 
                courses.course_title, 
                student_results.`level`, 
                student_results.semester, 
                student_results.first_quiz, 
                student_results.second_quiz, 
                student_results.first_assessment, 
                student_results.second_assessment, 
                student_results.third_assessment, 
                student_results.theory_exam, 
                student_results.practical_exam, 
                student_results.total_marks
            FROM
                student_results
                INNER JOIN
                courses
                ON 
                    student_results.course_code = courses.course_code
                INNER JOIN
                `profiles`
                ON 
                    student_results.index_number = `profiles`.index_number
            WHERE
                student_results.`level` = $request->level AND
                student_results.semester = $request->semester AND
                `profiles`.index_number = student_results.index_number AND
                `profiles`.user_id = $auth_user_id AND
                student_results.dept_id = courses.dept_id"
        );
        
        //dd($results, $details);


        return view('student.results.view', compact('results', 'details'));
    }
}
