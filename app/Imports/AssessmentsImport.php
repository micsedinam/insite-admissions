<?php

namespace App\Imports;

use App\Models\ContinuousAssessment;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AssessmentsImport implements ToModel, WithHeadingRow, WithBatchInserts, SkipsEmptyRows
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ContinuousAssessment([
            'index_number' => $row['index_number'],
            'course_code' => $row['course_code'],
            'quiz1' => $row['quiz1'],
            'quiz2' => $row['quiz2'],
            'assessment1' => $row['assessment1'],
            'assessment2' => $row['assessment2'],
            'assessment3' => $row['assessment3'],
            'total_ca' => $row['total_ca'],
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }
}
