<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Preferences extends Model
{
    protected $table = "preferences";
    protected $fillable = ['mailer', 'footer_meta', 'footer_text', 'footer_logo', 'contact_email', 'contact_social', 'contact_meta', 'contact_address', 'logo', 'sticky_logo', 'general_meta','counters','banner','banner_link','analytics_view','analytics_file','enabled_analytics','analytics_code','notification_settings', 'optimize_image'];

    public function getNotificationSettingsAttribute($value)
    {
    	return json_decode($value,true);
    }

    public function getGeneralMetaAttribute($value)
    {
    	return json_decode($value,true);
    }

}