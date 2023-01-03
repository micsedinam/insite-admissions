<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('index_number');
            $table->string('course_code');
            $table->string('semester');
            $table->integer('dept_id')->unsigned();
            $table->string('level');
            $table->string('continuous_assessment');
            $table->string('exam_score');
            $table->string('total_score');
            $table->timestamps();
            $table->foreign('index_number')->references('index_number')->on('profiles');
            $table->foreign('dept_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
