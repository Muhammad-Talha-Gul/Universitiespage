<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SocialiteUser extends Model
{
    protected $table = 'socialite_users';
    protected $fillable = ['provider', 'provider_id', 'name', 'email', 'username', 'avatar'];
}
