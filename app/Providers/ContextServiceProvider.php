<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Context;

class ContextServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('context', function ($app) {
            return new Context();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
