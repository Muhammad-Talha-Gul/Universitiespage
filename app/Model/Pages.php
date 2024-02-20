<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $table = "pages";
    protected $fillable = ['title', 'slug', 'meta', 'meta_title', 'meta_desc', 'meta_keywords', 'is_default', 'is_home', 'show_title','slider_id','header_image', 'seo','custom_css'];

    public function getMetaAttribute($value)
    {
        $data = json_decode($value, true);
        return $data;
    }

    public function setSeoAttribute($value)
    {
    	$this->attributes['seo'] = json_encode($value);
    }

    public function getSeoAttribute($value)
    {
    	return json_decode($value);
    }
}
