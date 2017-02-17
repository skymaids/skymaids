<?php
namespace Modules\User\Entities;

use Modules\Base\Entities\BaseModel;
use Modules\Team\Entities\Team;

/**
 * Class Schedule
 * @package Modules\User\Entities
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
        'day',
        'start',
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
    private function team()
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * Relation with user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    private function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation with address
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    private function address()
    {
        return $this->belongsTo(Address::class);
    }
}
