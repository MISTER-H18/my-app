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

Route::get('/', function () {
    return view('auth.login');
});

// $authMiddleware = config('jetstream.guard')
//         ? 'auth:'.config('jetstream.guard')
//         : 'auth';

// $authSessionMiddleware = config('jetstream.auth_session', false)
//     ? config('jetstream.auth_session')
//     : null;

// Route::group(['middleware' => array_values(array_filter([$authMiddleware, $authSessionMiddleware]))], function () {
//     Route::get('/user/profile', [App\Http\Controllers\CustomUserProfileController::class, 'show'])->name('profile.show');
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

Route::get('/testing', [App\Http\Controllers\TestingController::class, ('test')]);