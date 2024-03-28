<?php

namespace App\Livewire\Reusable;

use Livewire\Component;
use App\Helper\APIHelper;

class Filter extends Component
{
    public $sortBy;
    public $level;
    public $category;
    public $time;
    public $isDashboard;
    public $levels;
    public $categories;

    public function mount($isDashboard){
        $api = new APIHelper();
        $this->isDashboard = $isDashboard;
        $this->levels = $api->getLevels();
        $this->categories = $api->getCategories();
    }

    public function filter(){
        $this->dispatch('filterPerformed', level:$this->level, category: $this->category, time: $this->time, sortBy: $this->sortBy);
    }
    
    public function render()
    {
        return view('livewire.reusable.filter');
    }
}
