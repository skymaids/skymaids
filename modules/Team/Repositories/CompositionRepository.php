<?php

namespace Modules\Base\Repositories;

use Modules\Base\Repositories\BaseRepository;
use Modules\Team\Entities\Composition;

/**
 * Class CompositionRepository
 * @package Modules\Base\Repositories
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @Date 02/16/2017
 * @version 1.0
 */
class CompositionRepository extends BaseRepository
{
    /**
     * Specify Model class name
     * @return string
     */
    public function model()
    {
        return Composition::class;
    }
}