<?php

namespace App\Livewire;

use App\Models\Groundplan;
use Livewire\Attributes\Computed;
use Livewire\Component;

class LoadGroundplan extends Component
{
    public Groundplan $groundplan;
    public array $options = [];

    public function render()
    {
        return view('livewire.load-groundplan');
    }

    public function mount()
    {
        foreach ($this->cells as $cell) {
            $this->options[$cell->storage_room_id] = [
                'show_name' => $cell->show_name,
            ];
        }
    }

    #[Computed]
    public function cells()
    {
        return $this->groundplan->groundplanCells()->with('storageRoom')->get();
    }
}

