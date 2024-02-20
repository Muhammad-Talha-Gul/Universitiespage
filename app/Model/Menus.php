<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    protected $table = 'menus';
    protected $fillable = ['name', 'is_primary', 'is_secondary'];

    function items() {
        return $this->hasMany('App\Model\MenuItems', 'menu_id');
    }
}