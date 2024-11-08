<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\EducationDetail;
use App\Model\ExperienceDetail;
use App\SkillsLanguages;
class Resume extends Model
{
     protected $fillable = [
       'education_details', 'experience_details', 'skills', 'languages' , 'other_languages_data','driving_licence' , 'hobbies_and_interest' , 'awards' , 'projects', 'student_id', 'full_name', 'email', 'phone_number', 'gender', 'birth_date', 'nationality',
        'about_yourself', 'profile_image', 'postal_code', 'city', 'country', 'address',
    ];


    public function skillsLanguages()
    {
        return $this->hasMany(SkillsLanguages::class);
    }

    public function educationDetails()
    {
        return $this->hasMany(EducationDetail::class);
    }

    public function experienceDetails()
    {
        return $this->hasMany(ExperienceDetail::class);
    }
    
}
