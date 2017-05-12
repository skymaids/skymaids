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
                'cel' => '240-360-6361',
                'gender' => 1
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
                'gender' => 1
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
                'gender' => 0
            ]
        );

        /**
         * Employee Profile
         */
        factory(User::class)->create(
            [
                'id' => 4,
                'company_id' => 1,
                'profile_id' => 3,
                'name' => 'Guilherme',
                'username' => 'guilherme',
                'email' => 'skedule@skymaids.net',
                'password' => Hash::make('skymaids17'),
                'user_status_id' => 1,
                'warn' => 1,
                'cel' => '240-360-3655',
                'gender' => 1
            ]
        );

        /**
         * Team Member Profile
         */
        factory(User::class)->create(
            [
                'id' => 5,
                'company_id' => 1,
                'profile_id' => 4,
                'name' => 'Mirian Edith Banegal',
                'username' => 'mirian.banegal',
                'email' => 'skedule@skymaids.net',
                'password' => Hash::make('skymaids17'),
                'user_status_id' => 1,
                'warn' => 1,
                'cel' => '301-633-1082',
                'taxid' => '931-92-3489',
                'gender' => 0
            ]
        );

        factory(User::class)->create(
            [
                'id' => 6,
                'company_id' => 1,
                'profile_id' => 4,
                'name' => 'Emma Yamileth',
                'username' => 'emma.yamileth',
                'email' => 'skedule@skymaids.net',
                'password' => Hash::make('skymaids17'),
                'user_status_id' => 1,
                'warn' => 1,
                'cel' => '571-337-3280',
                'taxid' => '943-92-0613',
                'gender' => 0
            ]
        );

        factory(User::class)->create(
            [
                'id' => 7,
                'company_id' => 1,
                'profile_id' => 4,
                'name' => 'Vilma L. Alvarado Moreno',
                'username' => 'vilma.moreno',
                'email' => 'skedule@skymaids.net',
                'password' => Hash::make('skymaids17'),
                'user_status_id' => 1,
                'warn' => 1,
                'cel' => '240-483-9257',
                'taxid' => '968-84-9600',
                'gender' => 0
            ]
        );

        factory(User::class)->create(
            [
                'id' => 8,
                'company_id' => 1,
                'profile_id' => 4,
                'name' => 'Yamileth Stefany Tadeo Orellano',
                'username' => 'yamileth.orellano',
                'email' => 'skedule@skymaids.net',
                'password' => Hash::make('skymaids17'),
                'user_status_id' => 1,
                'warn' => 1,
                'cel' => '240-615-1136',
                'taxid' => '611-20-8796',
                'gender' => 0
            ]
        );

        factory(User::class)->create(
            [
                'id' => 9,
                'company_id' => 1,
                'profile_id' => 4,
                'name' => 'Elly K. Toledo Ramas',
                'username' => 'elly.ramas',
                'email' => 'skedule@skymaids.net',
                'password' => Hash::make('skymaids17'),
                'user_status_id' => 1,
                'warn' => 1,
                'cel' => '703-989-8435',
                'social' => '109-73-8763',
                'gender' => 0
            ]
        );

        factory(User::class)->create(
            [
                'id' => 10,
                'company_id' => 1,
                'profile_id' => 4,
                'name' => 'Maya Guadalupe Avaloz Cruz',
                'username' => 'maya.cruz',
                'email' => 'skedule@skymaids.net',
                'password' => Hash::make('skymaids17'),
                'user_status_id' => 1,
                'warn' => 1,
                'cel' => '301-300-2774',
                'taxid' => '981-72-6040',
                'gender' => 0
            ]
        );

        factory(User::class)->create(
            [
                'id' => 11,
                'company_id' => 1,
                'profile_id' => 4,
                'name' => 'Veronica Yamile Audez Lopes',
                'username' => 'veronica.lopes',
                'email' => 'skedule@skymaids.net',
                'password' => Hash::make('skymaids17'),
                'user_status_id' => 1,
                'warn' => 1,
                'cel' => '240-498-5460',
                'taxid' => '611-20-8796',
                'gender' => 0
            ]
        );

        factory(User::class)->create(
            [
                'id' => 12,
                'company_id' => 1,
                'profile_id' => 4,
                'name' => 'Erika Hernandez',
                'username' => 'erika.hernandez',
                'email' => 'skedule@skymaids.net',
                'password' => Hash::make('skymaids17'),
                'user_status_id' => 1,
                'warn' => 1,
                'cel' => '240-423-3981',
                'taxid' => '911-86-3458',
                'gender' => 0
            ]
        );

        factory(User::class)->create(
            [
                'id' => 13,
                'company_id' => 1,
                'profile_id' => 4,
                'name' => 'Heydi Lisseth Hernandez',
                'username' => 'heydi.hernandez',
                'email' => 'skedule@skymaids.net',
                'password' => Hash::make('skymaids17'),
                'user_status_id' => 1,
                'warn' => 1,
                'cel' => '301-385-7082',
                'taxid' => '945-98-5825',
                'gender' => 0
            ]
        );

        factory(User::class)->create(
            [
                'id' => 14,
                'company_id' => 1,
                'profile_id' => 4,
                'name' => 'Alma Luz Lopez Orozo',
                'username' => 'alma.orozo',
                'email' => 'skedule@skymaids.net',
                'password' => Hash::make('skymaids17'),
                'user_status_id' => 1,
                'warn' => 1,
                'cel' => '240-370-3674',
                'taxid' => '926-92-2245',
                'gender' => 0
            ]
        );

        factory(User::class)->create(
            [
                'id' => 15,
                'company_id' => 1,
                'profile_id' => 4,
                'name' => 'Yoalin Elizabeth Mejia Algaro',
                'username' => 'yoalin.algaro',
                'email' => 'skedule@skymaids.net',
                'password' => Hash::make('skymaids17'),
                'user_status_id' => 1,
                'warn' => 1,
                'cel' => '301-605-0474',
                'taxid' => '932-94-0778',
                'gender' => 0
            ]
        );

        factory(User::class)->create(
            [
                'id' => 16,
                'company_id' => 1,
                'profile_id' => 4,
                'name' => 'Gladis O. Caliderio Fernandez',
                'username' => 'gladis.fernandez',
                'email' => 'skedule@skymaids.net',
                'password' => Hash::make('skymaids17'),
                'user_status_id' => 1,
                'warn' => 1,
                'cel' => '301-300-2813',
                'taxid' => '947-84-6490',
                'gender' => 0
            ]
        );

        factory(User::class)->create(
            [
                'id' => 17,
                'company_id' => 1,
                'profile_id' => 4,
                'name' => 'Ana Veronica Chavez',
                'username' => 'ana.chavez',
                'email' => 'skedule@skymaids.net',
                'password' => Hash::make('skymaids17'),
                'user_status_id' => 1,
                'warn' => 1,
                'cel' => '240-530-7832',
                'taxid' => '946-91-1297',
                'gender' => 0
            ]
        );
    }
}