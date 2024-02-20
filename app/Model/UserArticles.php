<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserArticles extends Model
{
    protected $table = "user_articles";
    protected $fillable = ['user_id', 'file', 'description','status'];

    function user() {
        return $this->hasOne('App\User', 'id','user_id');
    }
}
