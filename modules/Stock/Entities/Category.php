<?php

namespace Modules\Stock\Entities;

use Modules\Base\Entities\BaseModel;

/**
 * Class Category
 * @package Modules\Stock
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @Date 16/12/2016
 * @version 1.0
 */
class Category extends BaseModel
{
    /**
     * Campos disponiveis para insert
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stock_categories';

    /**
     * Permite log do módulo
     *
     * @var
     */
    public $logSelect  = false;

    /**
     * Relacionamento com Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'id', 'stock_category_id');
    }
}