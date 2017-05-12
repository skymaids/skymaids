<?php

namespace Modules\Schedule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Schedule\Repositories\ScheduleRepository;
use Modules\User\Repositories\UserRepository;

/**
 * Class SendController
 * @package Modules\Schedule\Http\Controllers
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @Date 02/21/2017
 * @version 1.0
 */
class SendController extends Controller
{
    protected $repository,
              $userRepository;

    /**
     * SendController constructor.
     * @param ScheduleRepository $repository
     * @param UserRepository $userRepository
     */
    public function __construct(ScheduleRepository $repository, UserRepository $userRepository)
    {
        $this->repository  = $repository;
        $this->userRepository  = $userRepository;
    }

    /**
     * Send messages
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $schedules = $this->repository->findWhere(
            [
                'day' => $request->dateSchedule
            ]
        );

        foreach ($schedules as $schedule) {
            if($schedule['checked'] == 1){
                $users = $this->repository->findWhere(
                    [
                        'id' => $schedule['idClient']
                    ]
                );

                foreach ($users as $user) {
                    $phone = ($user->cel) ? $user->cel : $user->phone;
                    $url = 'https://rest.nexmo.com/sms/json?' . http_build_query(
                            [
                                'api_key' =>  '1a958654',
                                'api_secret' => 'dafb7529d4d4730f',
                                'to' => $phone,
                                'from' => '12035298256',
                                'text' => 'Sky Maids - Please click the link http://www.skymaids.net to confirm your appointment'
                            ]
                        );

                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($ch);
                }
            }
        }
        echo $response;
    }
}
