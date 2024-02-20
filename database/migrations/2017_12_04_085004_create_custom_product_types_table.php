<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomProductTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_product_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->tinyInteger('sort_order')->default(0);
            $table->boolean('has_image_gallery')->default(0);
            $table->boolean('has_product_seo')->default(0);
            $table->boolean('has_product_features')->default(0);
            $table->boolean('is_category_enable')->default(1);
            $table->boolean('show_sku')->default(0);
            $table->boolean('show_price')->default(1);
            $table->boolean('show_discount')->default(0);
            $table->boolean('show_quantity')->default(0);
            $table->boolean('show_min_quantity')->default(0);
            $table->boolean('show_opening_quantity')->default(0);
            $table->boolean('show_product_image')->default(1);
            $table->string('image_size_large')->nullable();
            $table->string('image_size_medium')->nullable();
            $table->string('image_size_small')->nullable();
            $table->string('image_size_thumb')->nullable();
            $table->string('image_size_mobile')->nullable();
            $table->boolean('show_product_discontinue')->default(0);
            $table->boolean('show_product_publish')->default(0);
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custom_product_types');
    }
}