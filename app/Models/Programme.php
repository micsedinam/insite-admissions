<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    //use HasFactory;

    protected $table = 'programmes';
    protected $fillable = [
        'dept_id',
        'prog_name',
    ];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
