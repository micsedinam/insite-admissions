<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class MyResultsController extends Controller
{
    public function index()
    {
        return view('student.results.results');
    }
}
