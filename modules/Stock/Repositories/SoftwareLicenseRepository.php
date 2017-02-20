<?php

namespace Modules\Stock\Repositories;

use Modules\Base\Repositories\BaseRepository;
use Modules\Stock\Entities\SoftwareLicense;


/**
 * Class SoftwareLicenseRepository
 * @package Modules\Stock\Repositories
 * @author Ruver <ruver@imatec.com.br>
 * @Date 16/12/2016
 * @version 1.0
 */
class SoftwareLicenseRepository extends BaseRepository
{
    protected $logSelect;

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'stock_software_id'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SoftwareLicense::class;
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
                    ->select('stock_software_licenses.id', 'stock_software_licenses.serial','stock_software_licenses.qtd','stock_software_license_status.status as status')
                    ->join('stock_software_license_status', 'stock_software_license_status.id', '=', 'stock_software_licenses.stock_software_license_status_id')
                    ->orderBy('id', 'asc')
                    ->get();
    }
}