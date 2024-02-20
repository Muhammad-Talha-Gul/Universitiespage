<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ApplyNow extends Model
{
   protected $table = 'apply_now';
   protected $fillable = [
       'name',
       'city',
       'phone_number',
       'last_education',
       'intrested_country',
   ];

}
