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
use Modules\User\Entities\Status;

$faker = Faker\Factory::create('pt_BR');

$factory->define(Status::class, function () use ($faker) {

    return [
        'name' => $faker->company
    ];
});