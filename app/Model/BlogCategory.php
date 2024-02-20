<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $table = "blog_category";
    protected $fillable = ['name', 'slug', 'description', 'sort_order', 'is_active','seo'];

    public function setSeoAttribute($value)
    {
    	$this->attributes['seo'] = json_encode($value);
    }

    public function getSeoAttribute($value)
    {
        $data = json_decode($value);
        return $data;
    }

    public function blogs(){
        return $this->hasMany('App\Model\Blog', 'category_id');
    }
}
