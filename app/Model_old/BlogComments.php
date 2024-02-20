<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlogComments extends Model
{
    protected $table = 'blog_comments';
    protected $fillable = ['name', 'email', 'phone', 'subject', 'comment', 'blog_id','is_active'];

    public function has_blog()
    {
    	return $this->hasOne('App\Model\Blog', 'id', 'blog_id');
    }
}
