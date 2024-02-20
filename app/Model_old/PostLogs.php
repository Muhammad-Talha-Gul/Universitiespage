<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PostLogs extends Model
{
    protected $table = 'post_logs';
    protected $fillable = ['post_type', 'post_id', 'user_id', 'post_title', 'type', 'meta'];

    public function has_post()
    {
    	return $this->hasOne('App\Model\Posts', 'id', 'post_id');
    }

    function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
