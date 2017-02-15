<?php

namespace Modules\Base\Http\Controllers;

use Modules\Base\Http\Controllers\BaseController;
use Modules\Base\Repositories\CompanyRepository;

/**
 * Class CompanyController
 * @package Modules\Base\Http\Controllers
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @Date 02/15/2017
 * @version 1.0
 */
class CompanyController extends BaseController
{
    protected $repository;

    /**
     * CompanyController constructor.
     * @param CompanyRepository $repository
     */
    public function __construct(CompanyRepository $repository)
    {
        $this->repository  = $repository;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = $this->repository->all();
        return $company;
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $company = $this->repository->find($id);
        return response()->json($company, 200);
    }
}