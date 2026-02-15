<?php

namespace App\Providers;

use App\Events\SaleCreated;
use App\Models\PersonalAccessToken;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;

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
    public function boot(): void {}

    protected $listen = [
        SaleCreated::class => [
            \App\Listeners\UpdateProductStock::class,
        ],

       Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class),

    ];
}
