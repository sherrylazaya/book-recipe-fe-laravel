<?php

use App\Livewire\Auth\Login;
use App\Livewire\Page\MyRecipe;
use App\Livewire\Page\Dashboard;
use App\Livewire\Page\Favorites;
use App\Livewire\Auth\Register;
use App\Livewire\Page\DetailRecipe;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', Login::class)->name('login');
Route::get('/dashboard', Dashboard::class)->name('dashboard');
Route::get('/my-recipes', MyRecipe::class)->name('my-recipes');
Route::get('/favorites', Favorites::class)->name('favorites');
Route::get('/edit-recipes/{id}', Favorites::class)->name('edit-recipe');
Route::get('/detail/{id}', DetailRecipe::class)->name('detail-recipe');
Route::get('/register', Register::class)->name('register');

