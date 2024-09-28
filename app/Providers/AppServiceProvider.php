<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Default password rules for all the app
        Password::defaults(function () {
            $rule = Password::min(12)
                ->letters()
                ->numbers()
                ->symbols();
            return $this->app->isProduction() ? $rule->mixedCase()->uncompromised() : $rule;
        });
        // Default password rules for all the app
    }
}
