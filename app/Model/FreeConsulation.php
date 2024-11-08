<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FreeConsulation extends Model
{
   protected $table = 'free_consulations';
   protected $fillable = [
       'name',
       'email',
       'phone_number',
       'last_education',
       'country',
       'city',
       'apply_for',
       'interested_country',
   ];

}
