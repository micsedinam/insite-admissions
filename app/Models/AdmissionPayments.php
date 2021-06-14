<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmissionPayments extends Model
{
    //use HasFactory;

    protected $table = 'admission_payments';
    protected $fillable = [
        'user_id',
        'fullname',
        'phone',
        'email',
        'reference',
        'status',
        'payment_date',
    ];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
