<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CustomProductType extends Model
{
    protected $fillable = [

        'name'
    ];

    function customCategory() {

        return $this->hasMany('App\Model\CustomCategory', 'custom_product_type', 'id');
    }

    function customAttribute() {

        return $this->hasMany('App\Model\CustomAttribute', 'custom_product_type', 'id');
    }

    function products() {

        return $this->hasMany('App\Model\Product', 'custom_product_type', 'id')->OrderBy('id','DESC');
    }

    public static function creator($data)
    {
        $type = New CustomProductType;
        $type->name = $data->name;
        $type->slug  = strtolower(str_replace(" ", "_", $data->name));
        $type->sort_order = $data->sort_order;
        $type->has_image_gallery = ($data->has('has_image_gallery'))?1:0;
        $type->has_product_seo = ($data->has('has_product_seo'))?1:0;
        $type->has_product_features = ($data->has('has_product_features'))?1:0;
        $type->is_category_enable = ($data->has('is_category_enable'))?1:0;
        $type->show_sku = ($data->has('show_sku'))?1:0;
        $type->show_price = ($data->has('show_price'))?1:0;
        $type->show_discount = ($data->has('show_discount'))?1:0;
        $type->show_quantity = ($data->has('show_quantity'))?1:0;
        $type->show_min_quantity = ($data->has('show_min_quantity'))?1:0;
        $type->show_opening_quantity = ($data->has('show_opening_quantity'))?1:0;
        $type->show_product_image = ($data->has('show_product_image'))?1:0;
        $type->show_product_discontinue = ($data->has('show_product_discontinue'))?1:0;
        $type->show_product_publish = ($data->has('show_product_publish'))?1:0;
        $type->start_date = ($data->has('start_date'))?1:0;
        $type->end_date = ($data->has('end_date'))?1:0;
        $type->timings = ($data->has('timings'))?1:0;
        $type->image_size_large = $data->image_size_large;
        $type->image_size_medium = $data->image_size_medium;
        $type->image_size_small = $data->image_size_small;
        $type->image_size_thumb = $data->image_size_thumb;
        $type->image_size_mobile = $data->image_size_mobile;
        $type->is_active = ($data->has('is_active'))?1:0;
        $type->save();
    }

    public static function updator($id,$data)
    {
        $type = CustomProductType::find($id);
        $type->name = $data->name;
        $type->slug  = strtolower(str_replace(" ", "_", $data->name));
        $type->sort_order = $data->sort_order;
        $type->has_image_gallery = ($data->has('has_image_gallery'))?1:0;
        $type->has_product_seo = ($data->has('has_product_seo'))?1:0;
        $type->has_product_features = ($data->has('has_product_features'))?1:0;
        $type->is_category_enable = ($data->has('is_category_enable'))?1:0;
        $type->show_sku = ($data->has('show_sku'))?1:0;
        $type->show_price = ($data->has('show_price'))?1:0;
        $type->show_discount = ($data->has('show_discount'))?1:0;
        $type->show_quantity = ($data->has('show_quantity'))?1:0;
        $type->show_min_quantity = ($data->has('show_min_quantity'))?1:0;
        $type->show_opening_quantity = ($data->has('show_opening_quantity'))?1:0;
        $type->show_product_image = ($data->has('show_product_image'))?1:0;
        $type->show_product_discontinue = ($data->has('show_product_discontinue'))?1:0;
        $type->show_product_publish = ($data->has('show_product_publish'))?1:0;
        $type->start_date = ($data->has('start_date'))?1:0;
        $type->end_date = ($data->has('end_date'))?1:0;
        $type->timings = ($data->has('timings'))?1:0;
        $type->image_size_large = $data->image_size_large;
        $type->image_size_medium = $data->image_size_medium;
        $type->image_size_small = $data->image_size_small;
        $type->image_size_thumb = $data->image_size_thumb;
        $type->image_size_mobile = $data->image_size_mobile;
        $type->is_active = ($data->has('is_active'))?1:0;
        $type->save();
    }
}
