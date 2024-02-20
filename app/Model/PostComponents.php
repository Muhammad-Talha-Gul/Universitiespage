<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PostComponents extends Model
{
    protected $table = "post_components";
    protected $fillable = ['post_id', 'title', 'type', 'meta', 'sort_order'];
    public $timestamps = false;

    public function getMetaAttribute($value)
    {
        $data = json_decode($value, true);
        return $data;
    }
}
