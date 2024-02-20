<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('product_code');
            $table->Text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->integer('custom_product_type')->unsigned();
            $table->integer('custom_category')->unsigned()->nullable();
            $table->string('product_sku')->nullable();
            $table->float('price', 7,2)->nullable();
            $table->tinyInteger('discount_percentage')->nullable();
            $table->integer('opening_quantity')->nullable();
            $table->integer('minimum_quantity')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('image_ext', 10)->nullable();
            $table->json('product_attributes')->nullable();
            $table->boolean('product_discontinue')->default(0);
            $table->boolean('product_publish')->default(0);
            $table->boolean('is_active')->default(1);
            $table->foreign('custom_product_type')->references('id')->on('custom_product_types');
            $table->foreign('custom_category')->references('id')->on('custom_categories');
            $table->index(['id', 'custom_product_type', 'custom_category']);
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
        Schema::dropIfExists('products');
    }
}
