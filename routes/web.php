<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\UserController;

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
    
if(!config('jetstream.auth_session', false)){

    Route::view('/', ('auth.login')->name('login'));

}else Route::redirect('/', 'dashboard');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');

    Route::controller(UserController::class)->group(function () {
        Route::get('/members', 'index')->name('members');
        Route::post('/members', 'store');
        Route::get('/members/{id}', 'show');
        Route::put('/members/{id}/update', 'update');
        Route::delete('/members/{id}', 'destroy');
    });

});

Route::get('/testing', [App\Http\Controllers\TestingController::class, ('test')]);