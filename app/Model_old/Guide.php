<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
	protected $table = 'guides';
    protected $fillable = [
        'user_id','guide_type','title','sub_title','university_id','subject_id','short_description','description','image','image_ext','is_active','views','ip','slug','is_featured','sort_order','seo'
    ];
    

    public function getSeoAttribute($value)
    {
        $data = json_decode($value);
        return $data;
    }

    function user() {
        return $this->hasOne('App\User', 'id','user_id');
    }

    function subject() {
        return $this->hasOne('App\Model\Subject', 'id','subject_id');
    }

    function university() {
        return $this->hasOne('App\Model\UniversityDetail', 'id','university_id');
    }

    function comments() {
        return $this->hasMany('App\Model\PostsComments', 'post_id');
    }

    public function approve_comments() {
        return $this->comments()->where('is_active','=', 1);
    }

}
