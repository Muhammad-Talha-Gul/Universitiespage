<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ContactMails extends Model
{
    protected $table = 'emails';
    protected $fillable = ['name', 'email', 'phone', 'company', 'subject', 'message', 'is_read'];
}