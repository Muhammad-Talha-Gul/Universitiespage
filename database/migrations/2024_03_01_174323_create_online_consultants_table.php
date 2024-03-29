<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOnlineConsultantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_consultants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('application_type');
            $table->string('student_name');
            $table->string('student_email')->nullable();
            $table->string('student_phone_number')->nullable();
            $table->string('student_last_education')->nullable();
            $table->string('student_country')->nullable();
            $table->string('student_state')->nullable();
            $table->string('student_city')->nullable();
            $table->string('student_apply_for')->nullable();
            $table->string('student_passport_image')->nullable();
            $table->text('student_last_education_image')->nullable();
            $table->string('first_followup')->nullable();
            $table->string('second_followup')->nullable();
            $table->string('third_followup')->nullable();
            $table->string('choosable_status')->nullable();
            $table->timestamps();
            $table->string('student_assigned_employee')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('online_consultants');
    }
}
