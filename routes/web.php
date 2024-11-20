<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PolicyController;

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'create'])->name('register');



Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/policies', [PolicyController::class, 'index'])->name('policies');
    Route::get('/policies/create', [PolicyController::class, 'create'])->name('policies.create');
    Route::post('/policies', [PolicyController::class, 'store'])->name('policies.store');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
