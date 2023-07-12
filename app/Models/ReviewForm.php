<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewForm extends Model
{
    //use HasFactory;

    protected $table = 'review_forms';
    protected $fillable = [
        'user_id',
        'form_id',
        'status',
    ];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
