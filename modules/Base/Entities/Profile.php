<?php

namespace Modules\Base\Entities;

use Modules\Base\Entities\BaseModel;
use Modules\User\Entities\User;

/**
 * Class Profile
 * @package Modules\Base\Entities
 * @author Ruver Dornelas <ruverd@gmail.com.br>
 * @Date 02/15/2017
 * @version 1.0
 */
class Profile extends BaseModel
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
    protected $table = 'profiles';

    /**
     * Relation with users
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    protected function users()
    {
        return $this->hasMany(User::class, 'id', 'profile_id');
    }
}