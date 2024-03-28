<?php

namespace App\Livewire\Auth;

use App\Helper\APIHelper;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

class Register extends Component
{
    #[Layout('components.layouts.auth')]

    #[Validate]
    public $username;
    #[Validate]
    public $fullName;
    #[Validate]
    public $password;
    #[Validate]
    public $retypePassword;

    public $showPassword = false;
    public $showRetypePassword = false;

    public function rules(){
        return [
            'username' => 'required|min:1|max:100|regex:/^[a-zA-Z0-9]+$/',
            'fullName' => 'required|max:25',
            'password' => 'required|min:6|max:50',
            'retypePassword' => 'required|same:password',
        ];
    }

    public function messages(){
        return [
            'username.required' => 'Kolom username tidak boleh kosong.',
            'username.max' => 'Kolom username maksimal 100 karakter.',
            'username.regex' => 'Kolom username hanya boleh berisi huruf dan angka.',

            'fullName.required' => 'Kolom nama lengkap tidak boleh kosong.',
            'fullName.max' => 'Kolom nama lengkap maksimal 255 karakter.',

            'password.required' => 'Kolom kata sandi tidak boleh kosong.',
            'password.min' => 'Kolom kata sandi minimal 6 karakter.',
            'password.max' => 'Kolom kata sandi maksimal 50 karakter.',

            'retypePassword.required' => 'Kolom konfirmasi kata sandi tidak boleh kosong.',
            'retypePassword.same' => 'Kolom konfirmasi kata sandi harus sama dengan kata sandi.',

        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function register(){
        $this->validate();
        $helper = new APIHelper();

        $user = [
            'username' => $this->username,
            'fullname' => $this->fullName,
            'password' => $this->password,
            'retypePassword' => $this->retypePassword,
                'created_by' => $this->username,
            'role' => 'User',
            'is_deleted' => false,
            'modified_time' => now()
        ];

        $response = $helper->register($user);

        if ($response['statusCode'] == 422) {
            $this->dispatch('alertAuthError', message:$response['message']);
            return;
        } else if($response['statusCode'] == 500 ) {
            $this->addError('serverError', 'Terjadi kesalahan server. Silahkan coba kembali');
            return;
        }

        redirect()->route('login')->with('registerSuccess', 'Berhasil daftar!');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }

    public function togglePasswordVisibility(){
        $this->showPassword = !$this->showPassword;
    }

    public function toggleRetypePasswordVisibility(){
        $this->showRetypePassword = !$this->showRetypePassword;
    }

}
