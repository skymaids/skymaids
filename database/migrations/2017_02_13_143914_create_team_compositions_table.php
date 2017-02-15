<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamCompositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_compositions', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('team_id')->unsigned();
            $table->foreign('team_id')->references('id')->on('teams')->onUpdate('cascade');

            $table->integer('schedule_id')->unsigned();
            $table->foreign('schedule_id')->references('id')->on('schedules')->onUpdate('cascade');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');

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
        Schema::dropIfExists('team_compositions');
    }
}
