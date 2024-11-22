<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PolicyController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Policy;
use Carbon\Carbon;

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'create'])->name('register');



Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        $policies_active_count = Policy::where('status', 'Active')->count();
        $policies_expiring_30 = Policy::where('status', 'Active')->where('end_date', '>=', Carbon::now()->addDays(30))->count();

        return view('dashboard', compact('policies_active_count', 'policies_expiring_30'));
    })->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/policies', [PolicyController::class, 'index'])->name('policies');
    Route::get('/policies/view/{id}', [PolicyController::class, 'show'])->name('policies.show');
    Route::get('/policies/create', [PolicyController::class, 'create'])->name('policies.create');
    Route::get('/policies/{id}/edit', [PolicyController::class, 'edit'])->name('policies.edit');

    Route::post('/policies', [PolicyController::class, 'store'])->name('policies.store');


    Route::put('/policies/{id}', [PolicyController::class, 'update'])->name('policies.update');

    Route::delete('/policies/{id}', [PolicyController::class, 'destroy'])->name('policies.destroy')->middleware(AdminMiddleware::class);
});
