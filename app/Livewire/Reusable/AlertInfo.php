<?php

namespace App\Livewire\Reusable;

use Livewire\Component;

class AlertInfo extends Component
{

    public $alertId;
    public $name;

    public function mount($alertId, $name){
        $this->alertId = $alertId;
        $this->name = $name;

    }

    public function render()
    {
        return view('livewire.reusable.alert-info');
    }
}
