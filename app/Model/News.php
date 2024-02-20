<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Auth;

class News extends Model
{
    protected $table='news';
    protected $fillable = ['university_id', 'consultant_id', 'title','description'];

    function university() {
        return $this->hasOne('App\Model\UniversityDetail', 'university_id');
    }

    function consultant() {
        return $this->hasOne('App\Model\Consultant', 'consultant_id');
    }
}
