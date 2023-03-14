<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailFormProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_form_projects', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('status_contact');
            $table->tinyInteger('status_check');
            $table->string('topic_orientation');
            $table->tinyInteger('type_project');
            $table->integer('desired_order');

            $table->integer('lecturer_id');
            $table->foreign('lecturer_id')->references('id')->on('lecturers')->onDelete('cascade');
            $table->integer('form_register_project_id');
            $table->foreign('form_register_project_id')->references('id')->on('form_register_projects')->onDelete('cascade');
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
        Schema::dropIfExists('detail_form_projects');
    }
}
