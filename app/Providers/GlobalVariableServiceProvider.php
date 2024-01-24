<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class GlobalVariableServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Retrieve the userType from the cache or set a default value
        $userType = config('app.userType', '0');

        // Share the userType variable with all views
        view()->share('userType', $userType);
    }
}
