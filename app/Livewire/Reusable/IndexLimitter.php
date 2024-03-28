<?php

namespace App\Livewire\Reusable;

use Livewire\Component;
use Illuminate\Support\Facades\Log;

class IndexLimitter extends Component
{

    public $selectedEntries;

    public function mount(){
        $this->selectedEntries = session()->get('entries', 8);
    }

    public function setEntries($entries){
        $this->selectedEnteries = $entries;
        Log::info('setEntries');
        Log::info($entries);
        session()->put('entries', $entries);
        $this->dispatch('updateEntries');
    }

    public function render()
    {
        return view('livewire.reusable.index-limitter');
    }
}
