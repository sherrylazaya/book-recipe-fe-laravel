<?php

namespace App\Livewire\Auth;

use Exception;
use Livewire\Component;
use App\Helper\APIHelper;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Attributes\On;

class Login extends Component
{

    #[Validate]
    public $username;
    #[Validate]
    public $password;
    public $showPassword = false;

    public function render()
    {
        return view('livewire.auth.login')->layout('components.layouts.auth');
    }

    public function rules(){
        return [
            'username' => "required|max:100|regex:/^[a-zA-Z0-9]+$/",
            'password' => "required|max:50|min:6"
        ];
    }

    public function messages(){
        return [
            'username.required' => 'Kolom username tidak boleh kosong',
            'username.max' => 'Username maksimum 100 karakter',
            'username.regex' => 'Format username belum sesuai',
            'password.required' => 'Kolom password tidak boleh kosong',
            'password.max' => 'Kata sandi tidak boleh lebih dari 50 karakter',
            'password.min' => 'Kata sandi tidak boleh kurang dari 6 karakter',
        ];
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function tooglePasswordVisibility(){
        $this->showPassword = !$this->showPassword;
    }
}
