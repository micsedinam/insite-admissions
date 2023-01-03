<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContinuousAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('continuous_assessments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('index_number');
            $table->string('course_code');
            $table->string('quiz1');
            $table->string('quiz2')->default(0);
            $table->string('assessment1')->default(0);
            $table->string('assessment2')->default(0);
            $table->string('assessment3')->default(0);
            $table->string('total_ca')->default(0);
            $table->timestamps();
            //$table->foreign('index_number')->references('index_number')->on('profiles');
            //$table->foreign('course_code')->references('course_code')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('continuous_assessments');
    }
}
