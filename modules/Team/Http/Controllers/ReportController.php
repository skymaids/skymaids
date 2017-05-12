<?php

namespace Modules\Team\Http\Controllers;

use Codedge\Fpdf\Fpdf\FPDF;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Schedule\Repositories\ScheduleRepository;
use Modules\Team\Repositories\TeamRepository;
use Carbon\Carbon;

/**
 * Class ReportController
 * @package Modules\Team\Http\Controllers
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
     * @param $id
     * @param $date
     */
    public function index($id,$date)
    {
        $teams = $this->getTeams($id);
        if($teams){
            foreach ($teams as $team) {
                $this->fpdf->AddPage();
                $this->fpdf->SetFont('Arial', 'B', 18);
                $this->fpdf->Cell(190, 10, "Sky Maids - ". $team->name . " (" . $this->formatDate($date) . ")",1,1,'C');
                $this->fpdf->SetFont('Arial', 'B', 8);
                $count = 0;
                $schedules = $this->getSchedules($team,$date);
                if($schedules) {
                    foreach ($schedules as $schedule) {


                        $y = $this->fpdf->GetY();
                        $obs = str_pad($schedule->obs, 700, ' ', STR_PAD_RIGHT);
                        $this->fpdf->MultiCell(100, 5, "Name: " . $schedule->user->name . "\nHour: " . Carbon::parse($schedule->start)->format('g:i A') . "\nAddress: " . $schedule->user_address->address . ", " . $schedule->user_address->city . ", " . $schedule->user_address->state . " " . "\nOBS: " . $obs , 1, 'L', false);
                        $this->fpdf->SetXY($this->fpdf->GetX() + 100, $y);

                        $comments = str_pad('', 158, '_', STR_PAD_LEFT);
                        $kitchen = str_pad('', 47, '_', STR_PAD_LEFT);
                        $vacuum = str_pad('', 40, '_', STR_PAD_LEFT);
                        $bedroom = str_pad('', 46, '_', STR_PAD_LEFT);
                        $bathroom = str_pad('', 45, '_', STR_PAD_LEFT);
                        $mop = str_pad('', 50, '_', STR_PAD_LEFT);

                        $this->fpdf->MultiCell(90, 5, "Comments:" . $comments . "\n\n- Kitchen:" . $kitchen . "\n- Dusting/Vacuum:" . $vacuum . "\n- Bedroom:" . $bedroom . "\n- Bathroom:" . $bathroom . "\n- Mop:" . $mop . "", 1, 'L', false);
                        $this->fpdf->ln();
                        $count++;
                        if($count == 5){
                            $this->fpdf->AddPage();
                        }
                    }
                }
                $this->fpdf->Output('Carro #01.pdf','D');
            }
        }
    }

    /**
     * Format car's color
     * @param $car
     * @return mixed
     */
    private function carColor($car)
    {
        switch ($car){
            case 'Carro #01':
                $color =
            end;

        }
        return $color;
    }

    /**
     * Format date
     * @param $date
     * @return string
     */
    private function formatDate($date)
    {
        return Carbon::parse($date)->format('m/d/Y');
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

    /**
     * Get team
     * @param $id
     * @return bool|mixed
     */
    private function getTeams($id)
    {
        $teams = $this->repository->findWhere(
            [
                'id'=> $id
            ]
        );

        return count($teams) ? $teams : false;
    }
}
