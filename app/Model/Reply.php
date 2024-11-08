<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $primaryKey = 'reply_id';
    protected $fillable = [
        'parent_comment_id',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'comment',
        'article_id',
        'article_url',
    ];

    public function comment()
    {
        return $this->belongsTo(Comment::class, 'parent_comment_id', 'comment_id');
    }
}
