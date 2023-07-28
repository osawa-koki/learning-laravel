<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
