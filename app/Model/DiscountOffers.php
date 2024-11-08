<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DiscountOffers extends Model
{
    protected $table = 'discountOffers';
    protected $fillable = ['name','lastEducation','lastEducationPer', 'city', 'phone', 'email','location',  'familyDetail'];
}