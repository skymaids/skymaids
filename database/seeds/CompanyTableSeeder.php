<?php

use Illuminate\Database\Seeder;
use Modules\Base\Entities\Company;

/**
 * Class CompanyTableSeeder
 * @author Ruver Dornelas <ruverd@gmail.com.br>
 * @Date 02/15/2017
 * @version 1.0
 */
class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        Company::truncate();

        factory(Company::class)->create(
            [
                'id' => 1,
                'name' => 'Sky Maids'
            ]
        );

        factory(Company::class)->create(
            [
                'id' => 2,
                'name' => 'Sky Lawns'
            ]
        );
    }
}