<?php

namespace Modules\Team\Http\Controllers;

use Modules\Base\Http\Controllers\BaseController;
use Modules\Schedule\Repositories\ScheduleRepository;
use Modules\Team\Repositories\CompositionRepository;
use Modules\Team\Repositories\TeamRepository;
use Modules\Schedule\Http\Controllers\CalendarController;
use Modules\User\Repositories\AddressRepository;
use Modules\User\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

/**
 * Class SyncController
 * @package Modules\Team\Http\Controllers
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @Date 02/21/2017
 * @version 1.0
 */
class SyncController extends BaseController
{
    protected
        $repository,
        $userRepository,
        $userAddressRepository,
        $scheduleRepository,
        $compositionRepository,
        $calendar,
        $events,
        $date,
        $team;

    /**
     * SyncController constructor.
     * @param CategoryRepository|TeamRepository $repository
     * @param UserRepository $userRepository
     * @param AddressRepository $userAddressRepository
     * @param ScheduleRepository $scheduleRepository
     * @param CompositionRepository $compositionRepository
     */
    public function __construct(
        TeamRepository $repository,
        UserRepository $userRepository,
        AddressRepository $userAddressRepository,
        ScheduleRepository $scheduleRepository,
        CompositionRepository $compositionRepository
    )
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->userAddressRepository = $userAddressRepository;
        $this->scheduleRepository = $scheduleRepository;
        $this->compositionRepository = $compositionRepository;
    }

    /**
     * Sync with calendar and import data id doesn't exit
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $this->config($request);
        return response()->json($this->sync(), 201);
    }

    /**
     * Sync with calendar and import data id doesn't exit
     *
     * @param $team
     * @param $date
     * @return \Illuminate\Http\JsonResponse
     */
    public function syncTeam($team,$date)
    {
        $this->setTeam($team);
        $this->calendar($this->team->calendar);
        $this->setDate($date);
        return response()->json($this->sync(), 201);
    }

    /**
     * Sync scchedule for this team
     *
     * @return array
     */
    protected function sync()
    {
        $schedules = [];
        $composition = $this->importComposition();

        foreach ($this->events() as $event){
            $objEvent = $this->calendar->event($event);
            if(!$objEvent->vacant) {
                $user = $this->importUser($objEvent);
                if(count($user)){
                    $userAddress = $this->importUserAddress($objEvent,$user->id);
                    if(count($userAddress)){
                        $schedule = $this->importSchedule($objEvent,$user,$userAddress->id);
                        if(count($userAddress)){
                            $schedules[] = $schedule->id;
                        }
                    }
                }
            }
        }
        $this->clearSchedule($schedules);
        return $schedules;
    }

    /**
     * Instancia calendar
     *
     * @param $calendar
     * @return CalendarController
     */
    private function calendar($calendar)
    {
        $this->calendar = new CalendarController($calendar);
        return $this->calendar;
    }

    /**
     * Return obj with events for a specific date
     *
     * @return obj
     */
    private function events()
    {
        $this->events = $this->calendar->eventsFromRange(
            $this->getDate('00:00:00'),
            $this->getDate('23:59:59')
        );
        return $this->events;
    }

    /**
     * Set value to date
     *
     * @param $date
     */
    private function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * Get Date formatted
     *
     * @param string $hour
     * @param string $format
     * @return string
     */
    private function getDate($hour = "00:00:00", $format = 'Y/m/d H:i:s')
    {
        return Carbon::parse($this->date . " " . $hour)->format($format);
    }

    /**
     * Set team
     *
     * @param $team
     */
    private function setTeam($team)
    {
        $this->team = $this->arrayToJson($team);
    }

    /**
     * Config variables
     *
     * @param $date
     */
    private function config($request)
    {
        $this->setTeam($request->team);
        $this->calendar($this->team->calendar);
        $this->setDate($this->team->date);
    }

    /**
     * Import and update of calendar's data from users table
     *
     * @param $objEvent
     * @return object
     */
    private function importUser($objEvent)
    {
        $users = $this->userRepository->findByField('username',$objEvent->login,['id']);
        if(count($users)){
            foreach ($users as $user){
                return $this->userRepository->update(
                    [
                        'email' => $objEvent->email,
                        'cel' => $objEvent->phones->mobile,
                        'phone' => $objEvent->phones->landline
                    ], $user->id
                );
            }
        }

        return $this->userRepository->create(
            [
                'company_id' => 1,
                'profile_id' => 2,
                'name' => $objEvent->user,
                'username' => $objEvent->login,
                'email' => $objEvent->email,
                'password' => Hash::make('skymaids17'),
                'user_status_id' => 1,
                'warn' => 1,
                'cel' => $objEvent->phones->mobile,
                'phone' => $objEvent->phones->landline,
                'gender' => $objEvent->gender,
                'obs' => ''
            ]
        );
    }

    /**
     * Import and update of calendar's data from user_addresses table
     *
     * @param $objEvent
     * @param $idUser
     * @return object
     */
    private function importUserAddress($objEvent,$idUser)
    {
        $userAddresses = $this->userAddressRepository->findWhere(
            [
                'user_id' => $idUser,
                'current'=> 1
            ]
        );

        if(count($userAddresses)){
            foreach ($userAddresses as $userAddress){
                return $this->userAddressRepository->update(
                    [
                        'user_id' => $idUser,
                        'address' => $objEvent->address->address,
                        'city' => $objEvent->address->city,
                        'state' => $objEvent->address->state,
                        'zip' => $objEvent->address->zip
                    ], $userAddress->id
                );
            }
        }

        return $this->userAddressRepository->create(
            [
                'user_id' => $idUser,
                'address' => $objEvent->address->address,
                'city' => $objEvent->address->city,
                'state' => $objEvent->address->state,
                'zip' => $objEvent->address->zip
            ]
        );
    }

    /**
     * Import and update of calendar's data from user_addresses table
     *
     * @param $objEvent
     * @return mixed
     */
    private function importSchedule($objEvent,$user,$idUserAddresses)
    {
        $schedules = $this->scheduleRepository->findWhere(
            [
                'team_id' => $this->team->id,
                'day'=> $this->getDate('00:00:00','Y-m-d'),
                'start'=> Carbon::createFromTimestamp($objEvent->timestamp)->format('H:i:s')
            ]
        );

        if(count($schedules)){
            foreach ($schedules as $schedule){
                return $this->scheduleRepository->update(
                    [
                        'user_id' => $user->id,
                        'user_address_id' => $idUserAddresses,
                        'team_id' => $this->team->id,
                        'day' => $this->getDate('00:00:00','Y-m-d'),
                        'start' => Carbon::createFromTimestamp($objEvent->timestamp)->format('H:i:s'),
                        'end' => Carbon::createFromTimestamp($objEvent->timestamp)->format('H:i:s')
                    ], $schedule->id
                );
            }
        }

        return $this->scheduleRepository->create(
            [
                'user_id' => $user->id,
                'user_address_id' => $idUserAddresses,
                'team_id' => $this->team->id,
                'day' => $this->getDate('00:00:00','Y-m-d'),
                'start' => Carbon::createFromTimestamp($objEvent->timestamp)->format('H:i:s'),
                'end' => Carbon::createFromTimestamp($objEvent->timestamp)->format('H:i:s'),
                'obs' => $user->obs
            ]
        );
    }

    /**
     * Import composition for team
     *
     * @param $user
     */
    private function importComposition()
    {
        switch ($this->team->id){
            case 1:
                $array = [5,6];
            break;
            case 2:
                $array = [14,15];
            break;
            case 3:
                $array = [8,9,10];
            break;
            default:
                $array = [7,11,12];
            break;
        }

        foreach ($array as $value) {
            $compositions = $this->compositionRepository->findWhere(
                [
                    'user_id' => $value,
                    'team_id' => $this->team->id,
                    'day' => $this->getDate('00:00:00','Y-m-d')
                ]
            );

            if(!count($compositions)){
                $composition = $this->compositionRepository->create(
                    [
                        'user_id' => $value,
                        'team_id' => $this->team->id,
                        'day' => $this->getDate('00:00:00','Y-m-d')
                    ]
                );
            }
        }
    }

    /**
     * Clear change schedules in calendar
     *
     * @param $ids
     */
    private function clearSchedule($ids)
    {
        if(count($ids)){
            $schedules = $this->scheduleRepository->findWhere(
                [
                    'team_id' => $this->team->id,
                    'day'=> $this->getDate('00:00:00','Y-m-d')
                ]
            );

            foreach ($schedules as $schedule){
                if (!in_array($schedule->id, $ids)) {
                    $this->scheduleRepository->delete($schedule->id);
                }
            }
        }
    }
}
