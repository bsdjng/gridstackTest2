<?php

namespace App\Livewire;

use gridstackTest2\vendor\_laravel_idea\Groundplan;
use gridstackTest2\app\Models\GroundplanCell;
use gridstackTest2\app\Models\StorageRoom;
use Livewire\Attributes\Computed;
use Livewire\Component;

class EditGroundplan extends Component
{
    public Groundplan $groundplan;
    public array $options = [];
    public ?int $selectedCell = null;

    public function mount()
    {
        foreach ($this->sideGridCells as $cell) {
            $this->options[$cell->id] = [
                'show_name' => true,
            ];
        }

        foreach ($this->editGridCells as $cell) {
            $this->options[$cell->storage_room_id] = [
                'show_name' => $cell->show_name,
            ];
        }
    }

    public function render()
    {
        return view('livewire.edit-groundplan');
    }


    #[Computed]
    public function editGridCells()
    {
        return $this->groundplan->groundplanCells()->with('storageRoom')->get();
    }

    #[Computed]
    public function sideGridCells()
    {
        return StorageRoom::whereNotIn('id', $this->editGridCells->pluck('storage_room_id'))->get();
    }

    public function update(array $mainItems, array $sideItems)
    {
        if ($mainItems === []) {
            return redirect();
        }

        GroundplanCell::where('groundplan_id', $this->groundplan->id)->delete();

        foreach ($mainItems as $item) {
            GroundplanCell::create([
                'groundplan_id' => $this->groundplan->id,
                'x_pos' => $item['x'] ?? 0,
                'y_pos' => $item['y'] ?? 0,
                'width' => $item['w'] ?? 1,
                'height' => $height = $item['h'] ?? 1,
                'storage_room_id' => $item['cellKey'] ?? null,
                'show_name' => $this->options[$item['cellKey'] ?? null]['show_name'] ?? true,
            ]);
        }

        return redirect()->route('load', $this->groundplan->id);
    }
}
