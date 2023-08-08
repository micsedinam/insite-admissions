<?php

namespace App\Http\Controllers;

use App\Imports\CoursesImport;
use App\Exports\CoursesExport;
use App\Models\Courses;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CoursesController extends Controller
{
    public function index()
    {
        return view('admin.courses.importCourses');
    }
    public function import(Request $request) 
    {
        //Excel::import(new CoursesImport, 'users.xlsx');
        Excel::import(new CoursesImport, $request->file('courses')->store('temp'));

        // $message = "Courses imported successfully.";

        // alert()->success($message, 'All good!')->persistent();

        return redirect()->back()->with("success", 'Courses imported successfully.', 'Awesome'); 
        
        //return redirect('/')->with('success', 'All good!');
    }

    public function export()
    {
        return Excel::download(new CoursesExport, 'courses.xlsx');
    }

    public function showCourseInformation()
    {
        $course = Courses::all();

        return view('admin.courses.show', compact('course'));

    }
}
