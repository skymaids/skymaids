<?php

use Illuminate\Database\Seeder;
use Modules\User\Entities\User;

/**
 * Class UserTableSeeder
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @Date 02/15/2017
 * @version 1.0
 */
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        factory(User::class)->create(
            [
                'id' => 1,
                'company_id' => 1,
                'profile_id' => 1,
                'name' => 'Ruver Dornelas',
                'username' => 'ruverd',
                'email' => 'ruverd@gmail.com',
                'password' => Hash::make('skymaids17'),
                'user_status_id' => 1,
                'warn' => 1,
                'cel' => '240-360-6361',
                'gender' => 1,
                'obs' => ''
            ]
        );

        factory(User::class)->create(
            [
                'id' => 2,
                'company_id' => 1,
                'profile_id' => 1,
                'name' => 'Lauro Leonardo',
                'username' => 'leonardolauro09@yahoo.com',
                'email' => 'leonardolauro09@yahoo.com',
                'password' => Hash::make('skymaids17'),
                'user_status_id' => 1,
                'warn' => 1,
                'cel' => '240-360-1234',
                'gender' => 1,
                'obs' => ''
            ]
        );

        factory(User::class)->create(
            [
                'id' => 3,
                'company_id' => 1,
                'profile_id' => 1,
                'name' => 'Leticia Leonardo',
                'username' => 'jonathan',
                'email' => 'skedule@skymaids.net',
                'password' => Hash::make('skymaids17'),
                'user_status_id' => 1,
                'warn' => 1,
                'cel' => '240-360-4324',
                'gender' => 0,
                'obs' => ''
            ]
        );

        factory(User::class)->create(
            [
                'id' => 4,
                'company_id' => 1,
                'profile_id' => 1,
                'name' => 'Guilherme',
                'username' => 'guilherme',
                'email' => 'skedule@skymaids.net',
                'password' => Hash::make('skymaids17'),
                'user_status_id' => 1,
                'warn' => 1,
                'cel' => '240-360-3655',
                'gender' => 1,
                'obs' => ''
            ]
        );
    }
}