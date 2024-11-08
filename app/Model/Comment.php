<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $primaryKey = 'comment_id';
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'comment',
        'article_id',
        'article_url',
    ];

    public function replies()
    {
        return $this->hasMany(Reply::class, 'parent_comment_id', 'comment_id');
    }

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'article_id', 'id');
    }
}
