<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Logos extends Model
{
    protected $table = "logos";
    protected $fillable = ['type', 'alt', 'link', 'image'];
}
