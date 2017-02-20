<?php

use Illuminate\Database\Seeder;
use Modules\Menu\Entities\Menu;

/**
 * Class MenuTableSeeder
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @Date 02/15/2017
 * @version 1.0
 */
class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        Menu::truncate();

        /**
         * Parents
         */
        factory(Menu::class)->create(
            [
                'id' => 1,
                'parent_id' => 0,
                'name' => 'Dashboard',
                'route' => 'dashboard',
                'icon' => 'md-home',
                'order' => 1
            ]
        );

        factory(Menu::class)->create(
            [
                'id' => 2,
                'parent_id' => 0,
                'name' => 'User',
                'route' => 'user',
                'icon' => 'md-accounts',
                'order' => 2
            ]
        );

        factory(Menu::class)->create(
            [
                'id' => 3,
                'parent_id' => 0,
                'name' => 'Team',
                'route' => 'team',
                'icon' => 'md-truck',
                'order' => 3
            ]
        );

        factory(Menu::class)->create(
            [
                'id' => 4,
                'parent_id' => 0,
                'name' => 'Schedule',
                'route' => 'schedule',
                'icon' => 'md-calendar',
                'order' => 4
            ]
        );
    }
}