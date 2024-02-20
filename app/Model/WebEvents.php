<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WebEvents extends Model
{
    protected $table = 'web_events';
    protected $fillable = ['type','action_button','page_hit_name', 'whatsapp_button_text'];
}