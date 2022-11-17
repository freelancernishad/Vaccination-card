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
        'pregnant_woman_nid',
        'husband_name',
        'husband_name_nid',
        'division',
        'district',
        'upazila',
        'post_office',
        'word_number',
        'village',
        'date_of_last_menstrual_period',
        'probable_date_of_delivery',
        'how_many_wombs',
        'how_many_children',


        'date_of_birth',
        'mobile_no',
        'childbirth_type',
        'gender',
        'childs_name',
        'place_of_childbirth',
        'first_dose',
        'second_dose',
        'third_dose',
        'forth_dose',
        'status',
    ];
}
