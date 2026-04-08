<?php

namespace gridstackTest2\app\Livewire;

use gridstackTest2\vendor\_laravel_idea\Groundplan;
use Livewire\Attributes\Computed;
use Livewire\Component;

class LoadGroundplanApp extends Component
{
    public Groundplan $groundplan;
    public array $options = [];

    public function render()
    {
        return view('livewire.load-groundplan-app');
    }

    #[Computed]
    public function cells()
    {
        return $this->groundplan->groundplanCells()->with('storageRoom')->get();
    }
}

