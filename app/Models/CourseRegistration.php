<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseRegistration extends Model
{
    protected $table = 'course_registrations';
    protected $fillable = [
        'course_code',
        'user_id',
        'index_number',
        'level',
        'semester',
    ];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
