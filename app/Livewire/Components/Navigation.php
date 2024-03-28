<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Route;

class Navigation extends Component
{
    public $isCurrent = 'dashboard';

    public function logout(){
        session()->forget('token');
        session()->forget('userId');
        return redirect()->to(route('login'));
    }

    public function mount(){
        $route = Route::currentRouteName();
        $previousRoute = session()->get('navPage') ?? 'dashboard';
        if(in_array($route, ['dashbaord', 'my-recipes', 'favorites'])){
            $this->isCurrent = $previousRoute;
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
