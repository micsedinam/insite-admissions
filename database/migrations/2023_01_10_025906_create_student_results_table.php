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
            $table->string('first_quiz')->default(0);
            $table->string('second_quiz')->default(0);
            $table->string('first_assessment')->default(0);
            $table->string('second_assessment')->default(0);
            $table->string('third_assessment')->default(0);
            $table->string('theory_exam')->default(0);
            $table->string('practical_exam')->default(0);
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
