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
        return new Result([
            'index_number' => $row['index_number'],
            'course_code' => $row['course_code'],
            'level' => $row['level'],
            'semester' => $row['semester'],
            'score' => $row['score'],
        ]);

    }

    public function batchSize(): int
    {
        return 1000;
    }
}
