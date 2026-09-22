<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

Route::get('/', function () {
    return view('home');
});

// Booking routes
Route::get('/book/{car}', [\App\Http\Controllers\BookingController::class, 'create'])
    ->name('bookings.create');

Route::post('/bookings', [\App\Http\Controllers\BookingController::class, 'store'])
    ->name('bookings.store');

Route::get('/my-bookings', [\App\Http\Controllers\BookingController::class, 'index'])
    ->name('bookings.index');

// Cars routes
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');

Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show');

// Pages
Route::get('/pages', function () {
    return view('pages');
})->name('pages');