<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    //use HasFactory;

    protected $table = 'forms';
    protected $fillable = [
        'user_id',
        'firstname',
        'othername',
        'lastname',
        'dob',
        'phone',
        'email',
        'post_address',
        'gender',
        'country',
        'nationality',
        'marital_status',
        'children',
        'residence',
        'physical_challenge',
        'challenge',
        'passport_photo',
        'dept_id',
        'prog_id',
        'duration',
        'prog_choice',
        'hostel',
        'instruction_language',
        'lecture_period',
        'school_attended',
        'year_started',
        'year_completed',
        'certificate_name',
        'certificate_upload',
        'one_referee_name',
        'one_referee_phone',
        'one_referee_email',
        'one_referee_occupation',
        'one_referee_address',
        'two_referee_name',
        'two_referee_phone',
        'two_referee_email',
        'two_referee_occupation',
        'two_referee_address',
        'form_complete',
    ];
    protected $primaryKey = 'form_id';
    public $timestamps = true;
}
