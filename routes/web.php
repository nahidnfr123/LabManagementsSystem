<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/about', function () {
    return view('about');
});


// Dashboard Routes ...
Route::group(['prefix' => 'backend', 'middleware' => ['auth', 'role:admin|staff|laboratorian']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // only Admin Role Routes ...
    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('hr', [UsersController::class, 'hr'])->name('users.hr');
        Route::get('patient', [UsersController::class, 'index'])->name('users.patient');

        Route::resource('users', UsersController::class, ['as' => ''])->except(['index', 'hr']);
    });
});

require __DIR__ . '/auth.php';
