<?php

use Illuminate\Database\Seeder;
use Modules\Team\Entities\Team;

/**
 * Class TeamTableSeeder
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @Date 02/15/2017
 * @version 1.0
 */
class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::truncate();

        factory(Team::class)->create(
            [
                'id' => 1,
                'company_id' => 1,
                'name' => 'Car #01',
                'calendar' => '',
                'color' => '#cccccc'
            ]
        );

        factory(Team::class)->create(
            [
                'id' => 2,
                'company_id' => 1,
                'name' => 'Car #02',
                'calendar' => '',
                'color' => '#cccccc'
            ]
        );

        factory(Team::class)->create(
            [
                'id' => 3,
                'company_id' => 1,
                'name' => 'Car #03',
                'calendar' => '',
                'color' => '#cccccc'
            ]
        );

        factory(Team::class)->create(
            [
                'id' => 4,
                'company_id' => 1,
                'name' => 'Car #04',
                'calendar' => '',
                'color' => '#cccccc'
            ]
        );

        factory(Team::class)->create(
            [
                'id' => 5,
                'company_id' => 1,
                'name' => 'Car #05',
                'calendar' => '',
                'color' => '#cccccc'
            ]
        );

        factory(Team::class)->create(
            [
                'id' => 6,
                'company_id' => 1,
                'name' => 'Car #06',
                'calendar' => '',
                'color' => '#cccccc'
            ]
        );

        factory(Team::class)->create(
            [
                'id' => 7,
                'company_id' => 1,
                'name' => 'Car #07',
                'calendar' => '',
                'color' => '#cccccc'
            ]
        );

        factory(Team::class)->create(
            [
                'id' => 8,
                'company_id' => 1,
                'name' => 'Car #08',
                'calendar' => '',
                'color' => '#cccccc'
            ]
        );

        factory(Team::class)->create(
            [
                'id' => 9,
                'company_id' => 1,
                'name' => 'Car #09',
                'calendar' => '',
                'color' => '#cccccc'
            ]
        );

        factory(Team::class)->create(
            [
                'id' => 10,
                'company_id' => 1,
                'name' => 'Car #10',
                'calendar' => '',
                'color' => '#cccccc'
            ]
        );
    }
}