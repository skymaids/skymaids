<?php

namespace Modules\Schedule\Repositories;

use Modules\Base\Repositories\BaseRepository;
use Modules\Schedule\Entities\Schedule;

/**
 * Class ScheduleRepository
 * @package Modules\Schedule\Repositories
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @Date 02/16/2017
 * @version 1.0
 */
class ScheduleRepository extends BaseRepository
{
    /**
     * Specify Model class name
     * @return string
     */
    public function model()
    {
        return Schedule::class;
    }
}