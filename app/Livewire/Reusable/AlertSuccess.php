<?php

namespace App\Livewire\Reusable;

use Livewire\Component;

class AlertSuccess extends Component
{
    public $message;

    public function mount($message){
        $this->message = $message;
    }

    public function continue(){
        $this->dispatch('success');
    }

    public function render()
    {
        return view('livewire.reusable.alert-success');
    }
}
