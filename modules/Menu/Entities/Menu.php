<?php

namespace Modules\Menu\Entities;

use Modules\Base\Entities\BaseModel;

/**
 * Class Menu
 * @package Modules\Menu\Entities
 * @author Ruver Dornelas <ruverd@gmail.com.br>
 * @Date 02/15/2017
 * @version 1.0
 */
class Menu extends BaseModel
{
    /**
     * Fields available to insert
     * @var array
     */
    protected $fillable = [
        'parent_id', 'name', 'route', 'order'
    ];

    /**
     * Relation between son and parent in the same table
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    private function parent()
    {
        return $this->belongsTo(Menu::class);
    }

    /**
     * Relation between parent and sons in the same table
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    private function sons()
    {
        return $this->hasMany(Menu::class, 'id', 'parent_id');
    }
}
