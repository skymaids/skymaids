<?php

namespace Modules\Stock\Repositories;

use Modules\Base\Repositories\BaseRepository;
use Modules\Stock\Entities\Product;


/**
 * Class ProductRepository
 * @package Modules\Stock\Repositories
 * @author Ruver <ruver@imatec.com.br>
 * @Date 31/01/2017
 * @version 1.0
 */
class ProductRepository extends BaseRepository
{
    protected $logSelect;

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name' => 'like',
        'stock_category_id'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Product::class;
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
                    ->select('stock_products.id', 'stock_products.name','stock_categories.name as category', 'stock_products.qtd')
                    ->join('stock_categories', 'stock_categories.id', '=', 'stock_products.stock_category_id')
                    ->get();
    }
}