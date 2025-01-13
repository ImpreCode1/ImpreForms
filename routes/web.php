<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Controller;
use App\Livewire\Auth\Login;
use App\Livewire\EnviarFormulario;
use App\Livewire\Formulariofinanciera;
use App\Livewire\FormularioInteractivo;
use App\Livewire\Historial;
use App\Livewire\Layout\ManagerSidebar;
use Illuminate\Support\Facades\DB;
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
Route::view('/menu', 'menu')
->middleware(['auth'])
->name('menu');

Route::view('/historial', 'historial')
->middleware(['auth'])
->name('historial');



// * : ruta para el cierre de sesion.

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// * rutas para los formularios.

// Route::get('/formulario', function () {
//     return view('formulario', ['mostrarFormularioInteractivo' => true, 'mostrarFormularioFinanciera' => false]);
// });

// Route::get('/formulario-financiera', function () {
//     return view('formulario', ['mostrarFormularioInteractivo' => false, 'mostrarFormularioFinanciera' => true]);
// });

Route::get('/enviar-formulario', EnviarFormulario::class);

// Ruta para el formulario interactivo
Route::get('/formulario-operaciones/{link}', function ($link) {
    $record = DB::table('form_links')->where('link', $link)->where('type', 'operaciones')->first();
    if (!$record) {
        abort(404, 'El enlace no es válido.');
    }
    return view('formulario', [
        'mostrarFormularioInteractivo' => true,
        'mostrarFormularioFinanciera' => false,
        'link' => $link,
        'cliente' => $record->cliente,
        'nombre' => $record->nombre,
        'crm' => $record->crm
    ]);
})->name('formulario-operaciones');

// Ruta para el formulario financiera
Route::get('/formulario-financiera/{link}', function ($link) {
    $record = DB::table('form_links')->where('link', $link)->where('type', 'financiera')->first();
    if (!$record) {
        abort(404, 'El enlace no es válido.');
    }
    return view('formulario', [
        'mostrarFormularioInteractivo' => false,
        'mostrarFormularioFinanciera' => true,
        'link' => $link,
        'cliente' => $record->cliente,
        'nombre' => $record->nombre,
        'crm' => $record->crm,
        'forma_pago' => $record->forma_pago,
        'moneda' => $record->moneda,
        'otros' => $record->otros,
    ]);
});


require __DIR__ . '/auth.php';




// TODO: se utiliza para indicar que hay una tarea pendiente .
// !: ¡advertencia!.
// ? :  Puede indicar una sección del código que no está clara o donde se necesita una explicación adicional
// * : se usa dentro de los comentarios para resaltar o estructurar una lista de cosas.
