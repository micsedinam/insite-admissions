<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';
    protected $fillable = [
        'index_number',
        'level',
        'dept_id',
        'prog_id',
        'profile_photo',
        'user_id',
    ];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
