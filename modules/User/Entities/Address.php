<?php
namespace Modules\User\Entities;

use Modules\Base\Entities\BaseModel;
use Modules\Schedule\Entities\Schedule;

/**
 * Class Address
 * @package Modules\User\Entities
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @Date 02/16/2017
 * @version 1.0
 */
class Address extends BaseModel
{
    /**
     * Fields available to insert
     * @var array
     */
    protected $fillable = [
        'user_id',
        'address',
        'city',
        'state',
        'zip',
        'current'
    ];

    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'user_addresses';

    /**
     * Relation with user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation with schedules
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    protected function schedules()
    {
        return $this->hasMany(Schedule::class, 'id', 'user_address_id');
    }
}
