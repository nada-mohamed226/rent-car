<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/book/{car}', [\App\Http\Controllers\BookingController::class, 'create'])
    ->name('bookings.create');

Route::post('/bookings', [\App\Http\Controllers\BookingController::class, 'store'])
    ->name('bookings.store');

Route::get('/my-bookings', [\App\Http\Controllers\BookingController::class, 'index'])
    ->name('bookings.index');
