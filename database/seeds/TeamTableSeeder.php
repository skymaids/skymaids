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
                'name' => 'Carro #01',
                'calendar' => 'https://calendar.google.com/calendar/ical/skymaids.net_geotm92dqnkl783udd6g3km9jg%40group.calendar.google.com/private-8694da1d3bb482cd07cd051c3a9e5240/basic.ics',
                'color' => 'tag-danger'
            ]
        );

        factory(Team::class)->create(
            [
                'id' => 2,
                'company_id' => 1,
                'name' => 'Carro #02',
                'calendar' => 'https://calendar.google.com/calendar/ical/skymaids.net_geotm92dqnkl783udd6g3km9jg%40group.calendar.google.com/private-8694da1d3bb482cd07cd051c3a9e5240/basic.ics',
                'color' => 'tag-primary'
            ]
        );

        factory(Team::class)->create(
            [
                'id' => 3,
                'company_id' => 1,
                'name' => 'Carro #03',
                'calendar' => 'https://calendar.google.com/calendar/ical/skymaids.net_geotm92dqnkl783udd6g3km9jg%40group.calendar.google.com/private-8694da1d3bb482cd07cd051c3a9e5240/basic.ics',
                'color' => 'tag-default'
            ]
        );

        factory(Team::class)->create(
            [
                'id' => 4,
                'company_id' => 1,
                'name' => 'Carro #04',
                'calendar' => 'https://calendar.google.com/calendar/ical/skymaids.net_geotm92dqnkl783udd6g3km9jg%40group.calendar.google.com/private-8694da1d3bb482cd07cd051c3a9e5240/basic.ics',
                'color' => 'tag-info'
            ]
        );

        factory(Team::class)->create(
            [
                'id' => 5,
                'company_id' => 1,
                'name' => 'Carro #05',
                'calendar' => 'https://calendar.google.com/calendar/ical/skymaids.net_geotm92dqnkl783udd6g3km9jg%40group.calendar.google.com/private-8694da1d3bb482cd07cd051c3a9e5240/basic.ics',
                'color' => 'tag-warning'
            ]
        );

        factory(Team::class)->create(
            [
                'id' => 6,
                'company_id' => 1,
                'name' => 'Carro #06',
                'calendar' => 'https://calendar.google.com/calendar/ical/skymaids.net_geotm92dqnkl783udd6g3km9jg%40group.calendar.google.com/private-8694da1d3bb482cd07cd051c3a9e5240/basic.ics',
                'color' => 'tag-dark'
            ]
        );

        factory(Team::class)->create(
            [
                'id' => 7,
                'company_id' => 1,
                'name' => 'Carro #07',
                'calendar' => 'https://calendar.google.com/calendar/ical/skymaids.net_geotm92dqnkl783udd6g3km9jg%40group.calendar.google.com/private-8694da1d3bb482cd07cd051c3a9e5240/basic.ics',
                'color' => 'tag-success'
            ]
        );

        factory(Team::class)->create(
            [
                'id' => 8,
                'company_id' => 1,
                'name' => 'Carro #08',
                'calendar' => 'https://calendar.google.com/calendar/ical/skymaids.net_geotm92dqnkl783udd6g3km9jg%40group.calendar.google.com/private-8694da1d3bb482cd07cd051c3a9e5240/basic.ics',
                'color' => 'tag-danger'
            ]
        );
    }
}