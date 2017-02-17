<?php
namespace Modules\Team\Entities;

use Modules\Base\Entities\BaseModel;
use Modules\User\Entities\Schedule;
use Modules\User\Entities\User;

/**
 * Class Composition
 * @package Modules\Team\Entities
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @Date 02/16/2017
 * @version 1.0
 */
class Composition extends BaseModel
{
    /**
     * Fields available to insert
     * @var array
     */
    protected $fillable = [
        'schedule_id',
        'user_id'
    ];

    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'team_compositions';

    /**
     * Relation with schedule
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    private function schedules()
    {
        return $this->hasMany(Schedule::class, 'schedule_id', 'id');
    }

    /**
     * Relation with user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    private function user()
    {
        return $this->belongsTo(User::class);
    }
}
