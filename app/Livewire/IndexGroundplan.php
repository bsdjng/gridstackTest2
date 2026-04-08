<?php

namespace App\Livewire;

use gridstackTest2\vendor\_laravel_idea\Groundplan;
use Livewire\Attributes\Computed;
use Livewire\Component;

class IndexGroundplan extends Component
{
    public function render()
    {
        return view('livewire.index-groundplan');
    }

    #[Computed]
    public function groundplans(){
        return Groundplan::all();
    }
}
