<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'results';
    protected $fillable = [
        'index_number',
        'course_code',
        'level',
        'semester',
        'score',
        'dept_id',
    ];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
