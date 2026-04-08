<?php

namespace App\Models;

use gridstackTest2\app\Models\StorageRoom;use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use LaravelIdea\Helper\Illuminate\Notifications\_IH_DatabaseNotification_QB;

class GroundplanCell extends Model
{
    protected $fillable = ['groundplan_id', 'x_pos', 'y_pos', 'width', 'height', 'storage_room_id', 'show_name'];

    protected function casts(): array
    {
        return [
            'show_name' => 'bool',
            'x_pos' => 'int',
            'y_pos' => 'int',
            'width' => 'int',
            'height' => 'int',
        ];
    }

    public function storageRoom(): BelongsTo
    {
        return $this->belongsTo(StorageRoom::class);
    }
}
