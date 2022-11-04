<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'union',
        'trxId',
        'sonodId',
        'sonod_type',
        'amount',
        'applicant_mobile',
        'status',
        'date',
        'month',
        'year',
        'balance',
    ];



    public function sonod(){
        return $this->belongsTo(Sonod::class, 'sonodId', 'id');
    }

}
