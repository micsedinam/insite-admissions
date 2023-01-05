<?php

namespace App\Imports;

use App\Models\Result;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SemesterResultImport implements ToModel, WithHeadingRow, WithBatchInserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if ($row['department'] == "Journalism and Media Studies - English") {
            return new Result([
                'index_number' => $row['index_number'],
                'course_code' => $row['course_code'],
                'dept_id' => 1,
                'level' => $row['level'],
                'semester' => $row['semester'],
                'continuous_assessment' => $row['continuous_assessment'],
                'exam_score' => $row['exam_score'],
                'total_score' => $row['total_score'],
            ]);
        } else {
            return new Result([
                'index_number' => $row['index_number'],
                'course_code' => $row['course_code'],
                'dept_id' => 0,
                'level' => $row['level'],
                'semester' => $row['semester'],
                'continuous_assessment' => $row['continuous_assessment'],
                'exam_score' => $row['exam_score'],
                'total_score' => $row['total_score'],
            ]);
        }
        
        

    }

    public function batchSize(): int
    {
        return 1000;
    }
}
