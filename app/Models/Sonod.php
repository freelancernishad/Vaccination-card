<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sonod extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'id_no',
        'name',
        'husband_name',
        'division',
        'district',
        'upazila',
        'post_office',
        'word_number',
        'village',
        'date_of_last_menstrual_period',
        'probable_date_of_delivery',
        'how_many_wombs',


        'date_of_birth',
        'mobile_no',
        'childbirth_type',
        'gender',
        'childs_name',
        'place_of_childbirth',
        'status',
    ];
}
