<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
   protected $table = 'contact_us'; // Specify the correct table name here
   protected $fillable = [
    'message_reason',
    'user_name',
    'user_email',
    'message',
   ];
}
