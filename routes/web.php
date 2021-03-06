<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LabTestController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Models\Appointment;
use App\Models\LabReports;
use App\Models\LabTest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $labtests = LabTest::get();
    $lastAppointment = null;
    if (isset(Auth::user()->id)) {
        $lastAppointment = Appointment::where('users_id', Auth::user()->id)
            // ->where('status', 'confirmed')
            ->where('order_id', null)
            ->latest()->first();
    }
    return view('index', compact('labtests', 'lastAppointment'));
})->name('index');

Route::get('/about', function () {
    return view('about');
});

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

Route::resource('userappointment', AppointmentController::class)->only(['store']);
Route::post('payment', [PaymentController::class, 'store']);
Route::post('test-cost', [LabTestController::class, 'totalTestCost']);

Route::get('profile', function () {
    $appointments = Appointment::where('users_id', Auth::user()->id)
        // ->where('status', 'confirmed')
        //->where('order_id', null)
        ->latest()->get();
    return view('profile', compact('appointments'));
})->middleware('auth');
Route::get('view-report/{id}', function ($id) {
    $labtests = LabReports::with('appointment')->where('appointments_id', $id)->get();
    return view('view-report', compact('labtests'));
});

// Dashboard Routes ...
Route::group(['prefix' => 'backend', 'middleware' => ['auth', 'role:admin|staff|laboratorian']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    // only Admin Role Routes ...
    Route::group(['middleware' => ['role:admin|staff']], function () {
        Route::get('hr', [UsersController::class, 'hr'])->name('users.hr');
        Route::get('add-salary/{id}', [UsersController::class, 'addSalary'])->name('users.salary');
        Route::get('patient', [UsersController::class, 'index'])->name('users.patient');
        // Route::resource('users', UsersController::class, ['as' => ''])->except(['index', 'hr']);
        Route::resource('users', UsersController::class)->except(['index', 'hr']);
        # Work left to do ....
        Route::resource('lab-test', LabTestController::class);
        Route::resource('salary', SalaryController::class);
        Route::resource('appointment', AppointmentController::class);
        Route::get('add-report/{id}', [LabTestController::class, 'addReport'])->name('report.pdf.show');
        Route::get('view-report/{id}', [LabTestController::class, 'showPdfReport'])->name('report.show');
        Route::post('add-pdf', [LabTestController::class, 'addPdf'])->name('report.pdf.store');
        Route::get('set-status/{id}/{status}', [AppointmentController::class, 'setStatus'])->name('appointment.setstatus');
        Route::resource('payment', PaymentController::class);
        # Work left to do ....
        Route::resource('inventory', InventoryController::class);
    });
});

require __DIR__ . '/auth.php';
