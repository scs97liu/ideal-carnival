<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('to_user')->unsigned();
            $table->integer('from_user')->unsigned();
            $table->text('text');
            $table->integer('log_id')->unsigned()->nullable();
            $table->boolean('request_appointment');
            $table->boolean('viewed')->default(false);
            $table->timestamps();

            $table->foreign('to_user')->references('id')->on('users');
            $table->foreign('from_user')->references('id')->on('users');
            $table->foreign('log_id')->references('id')->on('logs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
