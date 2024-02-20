<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VisaCountries extends Model
{
    protected $table = 'visa_countries';
    protected $fillable = [
        'country_name','country_image'
    ];
    
    
        public static function creator($data)
    {   
        $VisaCountries = new VisaCountries;
        $VisaCountries->country_name = $data->country_name;
        $VisaCountries->country_image = ($data->has('country_image')?$data->country_image:null);
        $VisaCountries->save();
    }
    
        public static function updator($id,$data)
    {
        $VisaCountries = VisaCountries::find($id);
        $VisaCountries->country_name = $data->country_name;
        $VisaCountries->country_image = ($data->has('country_image')?$data->country_image:null);
        $VisaCountries->save();
    }
    
}
