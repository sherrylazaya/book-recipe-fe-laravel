<?php

namespace App\Livewire\Reusable;

use Livewire\Component;

class Search extends Component
{
    public $search;

    public function performSearch(){
        $this->dispatch('searchPerformed', search:$this->search);
    }
    
    public function render()
    {
        return view('livewire.reusable.search');
    }
}
