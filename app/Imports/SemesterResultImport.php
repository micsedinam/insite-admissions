<?php

namespace App\Imports;

use App\Models\StudentResult;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SemesterResultImport implements ToModel, WithHeadingRow, WithBatchInserts, SkipsEmptyRows
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if ($row['department'] == "Journalism and Media Studies - English") {
            //dd($row['continuous_assessment'], $row['exam_score'], $row['total_score'], $row['semester'], $row['index_number'], $row['course_code']);
            return new StudentResult([
                'index_number' => $row['index_number'],
                'course_code' => $row['course_code'],
                'dept_id' => 1,
                'level' => $row['level'],
                'semester' => $row['semester'],
                'first_quiz' => $row['first_quiz'],
                'second_quiz' => $row['second_quiz'],
                'first_assessment' => $row['first_assessment'],
                'second_assessment' => $row['second_assessment'],
                'third_assessment' => $row['third_assessment'],
                'theory_exam' => $row['theory_exam'],
                'practical_exam' => $row['practical_exam'],
                'total_marks' => $row['total_marks'],
            ]);
        } elseif ($row['department'] == "Journalism and Media Studies - Akan") {
            return new StudentResult([
                'index_number' => $row['index_number'],
                'course_code' => $row['course_code'],
                'dept_id' => 2,
                'level' => $row['level'],
                'semester' => $row['semester'],
                'first_quiz' => $row['first_quiz'],
                'second_quiz' => $row['second_quiz'],
                'first_assessment' => $row['first_assessment'],
                'second_assessment' => $row['second_assessment'],
                'third_assessment' => $row['third_assessment'],
                'theory_exam' => $row['theory_exam'],
                'practical_exam' => $row['practical_exam'],
                'total_marks' => $row['total_marks'],
            ]);
        } elseif ($row['department'] == "TV & Film Production") {
            return new StudentResult([
                'index_number' => $row['index_number'],
                'course_code' => $row['course_code'],
                'dept_id' => 3,
                'level' => $row['level'],
                'semester' => $row['semester'],
                'first_quiz' => $row['first_quiz'],
                'second_quiz' => $row['second_quiz'],
                'first_assessment' => $row['first_assessment'],
                'second_assessment' => $row['second_assessment'],
                'third_assessment' => $row['third_assessment'],
                'theory_exam' => $row['theory_exam'],
                'practical_exam' => $row['practical_exam'],
                'total_marks' => $row['total_marks'],
            ]);
        } elseif ($row['department'] == "Sound Engineering") {
            return new StudentResult([
                'index_number' => $row['index_number'],
                'course_code' => $row['course_code'],
                'dept_id' => 4,
                'level' => $row['level'],
                'semester' => $row['semester'],
                'first_quiz' => $row['first_quiz'],
                'second_quiz' => $row['second_quiz'],
                'first_assessment' => $row['first_assessment'],
                'second_assessment' => $row['second_assessment'],
                'third_assessment' => $row['third_assessment'],
                'theory_exam' => $row['theory_exam'],
                'practical_exam' => $row['practical_exam'],
                'total_marks' => $row['total_marks'],
            ]);
        } else {
            return new StudentResult([
                'index_number' => $row['index_number'],
                'course_code' => $row['course_code'],
                'dept_id' => 5,
                'level' => $row['level'],
                'semester' => $row['semester'],
                'first_quiz' => $row['first_quiz'],
                'second_quiz' => $row['second_quiz'],
                'first_assessment' => $row['first_assessment'],
                'second_assessment' => $row['second_assessment'],
                'third_assessment' => $row['third_assessment'],
                'theory_exam' => $row['theory_exam'],
                'practical_exam' => $row['practical_exam'],
                'total_marks' => $row['total_marks'],
            ]);
        }
    }

    public function batchSize(): int
    {
        return 1000;
    }
}
