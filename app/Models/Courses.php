<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Courses extends Model
{
    use SoftDeletes;
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
