<?php

namespace Modules\Menu\Repositories;

use Modules\Base\Repositories\BaseRepository;
use Modules\Menu\Entities\Menu;

/**
 * Class MenuRepository
 * @package Modules\Menu\Repositories
 * @author Ruver Dornelas <ruverd@gmail.com.br>
 * @Date 02/15/2017
 * @version 1.0
 */
class MenuRepository extends BaseRepository
{
    /**
     * Menu's Collection
     * @var array
     */
    private $menuCollection = [];

    /**
     * Set model
     * @return string
     */
    public function model()
    {
        return Menu::class;
    }

    /**
     * Initial Boot
     */
    public function boot()
    {
        $this->prepareData();
    }

    /**
     * Get data to mount menu
     * @return array
     */
    public function prepareData()
    {
        $data = $this->getMenu();
        foreach ($data as $key => $value) {
            $this->menuCollection[$value->parent_id][$value->id] = [
                'id' => $value->id,
                'parent_id' => $value->parent_id,
                'name' => $value->name,
                'route' => $value->route,
                'icon' => $value->icon
            ];
        }
        return $this->menuCollection;
    }

    /**
     * Mount menu
     * @param array $menuCollection
     * @param null $ulClass
     * @param int $parentId
     * @param int $level
     * @param string $liClass
     */
    public function makeMenu($menuCollection = array(), $ulClass = null, $parentId = 0, $level = 0, $liClass = 'has-sub')
    {
        $menuCollection = $this->menuCollection;

        if (! is_null($ulClass)) echo str_repeat( "\t" , $level ) .'<ul ' . $ulClass . '>'. PHP_EOL;

        if( isset($menuCollection[$parentId]) ) {
            foreach ($menuCollection[$parentId] as $key => $value) {
                $liClass = (!empty($liClass)) ? $liClass : '';

                echo str_repeat("\t", $level + 1), '<li class="site-menu-item ' . $liClass . '">';
                echo $this->makeLink(
                    $value['name'],
                    $value['route'],
                    $value['icon'],
                    isset($menuCollection[$value['id']])
                );

                if (isset($this->menuCollection[$value['id']])) {
                    $this->makeMenu($this->menuCollection, 'class="site-menu-sub"', $value['id'], $level + 2, $liClass);
                }

                echo str_repeat("\t", $level + 1) . '</li>' . PHP_EOL;

            }
        }

        if (! is_null($ulClass)) echo str_repeat( "\t" , $level ),'</ul>' . PHP_EOL;
    }

    /**
     * Make links from main menu
     * @param $name
     * @param $url
     * @param $icon
     * @param bool $falgLink
     * @return string
     */
    private function makeLink($name, $url, $icon, $falgLink = false)
    {
        $link = ($falgLink) ? 'javascript:void(0)' : ((substr($url, 0, 1) == '/') ? "$url" : "/$url");
        $arrow = ($falgLink) ? '<span class="site-menu-arrow"></span>' : '';

        $text = ($icon)
            ? '<i aria-hidden="true" class="site-menu-icon ' . $icon . '"></i>
              <span class="site-menu-title">'. $name .'</span>'. $arrow
            : '<span>' . $name . '</span>' . $arrow;


        return '<a class="animsition-link" href="' . $link . '">' . $text . '</a>' . PHP_EOL;
    }

    /**
     * Get menu
     * @return obj
     */
    public function getMenu()
    {
        return $this->model
                    ->orderBy('order', 'asc')
                    ->get();
    }

    /**
     * Get page by route
     * @param $route
     * @return mixed
     */
    public function getPageByRoute($route)
    {
        $pages = $this->model
                    ->where('route', $route)
                    ->get();
        foreach ($pages as $page){
            return $page->id;
        }
        return false;
    }
}