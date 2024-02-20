<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Auth;

class Blog extends Model
{
    protected $fillable = [
        'user_id','category_id','title','short_description','description','image','image_ext','is_active','views','ip','slug','is_featured','sort_order','seo'
    ];
    

    public function getSeoAttribute($value)
    {
        $data = json_decode($value);
        return $data;
    }

    function user() {
        return $this->hasOne('App\User', 'id','user_id');
    }

    function category() {
        return $this->hasOne('App\Model\BlogCategory', 'id','category_id');
    }

    function comments() {
        return $this->hasMany('App\Model\PostsComments', 'post_id');
    }

    public function approve_comments() {
        return $this->comments()->where('is_active','=', 1);
    }

    public static function creator($data)
    {   
        $blog = new Blog;
        $blog->user_id = Auth::user()->id;
        $blog->category_id = $data->category_id;
        $blog->title = $data->title;
        $blog->slug = (isset($data->slug)) ? $data->slug : str_slug($data->title);
        $blog->description = $data->description;
        $blog->short_description = $data->short_description;
        $blog->image = ($data->has('image')?$data->image:null);
        $blog->views = $data->views;
        $blog->seo = json_encode($data->seo);
        $blog->is_active = ($data->has('is_active'))?1:0;
        $blog->custom_post_type = $data->custom_post_type;
        $blog->sort_order = $data->sort_order;
        $blog->post_attributes = ($data->has('post_attributes'))?$data->post_attributes:null;
        $blog->save();
    }

    public static function updator($id,$data)
    {
        $blog = Blog::find($id);
        $blog->user_id = Auth::user()->id;
        $blog->category_id = $data->category_id;
        $blog->title = $data->title;
        $blog->slug = (isset($data->slug)) ? $data->slug : str_slug($data->title);
        $blog->description = $data->description;
        $blog->short_description = $data->short_description;
        $blog->image = ($data->has('image')?$data->image:null);
        $blog->views = $data->views;
        $blog->seo = json_encode($data->seo);
        $blog->is_active = ($data->has('is_active'))?1:0;
        $blog->sort_order = $data->sort_order;
        $blog->custom_post_type = $data->custom_post_type;
        $blog->post_attributes = ($data->has('post_attributes'))?$data->post_attributes:null;
        $blog->save();
    }
}
