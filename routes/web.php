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

require __DIR__.'/auth.php';
