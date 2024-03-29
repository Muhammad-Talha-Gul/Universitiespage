<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OnlineConsultant extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'last_education',
        'country',
        'state',
        'city',
        'apply_for',
        'passport_image',
        'last_education_image',
    ];
}
