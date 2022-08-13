<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseRegistrationController extends Controller
{
    public function index()
    {
        return view('student.course_registration.register');
    }
}
