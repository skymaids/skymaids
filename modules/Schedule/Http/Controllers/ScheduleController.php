<?php

namespace Modules\Schedule\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Base\Http\Controllers\BaseController;
use Modules\Schedule\Repositories\ScheduleRepository;
use Carbon\Carbon;
use Modules\Team\Repositories\CompositionRepository;
use Modules\Team\Repositories\TeamRepository;
use Modules\Team\Http\Controllers\SyncController;
use Modules\User\Repositories\UserRepository;

/**
 * Class ScheduleController
 * @package Modules\Schedule\Http\Controllers
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @Date 21/02/2017
 * @version 1.0
 */
class ScheduleController extends BaseController
{
    protected
        $repository,
        $teamRepository,
        $userRepository,
        $compositionRepository;

    private $schedules = [],
            $count = 0;

    /**
     * ScheduleController constructor.
     * @param ScheduleRepository $repository
     */
    public function __construct(ScheduleRepository $repository,TeamRepository $teamRepository, CompositionRepository $compositionRepository, UserRepository $userRepository)
    {
        $this->repository  = $repository;
        $this->teamRepository  = $teamRepository;
        $this->compositionRepository  = $compositionRepository;
        $this->userRepository = $userRepository;
    }

	/**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('schedule::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('schedule::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('schedule::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @param  string $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $schedule = $this->repository->update($request->all(), $id);
        return response()->json($schedule,201);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {

    }

    /**
     * Form to confirm appointment
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showConfirmForm($id)
    {
        $id = decrypt($id);
        $schedules = $this->repository->findWhere(
            [
                'id' => $id
            ]
        );

        foreach ($schedules as $schedule) {
            $who = $schedule->user->name;
            $where = $schedule->user_address->address . ", " . $schedule->user_address->city . ", " . $schedule->user_address->state . " " . $schedule->user_address->zip;
            $when =  Carbon::parse($schedule->day)->format('m/d/Y') . " " .Carbon::parse($schedule->start)->format('g:i A');

        }
        return view('schedule::confirm',compact('who','where','when', 'id'));
    }

    /**
     * Update schedule and redirect to message
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function confirm(Request $request)
    {
        $this->repository->update([
            'schedule_status_id' => ($request->type == 1) ? 3 : 4
        ], $request->idSchedule);

        $message = ($request->type == 1)
            ? $request->who . 'has confirmed an appointment to ' . $request->when . $request->textarea
            : $request->who . 'has canceled an appointment  to ' . $request->when . $request->textarea;

        $url = 'https://rest.nexmo.com/sms/json?' . http_build_query(
                [
                    'api_key' =>  '1a958654',
                    'api_secret' => 'dafb7529d4d4730f',
                    'to' => '2403606361',
                    'from' => '12035298256',
                    'text' => $message
                ]
            );

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);

        //Atualizar schedule com confirmacao
        return redirect()->route('schedule.thanks');
    }

    /**
     * Message when client confirm appointment
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function thanks()
    {
        return view('schedule::thanks');
    }

    /**
     * Remove the specified resource from storage
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function comment(Request $request)
    {
        if($request->schedule['repeat']) {
            $this->commentUser($request->schedule['idClient'],$request->schedule['comment']);
        }

        $schedule = $this->repository->update([
            'obs' => $request->schedule['comment']
        ], $request->schedule['id']);
        return response()->json($schedule,201);
    }

    /**
     * Atualiza Comentário geral
     * @param $idUser
     * @param $comment
     * @return \Illuminate\Http\JsonResponse
     */
    public function commentUser($idUser,$comment)
    {
        $user = $this->userRepository->update([
            'obs' => $comment
        ], $idUser);
        return response()->json($user,201);
    }

    /**
     * Remove the specified resource from storage
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function status(Request $request)
    {
        $schedule = $this->repository->update([
            'schedule_status_id' => $request->schedule['status']
        ], $request->schedule['id']);
        return response()->json($schedule,201);
    }

    /**
     * Remove the specified resource from storage
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function checked(Request $request)
    {
        $schedule = $this->repository->update([
            'checked' => ($request->schedule['checked'] == 1) ? 0 : 1
        ], $request->schedule['id']);
        return response()->json($schedule,201);
    }

    /**
     * Sync all teams and events
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sync(Request $request)
    {
        $teams = $this->getTeams();
        if($teams) {
            foreach ($teams as $team) {
                app(SyncController::class)->syncTeam($team, $request->date);
                $schedules = $this->getSchedules($team, $request->date);
            }
        }
        return response()->json($teams, 200);
    }

    /**
     * Load data if necessary make the sync to load data
     * @param Request $request
     * @return string
     */
    public function load(Request $request)
    {
        $teams = $this->getTeams();
        if($teams){
            foreach ($teams as $team){
                $flag = true;
                $schedules = $this->getSchedules($team,$request->date);

                if($schedules == false) {
                    app(SyncController::class)->syncTeam($team,$request->date);
                    $schedules = $this->getSchedules($team,$request->date);
                }

                if($schedules){
                    foreach ($schedules as $schedule) {
                        if($flag) {
                            $this->schedules[$this->count]['id'] = $team->id;
                            $this->schedules[$this->count]['name'] = $team->name;
                            $this->schedules[$this->count]['color'] = $team->color;
                            $this->schedules[$this->count]['calendar'] = $team->calendar;
                            $this->schedules[$this->count]['date'] = $request->date;

                            $compositions = $this->getCompositions($team,$request->date);
                            if($compositions) {
                                foreach ($compositions as $composition) {
                                    $this->schedules[$this->count]['members'][] = [
                                        'id' => $composition->user_id,
                                        'name' => $composition->user->name
                                    ];
                                }
                            }
                        }

                        $obs = ($schedule->obs) ? $schedule->obs : $schedule->user->obs;
                        $this->schedules[$this->count]['schedules'][] = [
                            'id' => $schedule->id,
                            'idClient' => $schedule->user->id,
                            'client' => $schedule->user->name,
                            'hour' => Carbon::parse($schedule->start)->format('g:i A'),
                            'address' => $schedule->user_address->address . ", " . $schedule->user_address->city . ", " . $schedule->user_address->state . " " . $schedule->user_address->zip,
                            'status' => $schedule->schedule_status_id,
                            'statusClass' => $this->getStatusClass($schedule->schedule_status_id),
                            'statusColor' => $this->getStatusColor($schedule->schedule_status_id),
                            'key' => $schedule->key,
                            'comment' => $obs,
                            'checked' => $schedule->checked,
                            'repeat' => false
                        ];
                        $flag = false;
                    }
                }
                $this->count++;
            }
        }
        return response()->json($this->arrayToJson($this->schedules), 200);
    }

    /**
     * @param $idStatus
     * @return string
     */
    public function getStatusClass($idStatus)
    {
        switch ($idStatus){
            case 1:
                $class = 'md-block-alt';
                break;
            case 2:
                $class = 'md-check';
                break;
            case 3:
                $class = 'md-check-all';
                break;
            case 4:
                $class = 'md-close';
                break;
        }
        return $class;
    }

    /**
     * @param $idStatus
     * @return string
     */
    public function getStatusColor($idStatus)
    {
        switch ($idStatus){
            case 1:
                $color = 'btn-primary';
                break;
            case 2:
                $color = 'btn-warning';
                break;
            case 3:
                $color = 'btn-info';
                break;
            case 4:
                $color = 'btn-danger';
                break;
        }
        return $color;
    }

    /**
     * Get Teams
     * @return bool|mixed
     */
    private function getTeams()
    {
        $teams = $this->teamRepository->all();
        return count($teams) ? $teams : false;
    }

    /**
     * Get Compositions
     * @return bool|mixed
     */
    private function getCompositions($team,$date)
    {
        $compositions = $this->compositionRepository->findWhere(
            [
                'day' => Carbon::parse($date)->format('Y-m-d'),
                'team_id'=> $team->id
            ]
        );
        return count($compositions) ? $compositions : false;
    }

    /**
     * Get Schedules
     * @param $date
     * @param $team
     * @return bool|mixed
     */
    private function getSchedules($team,$date)
    {
        $schedules = $this->repository->findWhere(
            [
                'day' => Carbon::parse($date)->format('Y-m-d'),
                'team_id'=> $team->id
            ]
        );
        return count($schedules) ? $schedules : false;
    }
}
