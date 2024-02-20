<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PageComponents extends Model
{
    protected $table = "pages_components";
    protected $fillable = ['page_id', 'title', 'type', 'meta', 'sort_order'];
    public $timestamps = false;
}
