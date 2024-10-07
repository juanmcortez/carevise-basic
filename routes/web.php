<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Main\DashboardController;
use App\Http\Controllers\Users\ProviderController;

// Routes are accesible if the user is logged in
Route::middleware(['auth'])->group(function () {
    // Dashboard route
    Route::get('/', DashboardController::class)->name('dashboard');

    // Providers routes
    Route::controller(ProviderController::class)
        ->name('provider.')
        ->group(function () {
            // System providers routes
            Route::get('/providers/list', 'index')->name('list');
            Route::get('/providers/{user}/profile/edit', 'edit')->name('profile.edit');
            Route::get('/providers/profile/new', 'create')->name('profile.new');
            // System providers routes

            // Common providers routes
            Route::post('/providers/create', 'store')->name('create');
            Route::patch('/providers/update', 'update')->name('update');
            // Common providers routes
        });

    // Users routes
    Route::controller(UserController::class)
        ->name('user.')
        ->group(function () {
            // Logged-in user routes
            Route::get('/user/edit', 'index')->name('self.edit');
            // Logged-in user routes

            // System user routes
            Route::get('/users/list', 'show')->name('list');
            Route::get('/users/{user}/profile/edit', 'edit')->name('profile.edit');
            Route::get('/users/profile/new', 'create')->name('profile.new');
            // System user routes

            // Common user routes
            Route::post('/users/create', 'store')->name('create');
            Route::patch('/users/update', 'update')->name('update');
            // Common user routes
        });
});
