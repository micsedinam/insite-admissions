<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentResult extends Model
{
    protected $table = 'student_results';
    protected $fillable = [
        'index_number',
        'course_code',
        'level',
        'semester',
        'first_quiz',
        'second_quiz',
        'first_assessment',
        'second_assessment',
        'third_assessment',
        'theory_exam',
        'practical_exam',
        'total_marks',
        'dept_id',
    ];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
