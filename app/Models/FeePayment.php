<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeePayment extends Model
{
    protected $table = 'fee_payments';
    protected $fillable = [
        'code',
        'index_number',
    ];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
