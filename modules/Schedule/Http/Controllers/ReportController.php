<?php

namespace Modules\Schedule\Http\Controllers;

use Codedge\Fpdf\Fpdf\FPDF;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Schedule\Repositories\ScheduleRepository;
use Modules\Team\Repositories\TeamRepository;
use Carbon\Carbon;

/**
 * Class ReportController
 * @package Modules\Schedule\Http\Controllers
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @Date 02/21/2017
 * @version 1.0
 */
class ReportController extends Controller
{
    protected
        $repository,
        $scheduleRepository,
        $fpdf;

    /**
     * ReportController constructor.
     * @param ScheduleRepository $scheduleRepository
     * @param TeamRepository $repository
     * @param FPDF $fpdf
     */
    public function __construct(ScheduleRepository $scheduleRepository, TeamRepository $repository,FPDF $fpdf)
    {
        $this->repository  = $repository;
        $this->scheduleRepository  = $scheduleRepository;
        $this->fpdf  = $fpdf;
    }

    /**
     * Generate report in PDF to print
     * @param $date
     */
    public function index($date)
    {
        $size = 35;
        $this->fpdf->AddPage('L');
        $this->fpdf->SetFont('Arial', 'B', 18);
        $this->fpdf->Cell(280, 10, "Sky Maids ". " (" . $this->formatDate($date) . ")",1,1,'C');
        $this->fpdf->SetFont('Arial', 'B', 8);
        $this->fpdf->SetXY($this->fpdf->GetX(), $this->fpdf->GetY());
        $x = $this->fpdf->GetX();
        $y = $this->fpdf->GetY();

        $teams = $this->getTeams();
        if($teams) {
            $countTeam = 0;
            foreach ($teams as $team) {
                $schedules = $this->getSchedules($team,$date);
                if($schedules) {
                    $countSchedule = 0;
                    switch ($team->name){
                        case 'Carro #01':
                            $this->fpdf->SetTextColor(244,67,54);
                            break;
                        case 'Carro #02':
                            $this->fpdf->SetTextColor(63,81,181);
                            break;
                        case 'Carro #03':
                            $this->fpdf->SetTextColor(224,224,224);
                            break;
                        case 'Carro #04':
                            $this->fpdf->SetTextColor(0,188,212);
                            break;
                        case 'Carro #05':
                            $this->fpdf->SetTextColor(255,152,0);
                            break;
                        case 'Carro #06':
                            $this->fpdf->SetTextColor(97,97,97);
                            break;
                        case 'Carro #07':
                            $this->fpdf->SetTextColor(76,175,80);
                            break;
                        case 'Carro #08':
                            $this->fpdf->SetTextColor(244,67,54);
                            break;
                    }

                    $this->fpdf->MultiCell($size, 5, $team->name,1,'L',false);
                    foreach ($schedules as $schedule) {
                        if($countSchedule == 0){
                            $this->fpdf->SetXY($x + $size * $countTeam, $y + 5);
                        } else{
                            $this->fpdf->SetXY($x + $size * $countTeam, $y + 27 * $countSchedule + 5);
                        }
                        $this->fpdf->MultiCell($size, 5, "(" . Carbon::parse($schedule->start)->format('g:i A') .")\n" . $schedule->user->name . "\n". $schedule->user_address->address . ", " . $schedule->user_address->city . ", " . $schedule->user_address->state,1,'L',false);
                        $countSchedule++;
                    }
                    $countTeam++;
                    $this->fpdf->SetXY($x + $size * $countTeam, $y);
                }
            }
        }
        $this->fpdf->Output('Report Day.pdf','D');
    }

    /**
     * Format date
     *
     * @param $date
     * @return string
     */
    private function formatDate($date)
    {
        return Carbon::parse($date)->format('m/d/Y');
    }

    /**
     * Get team
     *
     * @return bool|mixed
     */
    private function getTeams()
    {
        $teams = $this->repository->all();
        return count($teams) ? $teams : false;
    }

    /**
     * Get Schedules
     * @param $date
     * @param $team
     * @return bool|mixed
     */
    private function getSchedules($team,$date)
    {
        $schedules = $this->scheduleRepository->findWhere(
            [
                'day' => Carbon::parse($date)->format('Y-m-d'),
                'team_id'=> $team->id
            ]
        );
        return count($schedules) ? $schedules : false;
    }
}
