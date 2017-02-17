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
use Modules\Team\Entities\Team;

$faker = Faker\Factory::create('pt_BR');

$factory->define(Team::class, function () use ($faker)
{
    return [
        'company_id' => rand(DB::table('companies')->min('id'), DB::table('companies')->max('id')),
        'name' => $faker->name,
        'calendar' => $faker->url,
        'color' => $faker->hexColor
    ];
});