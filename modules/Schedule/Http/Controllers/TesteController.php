<?php

namespace Modules\Schedule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Carbon\Carbon;
use DateTime;

class TesteController extends Controller
{
    public function index()
    {
        $team = 'https://calendar.google.com/calendar/ical/skymaids.net_s9i8jkd4a9fi91fs08to63cumk%40group.calendar.google.com/private-e1924741a2816e7d8f818bf145d9ca8f/basic.ics';

        $calendar   = new CalendarController($team);
        $events = $calendar->eventsFromRange('2017/02/20 00:00:00','2017/02/20 23:59:59');

        foreach ($events as $event){
            if(strtolower($event['SUMMARY']) !== 'vacant') {
                $user = $calendar->getName($event['SUMMARY']);
                $address = $calendar->getAddress($event['LOCATION']);
                $phone = $event['DESCRIPTION'];
                $date = new DateTime("@{$event['UNIX_TIMESTAMP']}");

                echo "<pre>";
                var_dump($event);
                echo "</pre>";
                echo "<pre>";
                var_dump($date->format('Y-m-d H:i:s e'));
                var_dump($user);
                var_dump($address);
                echo "</pre>";
            }
        }
        exit();
    }
}
