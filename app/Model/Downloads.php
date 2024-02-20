<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Downloads extends Model
{
    protected $table = 'downloads';
    protected $fillable = ['product_id','name','email','phone'];

    function product() {
        return $this->hasOne('App\Model\Product', 'id', 'product_id');
    }
}
