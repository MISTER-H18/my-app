<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\CursoController;
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
    return view('auth.login');
});

Route::get('/cursos', function () {
    return 'welcome';
    
});

Route::get('/testing', [App\Http\Controllers\TestingController::class, ('test')]);

// Route::get('/user/profile', function () {

//     $marital_statuses = \App\Models\MaritalStatus::all();
//     $occupations = \App\Models\Occupation::all();

//     return view('profile.update-profile-information-form', ['marital_statuses' => $marital_statuses, 'occupations' => $occupations]);

// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});





//Rutas para modulo de cursos
Route::controller(CursoController::class)->group(function () {
    Route::get('curso','index')->name('curso.index');

    Route::get('curso/create','create')->name('curso.create');

    Route::get('curso/{id}','show' )->name('curso.show');

//Formulario de edicion y actualizacion de registros
    Route::get('curso/{curso}/edit','edit') -> name('curso.edit');

//Enviar el formulario de edición a la base de datos
    Route::put('curso/{curso}','update') -> name('curso.update');

//Crear un curso en la base de datos
    Route::post('curso','store') -> name('curso.store');

//Eliminar un curso de la base de datos
    Route::delete('curso/{curso}','destroy') -> name('curso.destroy');
});