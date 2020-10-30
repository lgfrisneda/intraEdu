<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supports', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('type_support_id');
            $table->string('file');
            $table->integer('order');
            $table->unsignedBigInteger('lesson_id');

            $table->foreign('type_support_id')->references('id')->on('type_supports')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('lesson_id')->references('id')->on('lessons')
            ->onDelete('cascade')
            ->onUpdate('cascade');

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
        Schema::dropIfExists('supports');
    }
}
