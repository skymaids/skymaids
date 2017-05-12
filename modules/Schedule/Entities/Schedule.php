<?php
namespace Modules\Schedule\Entities;

use Modules\Base\Entities\BaseModel;
use Modules\Team\Entities\Team;
use Modules\User\Entities\Address;
use Modules\User\Entities\User;

/**
 * Class Schedule
 * @package Modules\Schedule\Entities
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @Date 02/16/2017
 * @version 1.0
 */
class Schedule extends BaseModel
{
    /**
     * Fields available to insert
     * @var array
     */
    protected $fillable = [
        'user_id',
        'user_address_id',
        'team_id',
        'schedule_status_id',
        'day',
        'start',
        'key',
        'checked',
        'end',
        'obs'
    ];

    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'schedules';

    /**
     * Relation with team
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected function team()
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * Relation with user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation with address
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected function user_address()
    {
        return $this->belongsTo(Address::class);
    }

    /**
     * Relation with status
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected function status()
    {
        return $this->belongsTo(Status::class);
    }
}
