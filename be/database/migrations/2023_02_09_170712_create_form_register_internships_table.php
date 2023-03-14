<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormRegisterInternshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_register_internships', function (Blueprint $table) {
            $table->id();
            $table->integer('semester');
            $table->date('time_register');
            $table->tinyInteger('status_contact');
            $table->tinyInteger('status_check');

            $table->integer('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->integer('lecturer_id');
            $table->foreign('lecturer_id')->references('id')->on('lecturers')->onDelete('cascade');
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
        Schema::dropIfExists('form_register_internships');
    }
}
