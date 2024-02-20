<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    protected $table = 'notifications';
    protected $fillable = ['type', 'user_id', 'post_id', 'order_id','mail_id','review_id', 'university_id', 'consultant_id', 'student_id', 'application_id', 'meta', 'is_read','name','email','message'];

    function user() {
        return $this->hasOne('App\User', 'id','user_id');
    }

    function order() {
        return $this->hasOne('App\Model\Orders', 'id', 'order_id');
    }

    function post() {
        return $this->hasOne('App\Model\Posts', 'id', 'post_id');
    }

    function university() {
        return $this->hasOne('App\Model\UniversityDetail', 'id', 'university_id');
    }
    function consultant() {
        return $this->hasOne('App\Model\Consultant', 'id', 'consultant_id');
    }
    function student() {
        return $this->hasOne('App\Model\Student', 'id', 'student_id');
    }

    public static function noUser(){
        $note = Notifications::latest()->first();
        $note = $note->replicate();
        $note->user_id=null;
        $note->save();
    }
}