<?php

namespace Modules\Stock\Entities;

use Modules\Base\Entities\BaseModel;

/**
 * Class Product
 * @package Modules\Stock\Entities
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @Date 31/01/2017
 * @version 1.0
 */
class Product extends BaseModel
{
    protected $fillable = ['name','max','min','purchase','asset','stock_category_id','unit_id','qtd'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stock_products';

    /**
     * Permite log do módulo
     *
     * @var
     */
    public $logSelect  = false;

    /**
     * Relacionamento com Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}