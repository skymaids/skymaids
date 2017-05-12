<?php
namespace Modules\Team\Entities;

use Modules\Base\Entities\BaseModel;
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
        'team_id',
        'user_id',
        'day'
    ];

    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'team_compositions';

    /**
     * Relation with schedule
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
}
