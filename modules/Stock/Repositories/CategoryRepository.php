<?php

namespace Modules\Stock\Repositories;

use Modules\Base\Repositories\BaseRepository;
use Modules\Stock\Entities\Category;


/**
 * Class CategoryRepository
 * @package Modules\Stock\Repositories
 * @author Ruver <ruver@imatec.com.br>
 * @Date 16/12/2016
 * @version 1.0
 */
class CategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name' => 'like'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Category::class;
    }

    /**
     * Pega os dados do filtro
     *
     * @return obj
     */
    public function getData($request)
    {
        $this->applyCriteriaRequest($request);
        return $this->model
                    ->orderBy('id', 'asc')
                    ->get();
    }
}