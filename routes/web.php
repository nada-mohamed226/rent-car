<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarController;

Route::get('/', function () {
    return view('home');
});

Route::middleware(['guest'])->controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
    Route::post('/login', 'handleLogin')->name('handlelogin');
    Route::post('/register', 'handleRegister')->name('handleregister');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin', HomeController::class)->name('admin.home');

Route::get('/cars', [CarController::class, 'index'])->name('cars.index');

Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show');

Route::get('/pages', function () {
    return view('pages');
})->name('pages');