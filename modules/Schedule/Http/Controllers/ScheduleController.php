<?php

namespace Modules\Schedule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Base\Repositories\ScheduleRepository;

/**
 * Class ScheduleController
 * @package Modules\Stock\Http\Controllers
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @Date 21/02/2017
 * @version 1.0
 */
class ScheduleController extends Controller
{
    protected $repository;

    /**
     * ScheduleController constructor.
     * @param ScheduleRepository $repository
     */
    public function __construct(ScheduleRepository $repository)
    {
        $this->repository  = $repository;
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
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }

    public function send()
    {

    }

    public function sync()
    {

    }

    public function report()
    {

    }
}
