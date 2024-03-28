<?php

namespace App\Livewire\Page;

use App\Helper\APIHelper;
use Exception;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;

class DetailRecipe extends Component
{
    public $id;
    public $data;
    public $alertId =1 ;
    public $flashMessage;

    public function mount($id){
        try {
            $this->id = $id;
            $api = new APIHelper();
            $data = $api->getDetailRecipe($id);
            $data['isNoData'] = false;
            if($data['total'] = 0){
                $data['isNoData'] = true;
            }
            $this->data = $data;
        } catch (\Throwable $error) {
            Log::error($error->getMessage());
            $this->addError('serverError', 'Terjadi Kesalahan Server');
        }
    }

    #[On('choices-favorite')]
    public function toggleFavorite($choices){
        try {
            $this->flashMessage = null;
            if($choices == true){
                $api = new APIHelper();
                $response = $api->toggleFavorite($this->id);
                if($response['statusCode'] !== 200){
                    throw new Exception;
                }
                $this->data['data']['isFavorite'] = !$this->data['data']['isFavorite'];
                $this->flashMessage = $response['message'];
            }
            $this->alertId++;
        } catch (\Throwable $error) {
            Log::error($error->getMessage());
            $this->addError('serverError', 'Terjadi Kesalahan Server');
        }
    }

    public function showModalChoice(){
        $message = $this->data['data']['isFavorite']
        ? 'Apakah anda yakin ingin menghapus Resep '. $this->data['data']['recipeName'] .' dari Favorite?'
        : 'Apakah anda ingin menambahkan Resep ' .$this->data['data']['recipeName']. ' ke Favorite?';
        $this->dispatch(
            'infoAlert-favorite-'.$this->alertId,
            message: $message
        );
    }

    public function render()
    {
        return view('livewire.page.detail-recipe');
    }
}
