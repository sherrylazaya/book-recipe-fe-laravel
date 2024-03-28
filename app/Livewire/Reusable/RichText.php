<?php

namespace App\Livewire\Reusable;

use Livewire\Component;

class RichText extends Component
{
    public $name;
    public $value;

    public function mount($name, $value = null){
        $this->name = $name;
        $this->value = html_entity_decode($value);
    }

    public function render()
    {
        return view('livewire.reusable.rich-text');
    }
}
