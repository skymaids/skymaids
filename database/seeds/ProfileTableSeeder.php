<?php

use Illuminate\Database\Seeder;
use Modules\Base\Entities\Profile;

/**
 * Class ProfileTableSeeder
 * @author Ruver Dornelas <ruverd@gmail.com.br>
 * @Date 02/15/2017
 * @version 1.0
 */
class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        Profile::truncate();

        factory(Profile::class)->create(
            [
                'id' => 1,
                'name' => 'Administrator'
            ],
            [
                'id' => 2,
                'name' => 'Client'
            ],
            [
                'id' => 3,
                'name' => 'Employee'
            ],
            [
                'id' => 4,
                'name' => 'Team Member'
            ]
        );
    }
}