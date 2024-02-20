<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PostsComments extends Model
{
    protected $table = 'post_comments';
    protected $fillable = ['name', 'email', 'phone', 'company_name','subject', 'comment', 'post_id','is_active'];

    public function has_post()
    {
    	return $this->hasOne('App\Model\Blog', 'id', 'post_id');
    }
}
