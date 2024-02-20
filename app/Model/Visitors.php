<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Visitors extends Model
{
    protected $table = "visitors";
    protected $fillable = ['ip_address', 'uri', 'referer', 'device', 'referer_type', 'location', 'region', 'city', 'timezone', 'latitude', 'longitude', 'user_id'];
}
