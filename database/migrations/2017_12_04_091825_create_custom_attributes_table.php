<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('custom_product_type')->unsigned();
            $table->string('attribute_name');
            $table->string('attribute_slug');
            $table->string('input_type');
            $table->string('attribute_data')->nullable();
            $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('custom_attributes');
    }
}
