<?php

use App\Http\Controllers\CursoController;
use App\Http\Controllers\eventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SystemSettingsController;
use App\Http\Controllers\UserController;
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

if (!config('jetstream.auth_session', false)) {

    Route::view('/', ('auth.login'));

} else {
    Route::redirect('/', '/dashboard');
}

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', HomeController::class)->name('dashboard');

    Route::resource('members', UserController::class)->name('index', 'members');

    Route::get('/system-settings', [SystemSettingsController::class, 'show'])->name('system-settings.show');

    Route::controller(eventController::class)->group(function () {
        Route::get('event', 'event')->name('event.event');
        Route::get('event/eventCrud', 'EventCrud')->name('event.EventCrud');
        //Formulario de crear evento
        Route::get('event/create', 'create')->name('event.eventCreate');
        //Peticion POST para guardar el formulario de crear curso
        Route::post('event/store', 'Store')->name('event.store');
        //Mostrar informacion del curso por ID
        Route::get('event/{id}', 'show')->name('event.show');
        //Editar un curso por su id
        Route::get('event/{id}/edit', 'edit')->name('event.edit');
        //Actualizar los datos de un curso
        Route::put('event/update/{id}', 'Update')->name('event.update');
        //Eliminar cursos
        Route::delete('event/destroy/{id}', 'Destroy')->name('event.destroy');
    });

    //Rutas para modulo de cursos
    Route::controller(CursoController::class)->group(function () {
        Route::get('curso', 'index')->name('curso.index');

        Route::get('curso/crud', 'cursoCrud')->name('curso.cursoCrud');

        Route::get('curso/create', 'create')->name('curso.create');

        Route::get('curso/{id}', 'show')->name('curso.show');

        //Enviar el formulario de edición a la base de datos
        Route::put('curso/{curso}', 'update')->name('curso.update');

        //Crear un curso en la base de datos
        Route::post('curso', 'store')->name('curso.store');

        //Eliminar un curso de la base de datos
        Route::delete('curso/{curso}', 'destroy')->name('curso.destroy');
    });
    Route::resource('curso', CursoController::class);

});
