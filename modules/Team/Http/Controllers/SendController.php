<?php

namespace Modules\Team\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Team\Repositories\TeamRepository;
use Modules\User\Repositories\UserRepository;

/**
 * Class SendController
 * @package Modules\Team\Http\Controllers
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
     * @param TeamRepository $repository
     * @param UserRepository $userRepository
     */
    public function __construct(TeamRepository $repository, UserRepository $userRepository)
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
        foreach ($request->team['schedules'] as $schedule){
            if($schedule['checked'] == 1){
                $users = $this->userRepository->findWhere(
                    [
                        'id' => $schedule['idClient']
                    ]
                );

                $longUrl = url('/')."/confirm/".encrypt($schedule['id']);
                $postData = array('longUrl' => $longUrl);
                $jsonData = json_encode($postData);

                $curlObj = curl_init();
                curl_setopt($curlObj, CURLOPT_URL, 'https://www.googleapis.com/urlshortener/v1/url?key=AIzaSyAJdUtbFQ6iBEYuiJytPVrq91R4oilzfQM');
                curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($curlObj, CURLOPT_HEADER, 0);
                curl_setopt($curlObj, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
                curl_setopt($curlObj, CURLOPT_POST, 1);
                curl_setopt($curlObj, CURLOPT_POSTFIELDS, $jsonData);

                $response = curl_exec($curlObj);
                $json = json_decode($response);

                curl_close($curlObj);

                if(isset($json->error)){
                    echo $json->error->message;
                }else{
                    foreach ($users as $user) {
                        //$phone = ($user->cel) ? $user->cel : $user->phone;
                        $phone = 12403606360;
                        $url = 'https://rest.nexmo.com/sms/json?' . http_build_query(
                                [
                                    'api_key' =>  'bfe92169',
                                    'api_secret' => 'a9a6455b079f24ed',
                                    'to' => $phone,
                                    'from' => '12014646691',
                                    'text' => 'Sky Maids - Please click the link ' . $json->id . ' to confirm your appointment'
                                ]
                            );

                        $ch = curl_init($url);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $response = curl_exec($ch);
                    }
                }
            }
        }

        echo $response;
    }
}
