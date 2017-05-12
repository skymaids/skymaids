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

            $table->integer('user_address_id')->unsigned();
            $table->foreign('user_address_id')->references('id')->on('user_addresses')->onUpdate('cascade');

            $table->integer('team_id')->unsigned();
            $table->foreign('team_id')->references('id')->on('teams')->onUpdate('cascade');

            $table->integer('schedule_status_id')->unsigned()->default(1);
            $table->foreign('schedule_status_id')->references('id')->on('schedule_status')->onUpdate('cascade');

            $table->date('day');
            $table->time('start');
            $table->time('end');
            $table->text('obs')->nullable();
            $table->boolean('key')->default(0);
            $table->boolean('checked')->default(1);
            $table->dateTime('message')->nullable();
            $table->dateTime('confirm')->nullable();
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
