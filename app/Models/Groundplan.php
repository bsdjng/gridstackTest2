<?php

namespace gridstackTest2\vendor\_laravel_idea;

use gridstackTest2\app\Models\GroundplanCell;use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Groundplan extends Model
{
    protected $fillable = [
        'layout_type',
    ];

    /**
     * @return HasMany<GroundplanCells, $this>
     */
    public function groundplanCells(): HasMany
    {
        return $this->hasMany(GroundplanCell::class, 'groundplan_id');
    }
}
