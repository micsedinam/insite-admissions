<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registered extends Model
{
    protected $table = 'registereds';
    protected $fillable = [
        'user_id',
        'level',
        'semester',
    ];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
