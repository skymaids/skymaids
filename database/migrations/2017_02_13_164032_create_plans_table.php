<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');

            $table->integer('plan_type_id')->unsigned();
            $table->foreign('plan_type_id')->references('id')->on('plan_types')->onUpdate('cascade');

            $table->integer('frequency_id')->unsigned();
            $table->foreign('frequency_id')->references('id')->on('frequencies')->onUpdate('cascade');

            $table->integer('discount');
            $table->decimal('price', 5, 2);
            $table->date('start');
            $table->date('end');
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
        Schema::dropIfExists('plans');
    }
}
