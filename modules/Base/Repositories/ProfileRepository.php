<?php

namespace Modules\Base\Repositories;

use Modules\Base\Repositories\BaseRepository;
use Modules\Base\Entities\Profile;

/**
 * Class ProfileRepository
 * @package Modules\Base\Repositories
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @Date 02/15/2017
 * @version 1.0
 */
class ProfileRepository extends BaseRepository
{
    /**
     * Specify Model class name
     * @return string
     */
    public function model()
    {
        return Profile::class;
    }
}