<?php

namespace App\Livewire\Page;

use Livewire\Component;
use App\Helper\APIHelper;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;

class Dashboard extends Component
{
    public $recipes;
    public $search = '';
    public $time;
    public $alertId = 1;
    public $category;
    public $level;
    public $flashMessage;
    public $sortBy;
    public $currentPage=1;
    public $recipeId;
    public $indexChanges = 1;

    
    public function mount()
    {
        $this->recipes = $this->fetchRecipes();
    }

    public function fetchRecipes()
    {
        $api = new APIHelper();
        $userId = session()->get('userId');
        $pageSize = session()->get('entries', 8);
        $response = $api->getRecipes($userId, $this->time, $this->search, $this->level, $this->category, $this->sortBy, $pageSize, $this->currentPage);
        $response['isNoData'] = false;
        if($response['total'] == 0){
            $response['isNoData'] = true;
        }
        return $response;
    }

    #[On('showModal')]
    public function showModal($message, $id){
        $this->recipeId = $id;

        $this->dispatch(
            'infoAlert-favorite-'.$this->alertId,
            message: $message);

    }

    #[On('searchPerformed')]
    public function search($search){
        Log::info($search);
        $this->search = $search;
        Log::info($this->search);
        $this->recipes = $this->fetchRecipes();
        $this->indexChanges++;
    }

    #[On('filterPerformed')]
    public function filter($time=null, $level=null, $category=null, $sortBy=null){
        $this->time = $time;
        $this->level = $level;
        $this->category = $category;
        $this->sortBy = $sortBy;
        $this->recipes = $this->fetchRecipes();
        $this->indexChanges++;
    }

    #[On('updateEntries')]
    public function entries(){
        Log::info('halo');
        $this->recipes = $this->fetchRecipes();
        $this->indexChanges++;
    }

    #[On('paginationChanged')]
    public function paginationChanged($currentPage){
        Log::info('changed'.$currentPage);
        $this->currentPage = $currentPage;
        $this->recipes = $this->fetchRecipes();
        $this->indexChanges++;
    }

    #[On('choices-favorite')]
    public function favorites($choices){
        Log::info($choices);
        $this->flashMessage= null;
        if($choices){
            $this->dispatch('updateFavorite', id: $this->recipeId);
            $this->alertId++;
            }
    }

    #[On('favorite-updated')]
    public function refresh($message){
        $this->flashMessage = $message;
    }

    public function render()
    {
        return view('livewire.page.dashboard');
    }
}
