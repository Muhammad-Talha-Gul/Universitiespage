<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CustomAttribute extends Model
{
    protected $fillable = [

        'attribute_name', 'attribute_slug', 'custom_product_type', 'input_type'
    ];

    function customProductType() {

        return $this->belongsTo('App\Model\CustomProductType','custom_product_type');
    }

    function customPostType() {

        return $this->belongsTo('App\Model\CustomPostType','custom_post_type');
    }

    public static function creator($data)
    {
    	$attr = new CustomAttribute;
    	$attr->attribute_name = $data->attribute_name;
    	$attr->attribute_slug = strtolower(str_replace(" ", "_", $data->attribute_name));
    	$attr->input_type = $data->input_type;
        $attr->custom_product_type = $data->custom_product_type;
    	$attr->custom_post_type = $data->custom_post_type;
    	$attr->attribute_data = $data->attribute_data;
    	$attr->is_active = $data->has('is_active')?1:0;
    	$attr->save();
    }

    public static function updator($id,$data)
    {
        $attr = CustomAttribute::find($id);
        $attr->attribute_name = $data->attribute_name;
        $attr->attribute_slug = strtolower(str_replace(" ", "_", $data->attribute_name));
        $attr->input_type = $data->input_type;
        $attr->custom_product_type = $data->custom_product_type;
        $attr->custom_post_type = $data->custom_post_type;
        $attr->attribute_data = $data->attribute_data;
        $attr->is_active = $data->has('is_active')?1:0;
        $attr->save();
    }
}
