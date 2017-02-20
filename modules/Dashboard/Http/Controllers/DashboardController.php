<?php

namespace Modules\Dashboard\Http\Controllers;

use Modules\Base\Http\Controllers\BaseController;
use Modules\Menu\Repositories\MenuRepository;
use Modules\Organization\Repositories\OrganizationRepository;
use Modules\User\Repositories\UserRepository;

/**
 * Class DashboardController
 * @package Modules\Dashboard
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @Date 08/09/2016
 * @version 1.0
 */
class DashboardController extends BaseController
{
    /**
     * Renderiza a tela
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware('auth');

        //TESTE
//        $repoOrganization->all();
//
//        $repoUser->all();
//
//        $repoMenu->allLog();
//        $repoMenu->update(['name' => 'Início '.rand(0,10)], 1);
//        $organization = $repoOrganization->create(['name' => 'teste']);
//        $repoOrganization->delete($organization->id);

        return view('dashboard::index');
    }
}

