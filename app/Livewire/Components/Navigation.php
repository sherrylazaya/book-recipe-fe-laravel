<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Route;

class Navigation extends Component
{
    public $isCurrent;

    public function logout(){
        session()->forget('token');
        session()->forget('userId');
        session()->forget('navPage');
        return redirect()->to(route('login'));
    }

    public function mount(){
        $route = Route::currentRouteName();
        $previousRoute = session()->get('navPage') ?? 'dashboard';
        if(in_array($route, ['dashboard', 'my-recipes', 'favorites'])){
            $this->isCurrent = $route;
            session()->put('navPage', $route);
        }else{
            $this->isCurrent = $previousRoute;
        }
    }

    public function render()
    {
        return view('livewire.components.navigation');
    }
}
