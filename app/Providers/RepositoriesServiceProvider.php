<?php

namespace App\Providers;

use App\Repositories\AdminRepositoryInterface;
use App\Repositories\Eloquent\AdminRepository;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\BlogRepository;
use App\Repositories\Eloquent\PhotoRepository;
use App\Repositories\BlogRepositoryInterface;
use App\Repositories\Eloquent\PrivilegeRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\EloquentRepositoryInterface;
use App\Repositories\PhotoRepositoryInterface;
use App\Repositories\PrivilegeRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
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
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(BlogRepositoryInterface::class, BlogRepository::class);
        $this->app->bind(PhotoRepositoryInterface::class, PhotoRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(AdminRepositoryInterface::class, AdminRepository::class);
        $this->app->bind(PrivilegeRepositoryInterface::class, PrivilegeRepository::class);
    }
}
