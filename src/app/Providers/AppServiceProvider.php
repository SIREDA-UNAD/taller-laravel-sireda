<?php

namespace App\Providers;

use Illuminate\Support\Facades\Mail;
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
        if (config('app.MAIL_DEBUG_ALWAYS_TO')) {
            Mail::alwaysTo(config('app.MAIL_DEBUG_ALWAYS_TO'));
        }

        Password::defaults(function () {
            $rule = Password::min(36)->max(512)->letters()->mixedCase()->numbers();

            return $rule;
        });
    }
}
