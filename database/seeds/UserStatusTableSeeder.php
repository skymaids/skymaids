<?php

use Illuminate\Database\Seeder;
use Modules\User\Entities\Status;

/**
 * Class UserStatusTableSeeder
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @Date 02/15/2017
 * @version 1.0
 */
class UserStatusTableSeeder extends Seeder
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
                'name' => 'Active'
            ]
        );

        factory(Status::class)->create(
            [
                'id'   => 2,
                'name' => 'Inactive'
            ]
        );
    }
}