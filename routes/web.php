<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Controller;
use App\Livewire\Auth\Login;
use App\Livewire\EnviarFormulario;
use App\Livewire\FormularioInteractivo;
use App\Livewire\Historial;
use App\Livewire\Layout\ManagerSidebar;
use Illuminate\Support\Facades\Route;


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

// Route::get('/manager-dashboard', function () {
//     return view('livewire.layout.manager-sidebar');
// })->name('manager.dashboard');


// rutas sin recragra
Route::get('/manager-dashboard', ManagerSidebar::class)->name('manager.dashboard');
Route::view('/enviar-formulario', 'enviar-formulario')->name('formulario');
Route::view('/historial', 'historial')->name('historial');



// * : ruta para el cierre de sesion.

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// * rutas para los formularios.

Route::get('/formulario', function () {
    return view('formulario', ['mostrarFormularioInteractivo' => true, 'mostrarFormularioFinanciera' => false]);
});

Route::get('/formulario-financiera', function () {
    return view('formulario', ['mostrarFormularioInteractivo' => false, 'mostrarFormularioFinanciera' => true]);
});

require __DIR__ . '/auth.php';




// TODO: se utiliza para indicar que hay una tarea pendiente .
// !: ¡advertencia!.
// ? :  Puede indicar una sección del código que no está clara o donde se necesita una explicación adicional
// * : se usa dentro de los comentarios para resaltar o estructurar una lista de cosas.
