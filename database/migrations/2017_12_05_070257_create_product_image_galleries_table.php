<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImageGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_image_galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_image_name');
            $table->string('image_ext', 10);
            $table->string('product_image_alt')->nullable();
            $table->string('product_image_title')->nullable();
            $table->tinyInteger('display_order')->default(0);
            $table->boolean('is_featured')->default(0);
            $table->boolean('is_active')->default(1);
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
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
        Schema::dropIfExists('product_image_galleries');
    }
}
