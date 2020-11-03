<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('level_id');
            $table->string('slug');
            $table->integer('order');
            $table->text('syllabus')->nullable();
            $table->mediumText('file')->nullable();

            $table->foreign('level_id')->references('id')->on('levels');

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
        Schema::dropIfExists('courses');
    }
}
