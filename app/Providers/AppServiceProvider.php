<?php

namespace App\Providers;

use App\Models\Role;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

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
        Route::bind('role', function ($value) {
            return Role::where('uid', $value)->firstOrFail();
        });
    }
}
