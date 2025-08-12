<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\MembershipController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('appointments', AppointmentController::class);
    Route::resource('memberships', MembershipController::class);
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function() {
        return view('admin.dashboard');
    });
});

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\MembershipController;

// Protect these routes so only logged-in users can access
Route::middleware(['auth'])->group(function () {
    // Appointments
    Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::delete('/appointments/{appointment}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');

    // Memberships
    Route::get('/memberships', [MembershipController::class, 'index'])->name('memberships.index');
    Route::get('/memberships/create', [MembershipController::class, 'create'])->name('memberships.create');
    Route::post('/memberships', [MembershipController::class, 'store'])->name('memberships.store');
    Route::delete('/memberships/{membership}', [MembershipController::class, 'destroy'])->name('memberships.destroy');
});



require __DIR__.'/auth.php';
