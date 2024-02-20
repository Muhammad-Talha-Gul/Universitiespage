<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PostReviews extends Model
{
    protected $table = 'post_reviews';
    protected $fillable = ['post_id', 'user_id', 'name', 'email', 'summary', 'review', 'price', 'value', 'quality', 'is_active'];

    public function post()
    {
    	return $this->hasOne('App\Model\Posts', 'id', 'post_id');
    }

    public function user()
    {
    	return $this->hasOne('App\User', 'id', 'user_id');
    }
}
