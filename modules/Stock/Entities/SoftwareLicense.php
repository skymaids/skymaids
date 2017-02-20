<?php

namespace Modules\Stock\Entities;

use Modules\Base\Entities\BaseModel;

/**
 * Class SoftwareLicense
 * @package Modules\Stock
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @Date 16/12/2016
 * @version 1.0
 */
class SoftwareLicense extends BaseModel
{
    /**
     * Campos disponiveis para insert
     *
     * @var array
     */
    protected $fillable = [
        'stock_software_id',
        'stock_software_license_status_id',
        'serial',
        'expiration',
        'qtd',
        'obs',
        'price',
        'auto_payment',
        'agreement_date'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stock_software_licenses';

    /**
     * Permite log do módulo
     *
     * @var
     */
    public $logSelect  = false;

    /**
     * Relacionamento com Software
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function software()
    {
        return $this->belongsTo(Software::class);
    }

    /**
     * Relacionamento com Software
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo(SoftwareLicenseStatus::class);
    }
}