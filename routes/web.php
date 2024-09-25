<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Main\DashboardController;

Route::get('/', DashboardController::class)
    ->name('dashboard');

Route::controller(UserController::class)
    ->name('user.')
    ->group(function (){
        // Logged-in user routes
        Route::get('/user/edit', 'index')
            ->name('self.edit');
        // Logged-in user routes

        // System user routes
        Route::get('/user/{user}/profile/edit', 'edit')
            ->name('profile.edit');
        // System user routes

        // Common user routes
        Route::patch('/user/update', 'update')
            ->name('update');
        // Common user routes
});
