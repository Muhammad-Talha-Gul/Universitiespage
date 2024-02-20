<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlist';
    protected $fillable = ['user_id','course_id'];

    function course() {
        return $this->hasOne('App\Model\Course', 'id','course_id');
    }
}
