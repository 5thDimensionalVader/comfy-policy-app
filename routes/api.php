<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PolicyController;

Route::get('/policies', [PolicyController::class, 'api'])->name('policies.api');