<?php
namespace Modules\Menu\Http\Controllers;

use Modules\Base\Http\Controllers\BaseController;
use Modules\Menu\Repositories\MenuRepository;

/**
 * Class MenuController
 * @package Modules\Menu\Http\Controllers
 * @author Ruver Dornelas <ruverd@gmail.com.br>
 * @Date 02/15/2017
 * @version 1.0
 */
class MenuController extends BaseController
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
}
