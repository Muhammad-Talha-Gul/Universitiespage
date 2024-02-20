<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    protected $fillable = ['sender_id','receiver_id','is_student','message','list_id','display','deleted_at','read'];


    public function receiver(){
    	return $this->hasOne('App\User', 'id', 'receiver_id');
    }

    public function sender(){
    	return $this->hasOne('App\User', 'id', 'sender_id');
    }

    public function list(){
    	return $this->hasOne('App\Model\ChatList', 'id', 'list_id');
    }
}
