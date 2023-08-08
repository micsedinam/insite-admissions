<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $table = 'courses';
    protected $fillable = [
        'course_code',
        'course_title',
        'credit_hours',
        'dept_id',
        'level',
        'semester',
        'academic_year'
    ];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
