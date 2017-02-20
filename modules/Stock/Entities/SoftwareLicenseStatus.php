<?php

namespace Modules\Stock\Entities;

use Modules\Base\Entities\BaseModel;

/**
 * Class SoftwareLicenseStatus
 * @package Modules\Stock
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @Date 16/12/2016
 * @version 1.0
 */
class SoftwareLicenseStatus extends BaseModel
{
    /**
     * Campos disponiveis para insert
     *
     * @var array
     */
    protected $fillable = [
        'status'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stock_software_license_status';

    /**
     * Permite log do módulo
     *
     * @var
     */
    public $logSelect  = false;

    /**
     * Relacionamento com SoftwareLicense
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licenses()
    {
        return $this->hasMany(SoftwareLicense::class, 'id', 'stock_software_license_status_id');
    }
}