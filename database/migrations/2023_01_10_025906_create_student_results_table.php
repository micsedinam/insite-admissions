<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('index_number');
            $table->string('course_code');
            $table->string('level');
            $table->string('semester');
            $table->integer('dept_id')->unsigned();
            $table->string('first_quiz');
            $table->string('second_quiz');
            $table->string('first_assessment');
            $table->string('second_assessment');
            $table->string('third_assessment');
            $table->string('theory_exam');
            $table->string('practical_exam');
            $table->string('total_marks')->default(0);
            $table->timestamps();
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
        Schema::dropIfExists('student_results');
    }
}
