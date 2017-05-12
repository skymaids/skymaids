<?php

namespace Modules\Team\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Base\Http\Controllers\BaseController;
use Modules\Team\Repositories\TeamRepository;

/**
 * Class TeamController
 * @package Modules\Team\Http\Controllers
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @Date 02/21/2017
 * @version 1.0
 */
class TeamController extends BaseController
{
    protected $repository,
              $repositorySchedule;

    /**
     * CategoryController constructor.
     * @param CategoryRepository $repository
     */
    public function __construct(TeamRepository $repository)
    {
        $this->repository  = $repository;
    }

	/**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('team::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('team::create');
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
        return view('team::edit');
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

    /**
     * Sync calendar team
     *
     * @param $id
     */
    public function sync($id)
    {
        dd($id);
    }

    /**
     * Send messages for this calendar team
     *
     * @param $id
     */
    public function send($id)
    {
        dd($id);
    }

    /**
     * Send messages for this calendar team
     *
     * @param $id
     */
    public function report($id)
    {
        dd($id);
    }
}
