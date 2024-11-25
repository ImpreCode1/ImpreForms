<?php

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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


//sidebar users
Route::get('/user-dashboard', function () {
    return view('livewire.layout.user-sidebar');
})->name('user.dashboard');

Route::get('/manager-dashboard', function () {
    return view('livewire.layout.manager-sidebar');
})->name('manager.dashboard');


// rutas sin recragra 

require __DIR__ . '/auth.php';
