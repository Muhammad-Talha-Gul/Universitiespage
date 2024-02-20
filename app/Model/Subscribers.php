<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subscribers extends Model
{
    protected $table = 'subscribers';
    protected $fillable = ['email','first_name', 'last_name', 'designation', 'company', 'city'];
}
