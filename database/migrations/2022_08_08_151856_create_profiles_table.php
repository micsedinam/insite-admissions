<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('index_number')->unique();
            $table->string('level');
            $table->integer('user_id')->unsigned();
            $table->integer('dept_id')->unsigned();
            //$table->integer('prog_id')->unsigned();
            $table->string('semester');
            $table->string('profile_photo');
            $table->timestamps();
            $table->foreign('dept_id')->references('id')->on('departments');
            //$table->foreign('prog_id')->references('id')->on('programmes');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
