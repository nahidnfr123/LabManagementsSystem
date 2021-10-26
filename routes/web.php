<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LabTestController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UsersController;
use App\Models\LabTest;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $labtests = LabTest::get();
    return view('index', compact('labtests'));
})->name('index');

Route::get('/about', function () {
    return view('about');
});


Route::resource('userappointment', AppointmentController::class)->only(['store']);
Route::post('payment', [PaymentController::class, 'store']);

// Dashboard Routes ...
Route::group(['prefix' => 'backend', 'middleware' => ['auth', 'role:admin|staff|laboratorian']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // only Admin Role Routes ...
    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('hr', [UsersController::class, 'hr'])->name('users.hr');
        Route::get('patient', [UsersController::class, 'index'])->name('users.patient');

        // Route::resource('users', UsersController::class, ['as' => ''])->except(['index', 'hr']);
        Route::resource('users', UsersController::class)->except(['index', 'hr']);

        # Work left to do ....
        Route::resource('lab-test', LabTestController::class);
        Route::resource('appointment', AppointmentController::class);
        Route::get('set-status/{id}/{status}',[AppointmentController::class, 'setStatus'])->name('appointment.setstatus');
        Route::resource('payment', PaymentController::class);
        # Work left to do ....
    });
});

require __DIR__ . '/auth.php';
