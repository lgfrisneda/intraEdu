<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_users', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('level_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('level_id')->references('id')->on('levels');
            $table->foreign('user_id')->references('id')->on('users');
            
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
        Schema::dropIfExists('level_users');
    }
}
