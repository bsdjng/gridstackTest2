<?php

namespace gridstackTest2\app\Livewire;

use gridstackTest2\vendor\_laravel_idea\Groundplan;
use gridstackTest2\app\Models\GroundplanCell;
use gridstackTest2\app\Models\StorageRoom;
use Livewire\Attributes\Computed;
use Livewire\Component;

class CreateGroundplan extends Component
{
    public function render()
    {
        return view('livewire.create-groundplan');
    }

    #[Computed]
    public function cells()
    {
        return StorageRoom::all();
    }

    public function save(array $items)
    {
        if (empty($items)) {
            return redirect()->route('index');
        }

        $groundplan = Groundplan::create([]);

        foreach ($items as $item) {
            GroundplanCell::create([
                'groundplan_id' => $groundplan->id,
                'x_pos' => $item['x'] ?? 0,
                'y_pos' => $item['y'] ?? 0,
                'width' => $item['w'] ?? 1,
                'height' => $item['h'] ?? 1,
                'storage_room_id' => $item['cellKey'] ?? null,
                'show_name' => $item['showName'] ?? true,
            ]);
        }

        return redirect()->route('index');
    }
}
