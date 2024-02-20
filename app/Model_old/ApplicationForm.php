<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ApplicationForm extends Model
{
	protected $table = 'application_form';
    protected $fillable = [
        'application_id', 'student_id', 'university_id', 'course_id', 'personal_information', 'educational_background', 'language_qualification', 'reasons_to_choose', 'family', 'financial_support', 'mailling_address', 'declaration', 'application_fee', 'uploads','status', 'send_to_uni' , 'display'
    ];

   public function university(){
		return $this->belongsTo('App\Model\UniversityDetail', 'university_id');
   }

   public function course(){
		return $this->hasOne('App\Model\Course', 'id', 'course_id');
   }

   public function student(){
		return $this->belongsTo('App\Model\Student', 'student_id', 'user_id');
   }

}
