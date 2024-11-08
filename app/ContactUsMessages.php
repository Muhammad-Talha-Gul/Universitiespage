<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUsMessages extends Model
{
    protected $fillable = [
        'office_location',
        'user_name',
        'user_email',
        'phone_number',
        'message',
       ];
}
