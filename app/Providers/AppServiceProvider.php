<?php

namespace App\Providers;

use App\Events\SaleCreated;
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
    }

    protected $listen = [
       SaleCreated::class => [
           \App\Listeners\UpdateProductStock::class,
       ],
    ];
}
