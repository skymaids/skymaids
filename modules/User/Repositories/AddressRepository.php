<?php

namespace Modules\User\Repositories;

use Modules\Base\Repositories\BaseRepository;
use Modules\User\Entities\Address;

/**
 * Class AddressRepository
 * @package Modules\User\Repositories
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @Date 02/15/2017
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