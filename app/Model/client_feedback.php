<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class client_feedback extends Model
{
    protected $table = 'client_feedbacks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'full_name',
        'contact_number',
        'consultant_id',
        'rating',
        'average_rating',
        'behaviour_satis_level',
        'timely_response',
        'call_response',
        'knowledge',
        'likelihood',
        'customer_experience',
    ];
   
}
