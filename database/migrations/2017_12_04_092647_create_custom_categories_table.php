<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('custom_product_type')->unsigned()->nullable();
            $table->string('name');
            $table->string('slug');
            $table->tinyInteger('sort_order')->default(0);
            $table->boolean('is_active');
            $table->foreign('custom_product_type')->references('id')->on('custom_product_types');
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
        Schema::dropIfExists('custom_categories');
    }
}
