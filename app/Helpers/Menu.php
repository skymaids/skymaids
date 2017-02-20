<?php

use Illuminate\Database\Query\Builder;

/**
 * Class Menu
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @Date 27/07/2016
 * @version 1.0
 */
class Menu
{
    /**
     * Retorna menu para ser renderizado na view
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function get()
    {
        /**
         * Instance Menu Repository
         */
        $repository = app()->make('Modules\Menu\Repositories\MenuRepository');

        /**
         * Return
         */
        return $repository->makeMenu();
    }
}