<?php

namespace App\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            \App\Domain\Category\Repositories\CategoryRepositoryInterface::class,
            \App\Infrastructure\Database\Repositories\EloquentCategoryRepository::class
        );
    }
}
