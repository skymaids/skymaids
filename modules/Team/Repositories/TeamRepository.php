<?php

namespace Modules\Team\Repositories;

use Modules\Base\Repositories\BaseRepository;
use Modules\Team\Entities\Team;

/**
 * Class TeamRepository
 * @package Modules\Team\Repositories
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @Date 02/16/2017
 * @version 1.0
 */
class TeamRepository extends BaseRepository
{
    /**
     * Specify Model class name
     * @return string
     */
    public function model()
    {
        return Team::class;
    }
}