<?php

use App\Http\Controllers\CursoController;
use App\Http\Controllers\eventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SystemSettingsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\finanzaController;
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

    //

    Route::controller(eventController::class)->group(function () {
        Route::get('event', 'event')->name('event.event');
        Route::get('event/eventCrud', 'EventCrud')->name('event.EventCrud');
        //Formulario de crear evento
        Route::get('event/create', 'create')->name('event.eventCreate');
        Route::post('event/update', 'update')->name('event.update');
        //Peticion POST para guardar el formulario de crear curso
        Route::post('event/store', 'Store')->name('event.store');
        //Mostrar informacion del curso por ID
        Route::get('event/Editar/{id}', 'show')->name('event.show');
        //Editar un curso por su id
        //Eliminar cursos
        Route::get('event/Eliminar/{id}', 'destroy')->name('event.destroy');
        Route::get('estadisticas', 'statistics')->name('user.estadistica');
        
    });
    //

    Route::controller(finanzaController::class)->group(function () {
        Route::get('finanzas', 'index')->name('finanzas.index');

        Route::get('finanza/create', 'create')->name('finanza.create');

        Route::get('finanza/Eliminar/{id}', 'destroy')->name('finanza.destroy');

        Route::get('finanza/Editar/{id}', 'show')->name('finanza.show');

        //Enviar el formulario de edición a la base de datos
        //Crear un curso en la base de datos
        Route::post('finanza/store', 'store')->name('finanza.store');
        Route::post('finanza/update', 'update')->name('finanza.update');

        //Eliminar un curso de la base de datos
    });


    //Rutas para modulo de cursos
    Route::controller(CursoController::class)->group(function () {
        Route::get('curso', 'index')->name('curso.index');

        Route::get('curso/crud', 'cursoCrud')->name('curso.cursoCrud');
        
        Route::get('curso/create', 'create')->name('curso.create');
        Route::post('curso/update', 'update')->name('curso.update');

        Route::get('curso/Eliminar/{id}', 'destroy')->name('curso.destroy');

        Route::get('curso/Editar/{id}', 'show')->name('curso.show');

        //Enviar el formulario de edición a la base de datos


        //Crear un curso en la base de datos
        Route::post('curso', 'store')->name('curso.store');

        //Eliminar un curso de la base de datos
    });

});
