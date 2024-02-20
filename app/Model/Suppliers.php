<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    protected $table = 'suppliers';
    protected $fillable = ['supplier', 'first_name', 'last_name', 'email', 'phone', 'address', 'city', 'postal_code', 'country', 'province'];
}
