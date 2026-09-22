<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('home');
});

// Authentication routes
Route::middleware(['guest'])->controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
    Route::post('/login', 'handleLogin')->name('handlelogin');
    Route::post('/register', 'handleRegister')->name('handleregister');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin
Route::get('/admin', HomeController::class)->name('admin.home');

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