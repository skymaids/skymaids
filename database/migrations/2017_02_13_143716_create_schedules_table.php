<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');

            $table->integer('address_id')->unsigned();
            $table->foreign('address_id')->references('id')->on('addresses')->onUpdate('cascade');

            $table->integer('team_id')->unsigned();
            $table->foreign('team_id')->references('id')->on('teams')->onUpdate('cascade');

            $table->date('day');
            $table->time('start');
            $table->time('end');
            $table->text('obs');
            $table->boolean('message');
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
        Schema::dropIfExists('schedules');
    }
}
