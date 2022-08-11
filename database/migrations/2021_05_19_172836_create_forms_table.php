<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->increments('form_id');
            $table->integer('user_id')->unsigned();
            $table->string('firstname');
            $table->string('othername')->nullable();
            $table->string('lastname');
            $table->date('dob');
            $table->string('phone');
            $table->string('email');
            $table->string('post_address');
            $table->string('gender');
            $table->string('country');
            $table->string('nationality');
            $table->string('marital_status');
            $table->string('children');
            $table->string('residence');
            $table->string('physical_challenge');
            $table->string('challenge')->nullable();
            $table->string('passport_photo');
            $table->integer('dept_id')->unsigned();
            $table->integer('prog_id')->unsigned();
            $table->string('duration');
            $table->string('prog_choice');
            $table->string('hostel');
            $table->string('instruction_language');
            $table->string('lecture_period');
            $table->string('school_attended');
            $table->string('year_started');
            $table->string('year_completed');
            $table->string('certificate_name');
            $table->string('certificate_upload');
            $table->string('one_referee_name');
            $table->string('one_referee_phone');
            $table->string('one_referee_email')->nullable();
            $table->string('one_referee_occupation');
            $table->string('one_referee_address');
            $table->string('two_referee_name');
            $table->string('two_referee_phone');
            $table->string('two_referee_email')->nullable();
            $table->string('two_referee_occupation');
            $table->string('two_referee_address');
            $table->string('form_complete');
            $table->string('review_status')->nullable();
            $table->timestamps();
        });

        Schema::table('forms', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('dept_id')->references('id')->on('departments');
            $table->foreign('prog_id')->references('id')->on('programmes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forms');
    }
}
