<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('profile_id')->unsigned();
            $table->foreign('profile_id')->references('id')->on('profiles')->onUpdate('cascade');

            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onUpdate('cascade');

            $table->integer('user_status_id')->unsigned();
            $table->foreign('user_status_id')->references('id')->on('user_status')->onUpdate('cascade');

            $table->string('name');
            $table->string('email');
            $table->string('username')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->boolean('status');
            $table->boolean('warn');
            $table->string('cel');
            $table->string('phone')->nullable();
            $table->boolean('gender')->default(1);
            $table->string('image')->nullable();
            $table->text('obs')->nullable();
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
        Schema::dropIfExists('users');
    }
}
