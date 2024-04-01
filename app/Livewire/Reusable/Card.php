<?php

namespace App\Livewire\Reusable;

use Livewire\Component;
use App\Helper\APIHelper;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;

class Card extends Component
{

    public $data;
    public $showIcon = true;

    public function mount($data){
        $this->data = $data;
    }

    #[On("updateFavorite")]
    public function toggleFavorite($id){
        if($this->data['recipeId'] == $id){
            $api = new APIHelper();
            Log::info($this->data['recipeId']);
            $response = $api->toggleFavorite($id);
            if($response['statusCode'] === 200){
                Log::info($response['message']);
                $this->data['isFavorite'] = !$this->data['isFavorite'];
                $this->dispatch('favorite-updated', $response['message']);
            }
            else{
                $this->addError('togFavorite', $response['message']);
            }
        }

    }

    public function showModal(){
        Log::info('showModalDispatch');
        $message = $this->data['isFavorite']
        ? 'Apa anda yakin ingin menghapus Resep '.$this->data['recipeName'].' dari Favorit anda?'
        : 'Apa anda ingin menambahkan Resep '.$this->data['recipeName'].' ke Favorite anda?';
        $this->dispatch('showModal', message: $message, id:$this->data['recipeId']);
    }

    public function showModalDelete(){
        Log::info('showModalDispatch');
        $message = 'Apakah Anda yakin akan menghapus resep '. $this->data['recipeName'];
        $this->dispatch('showModalDelete', message: $message, id:$this->data['recipeId']);
    }


    #[On('deleteRecipe')]
    public function delete($id){
        if($this->data['recipeId'] == $id){
            $api = new APIhelper();
            $userId = session()->get('userId');
            $response = $api->deleteRecipe($this->data['recipeId'], $userId);
            if($response['statusCode'] === 200){
                $this->dispatch('deleted', $response['message']);
            }
            else{
                $this->addError('togFavorite', $response['message']);
            }

        }

    }

    #[On('searchPerformed')]
    public function doRefresh(){
        $this->dispatch('$refresh');
    }

    public function render()
    {
        return view('livewire.reusable.card');
    }
}
