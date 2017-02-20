<?php

namespace Modules\User\Http\Controllers;

use Modules\Base\Http\Controllers\BaseController;
use Modules\User\Repositories\UserRepository;

/**
 * Class UserController
 * @package Modules\User
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @Date 02/15/2017
 * @version 1.0
 */
class UserController extends BaseController
{
    private $repository;

    /**
     * UserController constructor.
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository  = $repository;
    }

    /**
     * Render page
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->repository->all();
        return view('user::index')->with(compact('users'));
    }
}
