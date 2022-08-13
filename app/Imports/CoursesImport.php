<?php

namespace App\Imports;

use App\Models\Courses;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class CoursesImport implements ToModel, WithHeadingRow, WithBatchInserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Courses([
            'course_code' => $row['course_code'],
            'course_title' => $row['course_title'],
            'credit_hours' => $row['credit_hours'],
            'dept_id' => $row['dept_id'],
            'level' => $row['level'],
            'semester' => $row['semester'],
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }
}
