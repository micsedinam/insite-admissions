<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContinuousAssessment extends Model
{
    protected $table = 'continuous_assessments';
    protected $fillable = [
        'index_number',
        'course_code',
        'quiz1',
        'quiz2',
        'assessment1',
        'assessment2',
        'assessment3',
        'total_ca',
    ];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
