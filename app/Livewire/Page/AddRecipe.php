<?php

namespace App\Livewire\Page;

use App\Helper\APIHelper;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;

class AddRecipe extends Component
{
    use WithFileUploads;

    #[Validate]
    public $recipeName;
    #[Validate]
    public $timeCook;
    #[Validate]
    public $selectedCategory;
    #[Validate]
    public $selectedLevel;
    #[Validate]
    public $ingridient;
    #[Validate]
    public $howToCook;
    #[Validate]
    public $image;

    public $categories;
    public $levels;

    public $imageData;
    public $filename;

    public function rules(){
        return [
            'recipeName' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'timeCook' => 'required|numeric|min:1|max:999',
            'selectedCategory' => 'required',
            'selectedLevel' => 'required',
            'image' => 'required',
            'howToCook' => 'required',
            'ingridient' => 'required',
        ];
    }

    public function messages(){
        return[
            'recipeName.required' => 'Nama Resep Makanan tidak boleh kosong',
            'recipeName.regex' => 'Nama Resep Makanan tidak boleh berisi special Character/angka',
            'recipeName.max' => 'Nama Resep Makanan tidak boleh melebihi 255 karakter',

            'timeCook.required' => 'Waktu Memasak tidak boleh kosong',
            'timeCook.numeric' => 'Waktu Memasak hanya boleh berisi angka 1-999',
            'timeCook.min' => 'Waktu Memasak hanya boleh berisi angka 1-999',
            'timeCook.max' => 'Waktu Memasak hanya boleh berisi angka 1-999',

            'selectedCategory.required' => 'Kategori Memasak tidak boleh kosong',
            'selectedLevel.required' => 'Tingkat Kesulitan tidak boleh kosong',

            'image.required' => 'Gambar Masakan tidak boleh kosong',
            'ingridient.required' => 'Bahan - Bahan tidak boleh kosong',
            'howToCook.required' => 'Cara Memasak tidak boleh kosong'
        ];
    }

    public function mount(){
        try {
            $api = new APIHelper();
            $this->categories = $api->getCategories()['data'];
            $this->levels = $api->getLevels()['data'];
        } catch (\Throwable $error) {
            Log::error($error->getMessage());
            $this->addError('serverError', 'Terjadi Kesalahan Server');
        }
    }

    public function updatedImage(){
        if(!Session::has('tmp-img')){
            session()->put('tmp-img');
        }

        $tmpImg = session('tmp-img');

        if(file_exists($tmpImg)){
            unlink($tmpImg);
        }

        $imgPath = $this->image->getRealPath();

        session(['tmp-img' => $imgPath]);
        $this->imageData = $imgPath;
        $this->filename = $this->image->getClientOriginalName();
    }

    #[On('ingridientUpdated')]
    public function ingridientValidate($value){
        if(strip_tags($value) == ''){
            $this->addError('ingridient', 'Bahan - Bahan tidak boleh kosong');
        }else{
            $this->resetErrorBag('ingridient');
            $this->ingridient = $value;
        }
    }

    #[On('howToCookUpdated')]
    public function howToCookValidate($value){
        if(strip_tags($value) == ''){
            $this->addError('howToCook', 'Cara Memasak tidak boleh kosong');
        }else{
            $this->resetErrorBag('howToCook');
            $this->ingridient = $value;
        }
    }

    #[On('tmpError')]
    public function imgTmpError(){
        $this->addError('image', 'Format gambar tidak sesuai / Gambar melebihi batas maksimal ukuran (1MB)');
    }


    public function cancel(){
        redirect()->route(session('navPage'));
        if(file_exists(session('tmp-img'))){
            unlink(session('tmp-img'));
        }
    }

    public function render()
    {
        return view('livewire.form.recipe');
    }
}
