<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $fillable = ['id', 'university_id', 'consultant_id', 'user_id','review', 'stars', 'reply'];

    public function university_detail(){
    	return $this->belongsTo('App\Model\UniversityDetail', 'university_id');
    }

     public function consultant(){
    	return $this->belongsTo('App\Model\Consultant', 'consultant_id');
    }


    public function users(){
    	return $this->belongsTo('App\User', 'user_id');
    }
}
