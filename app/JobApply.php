<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobApply extends Model
{
    protected $fillable = ['name', 'email', 'phone_number','start_date', 'resume', 'job_id'];
}
