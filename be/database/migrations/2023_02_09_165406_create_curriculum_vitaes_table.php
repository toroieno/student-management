<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurriculumVitaesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculum_vitaes', function (Blueprint $table) {
            $table->id();
            $table->string('skill')->nullable();
            $table->string('hobby')->nullable();
            $table->string('education')->nullable();
            $table->string('activity')->nullable();
            $table->string('experience')->nullable();
            $table->string('project')->nullable();
            $table->text('summary')->nullable();
            $table->integer('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
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
        Schema::dropIfExists('curriculum_vitaes');
    }
}
