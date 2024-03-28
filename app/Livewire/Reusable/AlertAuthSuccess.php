<?php

namespace App\Livewire\Reusable;

use Livewire\Component;

class AlertAuthSuccess extends Component
{
    public $message;

    public function mount($message){
        $this->message = $message;
    }

    public function render()
    {
        return view('livewire.reusable.alert-auth-success');
    }
}
