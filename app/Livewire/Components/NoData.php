<?php

namespace App\Livewire\Components;

use Livewire\Component;

class NoData extends Component
{
    public $message;

    public function render()
    {
        return view('livewire.components.no-data');
    }
}
