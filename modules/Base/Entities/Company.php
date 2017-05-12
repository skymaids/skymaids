<?php

namespace Modules\Base\Entities;

use Modules\Base\Entities\BaseModel;
use Modules\User\Entities\Team;
use Modules\User\Entities\User;

/**
 * Class Company
 * @package Modules\Base\Entities
 * @author Ruver Dornelas <ruverd@gmail.com.br>
 * @Date 02/15/2017
 * @version 1.0
 */
class Company extends BaseModel
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
    protected $table = 'companies';

    /**
     * Relation with users
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    protected function users()
    {
        return $this->hasMany(User::class, 'id', 'company_id');
    }

    /**
     * Relation with teams
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    protected function teams()
    {
        return $this->hasMany(Team::class, 'id', 'company_id');
    }
}