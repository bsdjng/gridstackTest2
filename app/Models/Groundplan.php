<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Groundplan extends Model
{
    protected $fillable = [
        'layout_type',
    ];

    /**
     * @return HasMany<GroundplanCell, $this>
     */
    public function groundplanCells(): HasMany
    {
        return $this->hasMany(GroundplanCell::class, 'groundplan_id');
    }
}
