<?php

namespace App\Livewire\Page;

use Exception;
use Livewire\Component;
use App\Helper\APIHelper;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;

class MyRecipes extends Component
{
    public $recipes;
    public $search = '';
    public $time;
    public $category;
    public $level;
    public $sortBy;
    public $currentPage=1;
    public $alertId = 1;
    public $flashMessage;
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
        $response = $api->getMyRecipes($userId, $this->time, $this->search, $this->level, $this->category, $this->sortBy, $pageSize, $this->currentPage);
        $response['isNoData'] = false;
        if($response['total'] == 0){
            $response['isNoData'] = true;
        }
        return $response;
    }

    #[On('showModal')]
    public function showModal($message, $id){
        Log::info('here');
        $this->recipeId = $id;

        $this->dispatch(
            'infoAlert-favorite-'.$this->alertId,
            message: $message);
    }
    
    #[On('searchPerformed')]
    public function search($search){
        $this->search = $search;
        Log::info($this->level);
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
        $this->recipes = $this->fetchRecipes();
        $this->indexChanges++;
    }
    
    #[On('paginationChanged')]
    public function paginationChanged($currentPage){
        $this->currentPage = $currentPage;
        $this->recipes = $this->fetchRecipes();
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
    
    // beda 
    // buat fungsi untuk memunculkan alert
    #[On('showModalDelete')]
    public function showModalDelete($message, $id){
        Log::info('here delete');
        // Menyimpan ID resep yang akan dihapus
        $this->recipeId = $id;

        // Memicu infoAlert untuk menampilkan pesan konfirmasi penghapusan
        $this->dispatch(
            'infoAlert-delete-'.$this->alertId,
            message: $message);
    }

    // beda 
    // fungsi buat periksa apakah user memilih ya untuk menghapus resep
    #[On('choices-delete')]
    public function delete($choices){
        Log::info($choices);
        $this->flashMessage= null;

        // Memeriksa apakah pengguna telah mengonfirmasi penghapusan
        if($choices){
            // Jika iya, memicu deleteRecipe untuk menghapus resep dengan ID yang tersimpan
            $this->dispatch('deleteRecipe', id: $this->recipeId);
            // Menambahkan ID untuk alert berikutnya agar unik
            $this->alertId++;
        }
    }

    // beda
    // terakhir fungsi ketika udah dihapus
    #[On('deleted')]
    public function deleted($message){
        // Menyimpan pesan hasil penghapusan untuk ditampilkan kepada pengguna
        $this->flashMessage = $message;
        // Memperbarui daftar resep dengan yang terbaru
        $this->recipes = $this->fetchRecipes();
        // Menandakan perubahan indeks untuk memperbarui tampilan
        $this->indexChanges++;
    }

    #[On('favorite-updated')]
    public function refresh($message){
        $this->flashMessage = $message;
    }


    public function render()
    {
        return view('livewire.page.my-recipes');

    }
}
