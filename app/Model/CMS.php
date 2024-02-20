<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CMS extends Model
{
    protected $table = 'cms';
    protected $fillable = ['page', 'meta', 'seo_title', 'seo_desc', 'seo_tags'];
}
