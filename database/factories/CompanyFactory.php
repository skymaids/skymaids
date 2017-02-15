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
use Modules\Base\Entities\Company;
use Illuminate\Support\Facades\DB;

$faker = Faker\Factory::create('pt_BR');

$factory->define(Company::class, function () use ($faker)
{
    return [
        'name' => $faker->company,
    ];
});