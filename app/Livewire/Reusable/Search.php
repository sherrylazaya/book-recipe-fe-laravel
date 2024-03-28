<?php

namespace App\Livewire\Reusable;

use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Search extends Component
{
    public $search;

    public function performSearch(){
        Log::info('emit dispatch');
        $this->dispatch('searchPerformed', search:$this->search);
    }
    
    public function render()
    {
        return view('livewire.reusable.search');
    }
}
