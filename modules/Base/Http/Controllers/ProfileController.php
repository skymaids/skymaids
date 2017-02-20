<?php

namespace Modules\Base\Http\Controllers;

use Modules\Base\Http\Controllers\BaseController;
use Modules\Base\Repositories\ProfileRepository;

/**
 * Class ProfileController
 * @package Modules\Base\Http\Controllers
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @Date 02/15/2017
 * @version 1.0
 */
class ProfileController extends BaseController
{
    protected $repository;

    /**
     * ProfileController constructor.
     * @param ProfileRepository $repository
     */
    public function __construct(ProfileRepository $repository)
    {
        $this->repository  = $repository;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = $this->repository->all();
        return $profile;
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $profile = $this->repository->find($id);
        return response()->json($profile, 200);
    }
}