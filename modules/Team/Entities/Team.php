<?php
namespace Modules\Team\Entities;

use Modules\Base\Entities\BaseModel;
use Modules\Base\Entities\Company;
use Modules\User\Entities\Schedule;

/**
 * Class Team
 * @package Modules\Team\Entities
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @Date 02/16/2017
 * @version 1.0
 */
class Team extends BaseModel
{
    /**
     * Fields available to insert
     * @var array
     */
    protected $fillable = [
        'company_id',
        'name',
        'calendar',
        'color'
    ];

    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'teams';

    /**
     * Relation with schedule
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    protected function schedules()
    {
        return $this->hasMany(Schedule::class, 'id', 'team_id');
    }

    /**
     * Relation with compositions
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    protected function compositions()
    {
        return $this->hasMany(Composition::class, 'id', 'team_id');
    }

    /**
     * Relation with company
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected function company()
    {
        return $this->belongsTo(Company::class);
    }
}
