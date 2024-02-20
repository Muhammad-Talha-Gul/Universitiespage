<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ContactButton extends Model
{
    protected $table = 'contact_button';
    protected $fillable = ['student_id', 'university_id', 'course_id', 'date'];
}