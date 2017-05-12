<?php
namespace Modules\Schedule\Entities;

use Modules\Base\Entities\BaseModel;

/**
 * Class Status
 * @package Modules\Schedule\Entities
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @Date 02/15/2017
 * @version 1.0
 */
class Status extends BaseModel
{
    /**
     * Fields available to insert
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'schedule_status';

    /**
     * Relation with schedule
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    protected function schedules()
    {
        return $this->hasMany(Schedule::class, 'id', 'schedule_status_id');
    }
}
