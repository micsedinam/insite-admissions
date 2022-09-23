<?php

namespace App\Http\Controllers;

use App\Imports\SemesterResultImport;
use App\Models\Result;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ResultController extends Controller
{
    public function index()
    {
        return view('admin.results.importResult');
    }

    public function importResult(Request $request)
    {
        //Excel::import(new CoursesImport, 'users.xlsx');
        Excel::import(new SemesterResultImport, $request->file('results')->store('temp'));

        $message = "Results imported successfully.";

        alert()->success($message, 'All good!')->persistent();

        return redirect()->back();
        
        //return redirect('/')->with('success', 'All good!');
    }

    public function showResultInformation()
    {
        $result = Result::all();

        return view('admin.results.show', compact('result'));

    }
}
