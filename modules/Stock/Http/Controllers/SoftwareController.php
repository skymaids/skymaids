<?php

namespace Modules\Stock\Http\Controllers;

use Modules\Base\Http\Controllers\BaseController;
use Modules\Stock\Http\Requests\SoftwareRequest;
use Modules\Stock\Repositories\SoftwareRepository;

/**
 * Class SoftwareController
 * @package Modules\Stock\Http\Controllers
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @Date 31/01/2017
 * @version 1.0
 */
class SoftwareController extends BaseController
{
    protected $repository;

    /**
     * SoftwareController constructor.
     * @param SoftwareRepository $repository
     */
    public function __construct(SoftwareRepository $repository)
    {
        $this->repository  = $repository;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $software = $this->repository->all();
        return $software;
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('stock::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  SoftwareRequest $request
     * @return Response
     */
    public function store(SoftwareRequest $request)
    {
        $software = $this->repository->create($request->all());
        return response()->json($software, 201);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('stock::edit');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $software = $this->repository->find($id);
        return response()->json($software, 200);
    }

    /**
     * Update the specified resource in storage.
     * @param  SoftwareRequest $request
     * @param  string $id
     * @return Response
     */
    public function update(SoftwareRequest $request, $id)
    {
        $software = $this->repository->update($request->all(), $id);
        return response()->json($software,201);
    }

    /**
     * Remove the specified resource from storage.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->delete($id);
        return response()->json([],204);
    }
}

