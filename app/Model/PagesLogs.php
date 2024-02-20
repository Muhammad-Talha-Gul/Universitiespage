<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PagesLogs extends Model
{
    protected $table = "page_logs";
    protected $fillable = ['user_id', 'page_id','type'];

    function user() {
        return $this->hasOne('App\User', 'id','user_id');
    }

    function page() {
        return $this->hasOne('App\Model\Pages', 'id','page_id');
    }
}
