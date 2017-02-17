<?php
namespace Modules\User\Entities;

use Modules\Base\Entities\BaseModel;

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
        'user_address_id',
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
    private function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation with schedules
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    private function schedules()
    {
        return $this->hasMany(Schedule::class, 'id', 'user_address_id');
    }
}
