<?php

namespace App\Providers;

use App\Repositories\Eloquent\BlogRepository;
use App\Repositories\Eloquent\PhotoRepository;
use App\Repositories\BlogRepositoryInterface;
use App\Repositories\PhotoRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(BlogRepositoryInterface::class, BlogRepository::class);
        $this->app->bind(PhotoRepositoryInterface::class, PhotoRepository::class);
    }
}
