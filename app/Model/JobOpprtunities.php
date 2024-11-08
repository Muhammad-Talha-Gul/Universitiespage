<?php

namespace App\Model;

use App\JobApply;
use Illuminate\Database\Eloquent\Model;

class JobOpprtunities extends Model
{
    protected $fillable = ['title', 'job_type', 'city', 'province', 'country', 'site_based', 'requirements', 'responsibilities', 'description', 'skills', 'experience'];
    public function jobApplies()
    {
        return $this->hasMany(JobApply::class, 'job_id', 'id'); 
    }
}
