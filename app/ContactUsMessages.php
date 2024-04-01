<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUsMessages extends Model
{
    protected $fillable = [
        'message_reason',
        'user_name',
        'user_email',
        'message',
       ];
}
