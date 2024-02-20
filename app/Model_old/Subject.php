<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';
    protected $fillable = ['name'];

    function courses(){
        return $this->hasMany('App\Model\Course', 'subject_id', 'id');
    }

    function guide(){
        return $this->belongsTo('App\Model\Guide', 'id', 'subject_id');
    }
    
}
