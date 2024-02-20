<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MenuItems extends Model
{
    protected $table = 'menu_items';
    protected $fillable = ['menu_id', 'parent', 'title', 'type', 'url', 'icon', 'sort_order'];
	
	public function childrens()
	{
	    return $this->hasMany($this,'parent');
	}
}

