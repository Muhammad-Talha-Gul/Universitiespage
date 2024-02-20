<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Stores extends Model
{
    protected $table = 'stores';
    protected $fillable = ['title', 'address', 'phone', 'email'];
}
