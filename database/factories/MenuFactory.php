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
use Modules\Menu\Entities\Menu;
use Illuminate\Support\Facades\DB;

$faker = Faker\Factory::create('pt_BR');

$factory->define(Menu::class, function () use ($faker)
{
    return [
        'name' => $faker->name,
        'title' => $faker->sentence,
        'route' => 'dashboard',
        'icon' => 'md-view-dashboard',
        'order' => 1
    ];
});