<?php
namespace Modules\Base\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Modules\Menu\Repositories\MenuRepository;
use Yajra\Datatables\Facades\Datatables;

/**
 * Class BaseController
 * @package Modules\Base\Http\Controllers
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @Date 02/15/2017
 * @version 1.0
 */
abstract class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Mount the page to search
     * @return Response
     */
    public function search()
    {
        $pageInfo = $this->getPageInfo();
        return view('modules.base.page.search')->with(compact('pageInfo'));
    }

    /**
     * Return data json to page
     * @return object
     */
    public function getPageInfo()
    {
        $repository = app()->make('Modules\Menu\Repositories\MenuRepository');
        $arrayPage = [];
        $route = Route::getFacadeRoot()->current()->uri();
        list($arrayPage['module'],$arrayPage['page']) = explode('/', $route);
        $arrayPage['route'] = $route;
        $arrayPage['id'] = $repository->getPageByRoute($route);
        return $this->arrayToJson($arrayPage);
    }

    /**
     * Convert array to object json
     * @param $array
     * @return object
     */
    protected function arrayToJson($array)
    {
        return json_decode(json_encode($array), FALSE);
    }

    /**
     * Format request to datatable format
     * @param $request
     * @return array
     */
    protected function requestDatatables($request)
    {
        $arrayRequest = [];
        foreach($request->all() as $key => $value) {
            if(is_numeric($key)){
                $obj = $this->arrayToJson($value);
                if (array_key_exists($obj->name, $arrayRequest)) {
                    $arrayRequest[$obj->name] = $arrayRequest[$obj->name] . "+" . $obj->value;
                } else {
                    $arrayRequest[$obj->name] = $obj->value;
                }
            }
        }
        return $arrayRequest;
    }

    /**
     * Get all data that repository needs
     * @param Request $request
     * @return mixed
     */
    public function getData(Request $request)
    {
        return Datatables::of($this->repository->getData($this->requestDatatables($request)))
                ->make(true);
    }
}