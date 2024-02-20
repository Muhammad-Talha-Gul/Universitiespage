<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CustomPostType extends Model
{
    protected $table = 'custom_post_types';
    protected $fillable = [
         'name', 'slug', 'sort_order', 'has_post_seo', 'is_category_enable', 'has_featured_image', 'has_long_desc', 'has_desc', 'has_author', 'has_image_gallery', 'show_sku', 'show_price', 'show_quantity', 'show_discount', 'has_brands', 'filters', 'importable', 'is_active','inventory_enabled','has_related','has_logs'];

    function customCategory() {

        return $this->hasMany('App\Model\CustomCategory', 'custom_post_type', 'id');
    }

    function customAttribute() {

        return $this->hasMany('App\Model\CustomAttribute', 'custom_post_type', 'id');
    }

    public static function creator($data)
    {
        $type = New CustomPostType;
        $type->name = $data->name;
        $type->slug  = strtolower(str_replace(" ", "_", $data->name));
        $type->sort_order = $data->sort_order;
        $type->has_post_seo = ($data->has('has_post_seo'))?1:0;
        $type->is_category_enable = ($data->has('is_category_enable'))?1:0;
        $type->has_featured_image = ($data->has('has_featured_image'))?1:0;
        $type->has_long_desc = ($data->has('has_long_desc'))?1:0;
        $type->has_desc = ($data->has('has_desc'))?1:0;
        $type->has_author = ($data->has('has_author'))?1:0;
        $type->has_image_gallery = ($data->has('has_image_gallery'))?1:0;
        $type->show_sku = ($data->has('show_sku'))?1:0;
        $type->show_price = ($data->has('show_price'))?1:0;
        $type->show_quantity = ($data->has('show_quantity'))?1:0;
        $type->show_discount = ($data->has('show_discount'))?1:0;
        $type->has_brands = ($data->has('has_brands'))?1:0;
        $type->filters = ($data->has('filters'))?1:0;
        $type->importable = ($data->has('importable'))?1:0;
        $type->inventory_enabled = ($data->has('inventory_enabled'))?1:0;
        $type->has_related = ($data->has('has_related'))?1:0;
        $type->has_logs = ($data->has('has_logs'))?1:0;
        $type->is_active = ($data->has('is_active'))?1:0;
        $type->save();
    }

    public static function updator($id,$data)
    {
        $type = CustomPostType::find($id);
        $type->name = $data->name;
        $type->slug  = strtolower(str_replace(" ", "_", $data->name));
        $type->sort_order = $data->sort_order;
        $type->has_post_seo = ($data->has('has_post_seo'))?1:0;
        $type->is_category_enable = ($data->has('is_category_enable'))?1:0;
        $type->has_featured_image = ($data->has('has_featured_image'))?1:0;
        $type->has_long_desc = ($data->has('has_long_desc'))?1:0;
        $type->has_desc = ($data->has('has_desc'))?1:0;
        $type->has_author = ($data->has('has_author'))?1:0;
        $type->has_image_gallery = ($data->has('has_image_gallery'))?1:0;
        $type->show_sku = ($data->has('show_sku'))?1:0;
        $type->show_price = ($data->has('show_price'))?1:0;
        $type->show_quantity = ($data->has('show_quantity'))?1:0;
        $type->show_discount = ($data->has('show_discount'))?1:0;
        $type->has_brands = ($data->has('has_brands'))?1:0;
        $type->filters = ($data->has('filters'))?1:0;
        $type->importable = ($data->has('importable'))?1:0;
        $type->inventory_enabled = ($data->has('inventory_enabled'))?1:0;
        $type->has_related = ($data->has('has_related'))?1:0;
        $type->has_logs = ($data->has('has_logs'))?1:0;
        $type->is_active = ($data->has('is_active'))?1:0;
        $type->save();
    }
}
