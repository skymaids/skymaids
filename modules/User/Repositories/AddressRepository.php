<?php

namespace Modules\Base\Repositories;

use Modules\Base\Repositories\BaseRepository;
use Modules\Base\Entities\Address;

/**
 * Class AddressRepository
 * @package Modules\Base\Repositories
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @Date 02/16/2017
 * @version 1.0
 */
class AddressRepository extends BaseRepository
{
    /**
     * Specify Model class name
     * @return string
     */
    public function model()
    {
        return Address::class;
    }
}