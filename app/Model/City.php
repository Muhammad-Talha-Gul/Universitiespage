<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = "countries";
    public $timestamps = false;

    protected $hidden = [
    	'cod', 'country'
    ];
    protected $fillable = [
        'selected'
    ];

    /**
     * Saving categories
     *
     * @param string $request get req attributes
     *
     * @return \Illuminate\Http\Response
     */
    public function saveCountry($country)
    {
        if (!empty($country)) {
            $this->country = filter_var($country['name'], FILTER_SANITIZE_STRING);
            $this->code = filter_var($country['code'], FILTER_SANITIZE_STRING);
            $this->image = $country['image'];
            $this->save();
            $json['type'] = 'success';
            $json['message'] = trans('lang.country_added');
            return $json;
        }
    }

        /**
     * Saving categories
     *
     * @param string $request get req attributes
     *
     * @return \Illuminate\Http\Response
     */
    public function updateCountry($country, $id)
    {
        if (!empty($country)) {
            $country_obj = self::find($id);
            $country_obj->country = filter_var($country['name'], FILTER_SANITIZE_STRING);
            $country_obj->code = filter_var($country['code'], FILTER_SANITIZE_STRING);
            $country_obj->image = $country['image'];
            $country_obj->save();
            $json['type'] = 'success';
            $json['message'] = trans('lang.country_added');
            return $json;
        }
    }
}
