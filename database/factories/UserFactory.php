<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
use Illuminate\Support\Facades\DB;
use Modules\User\Entities\User;

$faker = Faker\Factory::create('pt_BR');

$factory->define(User::class, function () use ($faker)
{
    return [
        'profile_id' => rand(DB::table('profiles')->min('id'), DB::table('profiles')->max('id')),
        'company_id' => rand(DB::table('companies')->min('id'), DB::table('companies')->max('id')),
        'name' => $faker->name,
        'username' => $faker->userName,
        'email' => $faker->email,
        'password' => Hash::make('123456'),
        'remember_token' => str_random(10),
        'status' => $faker->boolean,
        'warn' => $faker->boolean,
        'cel' => $faker->phoneNumber,
        'phone' => $faker->phoneNumber,
        'gender' => 1,
        'obs' => $faker->sentences
    ];
});