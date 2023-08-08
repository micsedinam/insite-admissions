<?php

namespace App\Exports;

use App\Models\Courses;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CoursesExport implements FromView
{
    public function view(): View
    {
        return view('admin.courses.exportCourses', [
            'courses' => Courses::all()
        ]);
    }
}
