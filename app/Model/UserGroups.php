<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserGroups extends Model
{
    protected $table = "user_groups";
    protected $fillable = ['name'];

    function users() {
        return $this->hasMany('App\User', 'group_id');
    }

}
