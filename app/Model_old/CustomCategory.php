<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CustomCategory extends Model
{
    protected $fillable = [

        'custom_product_type', 'name', 'slug','parent_id','slider_id'
    ];

    function customProductType() {

        return $this->belongsTo('App\Model\CustomProductType','custom_product_type');
    }

    function customPostType() {

        return $this->belongsTo('App\Model\CustomPostType','custom_post_type');
    }

    function products()
    {
        return $this->hasMany('App\Model\Product','custom_category','id');
    }

    function posts()
    {
        return $this->hasMany('App\Model\Posts','category_id','id');
    }

    public function parent()
    {
        return $this->hasOne($this, 'id', 'parent_id');
    }

    public function childrens()
    {
        return $this->hasMany($this,'parent_id');
    }

    public function slugify($value, $offset = 0)
    {
        $slug = str_slug($value);
        $check = $this->where('slug', $slug)->count();
        if($check > $offset){
            $s_count = $check+1;
            $slug = $slug.'-'.$s_count;
        }
        return $slug;
    }

    public static function creator($data)
    {
        $cat = new CustomCategory;
        $cat->custom_product_type = ($data->custom_product_type=='others')?null:$data->custom_product_type;
        $cat->custom_post_type = $data->custom_post_type;
        $cat->parent_id = $data->parent_id;
        $cat->name = $data->name;
        $cat->slug = $cat->slugify($data->name);
        $cat->description = $data->description;
        $cat->sort_order = $data->sort_order;
        $cat->meta_title = $data->meta_title;
        $cat->meta_description = $data->meta_description;
        $cat->meta_keywords = $data->meta_keywords;
        $cat->image = ($data->has('image')?$data->image:null);
        $cat->color = ($data->has('color')?$data->color:null);
        $cat->slider_id = ($data->has('slider_id')?$data->slider_id:null);
        $cat->is_active = $data->has('is_active')?1:0;
        $cat->save();
    }

    public static function updator($id,$data)
    {
        $cat = CustomCategory::find($id);
        $cat->custom_product_type = ($data->custom_product_type=='others')?null:$data->custom_product_type;
        $cat->custom_post_type = $data->custom_post_type;
        $cat->parent_id = $data->parent_id;
        $cat->name = $data->name;
        $cat->slug = $cat->slugify($data->name,1);
        $cat->description = $data->description;
        $cat->sort_order = $data->sort_order;
        $cat->meta_title = $data->meta_title;
        $cat->meta_description = $data->meta_description;
        $cat->meta_keywords = $data->meta_keywords;
        $cat->image = ($data->has('image')?$data->image:null);
        $cat->color = ($data->has('color')?$data->color:null);
        $cat->slider_id = ($data->has('slider_id')?$data->slider_id:null);
        $cat->is_active = $data->has('is_active')?1:0;
        $cat->save();
    }
}
