<?php
namespace Modules\User\Entities;

use Modules\Base\Entities\BaseModel;

/**
 * Class Status
 * @package Modules\User\Entities
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
    protected $table = 'user_status';

    /**
     * Relation with user
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    private function users()
    {
        return $this->hasMany(User::class, 'id', 'user_status_id');
    }
}
