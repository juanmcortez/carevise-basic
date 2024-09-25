<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\DashboardController;

Route::get('/', DashboardController::class)->name('dashboard');
