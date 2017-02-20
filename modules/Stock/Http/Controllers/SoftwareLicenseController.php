<?php

namespace Modules\Stock\Http\Controllers;

use Modules\Base\Http\Controllers\BaseController;
use Modules\Stock\Http\Requests\SoftwareLicenseRequest;
use Modules\Stock\Repositories\SoftwareLicenseRepository;

/**
 * Class SoftwareLicenseController
 * @package Modules\Stock\Http\Controllers
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @Date 31/01/2017
 * @version 1.0
 */
class SoftwareLicenseController extends BaseController
{
    protected $repository;

    /**
     * SoftwareLicenseController constructor.
     * @param SoftwareLicenseRepository $repository
     */
    public function __construct(SoftwareLicenseRepository $repository)
    {
        $this->repository  = $repository;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $softwareLicense = $this->repository->all();
        return $softwareLicense;
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
     * @param  SoftwareLicenseRequest $request
     * @return Response
     */
    public function store(SoftwareLicenseRequest $request)
    {
        $softwareLicense = $this->repository->create($request->all());
        return response()->json($softwareLicense, 201);
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
        $softwareLicense = $this->repository->find($id);
        return response()->json($softwareLicense, 200);
    }

    /**
     * Update the specified resource in storage.
     * @param  SoftwareLicenseRequest $request
     * @param  string $id
     * @return Response
     */
    public function update(SoftwareLicenseRequest $request, $id)
    {
        $softwareLicense = $this->repository->update($request->all(), $id);
        return response()->json($softwareLicense,201);
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

