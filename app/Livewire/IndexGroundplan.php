<?php

namespace App\Livewire;

use App\Models\Groundplan;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;

class IndexGroundplan extends Component
{
    public function render(): View
    {
        return view('livewire.index-groundplan');
    }

    #[Computed]
    public function groundplans(){
        return Groundplan::all();
    }
}
