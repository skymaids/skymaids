<?php

namespace Modules\Menu\Http\Controllers;

use Modules\Base\Http\Controllers\BaseController;
use Modules\Menu\Repositories\MenuRepository;

/**
 * Class PageController
 * @package Modules\Menu\Http\Controllers
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @Date 02/15/2017
 * @version 1.0
 */
class PageController extends BaseController
{
    protected $repository;

    /**
     * MenuController constructor.
     * @param MenuRepository $repository
     */
    public function __construct(MenuRepository $repository)
    {
        $this->repository  = $repository;
    }

    /**
     * Send menu data to page
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $arrayInfo = [];
        $menu = $this->repository->find($id);
        list($module,$page) = explode('/',$menu->route);
        $arrayInfo['id'] = $menu->id;
        $arrayInfo['name'] = $menu->name;
        $arrayInfo['title'] = $menu->title;
        $arrayInfo['route'] = $menu->route;
        $arrayInfo['module'] = $module;
        $arrayInfo['method'] = ($page) ? $page : $module;
        $arrayInfo['relatives'][0]['id'] = $menu->parent->id;
        $arrayInfo['relatives'][0]['name'] = $menu->parent->name;
        return response()->json($this->arrayToJson($arrayInfo), 200);
    }
}
