<?php

use Illuminate\Database\Seeder;
use Modules\Schedule\Entities\Status;

/**
 * Class ScheduleStatusTableSeeder
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @Date 02/15/2017
 * @version 1.0
 */
class ScheduleStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::truncate();

        factory(Status::class)->create(
            [
                'id'   => 1,
                'name' => 'None'
            ]
        );

        factory(Status::class)->create(
            [
                'id'   => 2,
                'name' => 'Waiting'
            ]
        );

        factory(Status::class)->create(
            [
                'id'   => 3,
                'name' => 'Confirmed'
            ]
        );

        factory(Status::class)->create(
            [
                'id'   => 4,
                'name' => 'Cancel'
            ]
        );
    }
}