<?php

namespace Modules\Base\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class BaseModel
 * @package Modules\Base\Entities
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @Date 02/15/2017
 * @version 1.0
 */
class BaseModel extends Model implements Transformable
{
    use TransformableTrait;
}
