<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Cookie;

class ChatList extends Model
{
    protected $table = 'chat_list';
    protected $fillable = ['user_id','first_person','second_person','display','updated_at'];

    public function lastMessage(){
        return $this->hasOne('App\Model\Message', 'list_id', 'id')->orderBy('created_at', 'DESC');
    }

    public function messages(){
    	return $this->hasMany('App\Model\Message', 'list_id', 'id');
    }

    public function unread(){
        return $this->hasMany('App\Model\Message', 'list_id', 'id')->where('read',0)->where('sender_id', '!=', auth()->user()->id);
    }

    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function fuser(){
        return $this->hasOne('App\User', 'id', 'first_person');
    }

    public function suser(){
        return $this->hasOne('App\User', 'id', 'second_person');
    }

    public static function creator(){
    	$chat = new ChatList;
		$chat->first_person = Auth::user()->id;
		$chat->second_person = (int)(Cookie::get('user_id'))??0;
		$chat->save();
    }
}
