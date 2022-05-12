<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
//         'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('user-view-update-blog', function ($user, $blog) {
            return $user->id === $blog->user_id;
        });


        // admin view & edit & delete blogs
        Gate::define('admin-viewAll-blogs', function (){
            return Auth::user()->privileges->blog_list;
        });

        Gate::define('admin-edit-blog', function (){
            return Auth::user()->privileges->blog_edit;
        });

        Gate::define('admin-delete-blog', function (){
            return Auth::user()->privileges->blog_delete;
        });


        // admin view & create & edit & delete users
        Gate::define('admin-viewAll-users', function (){
            return Auth::user()->privileges->user_list;
        });

        Gate::define('admin-create-user', function (){
            return Auth::user()->privileges->user_create;
        });

        Gate::define('admin-edit-user', function (){
            return Auth::user()->privileges->user_edit;
        });

        Gate::define('admin-delete-user', function (){
            return Auth::user()->privileges->user_delete;
        });


        // admin view & create & edit & delete admins
        Gate::define('admin-viewAll-admins', function (){
            return Auth::user()->privileges->admin_list;
        });

        Gate::define('admin-create-admin', function (){
            return Auth::user()->privileges->admin_create;
        });

        Gate::define('admin-edit-admin', function (){
            return Auth::user()->privileges->admin_edit;
        });

        Gate::define('admin-delete-admin', function (){
            return Auth::user()->privileges->admin_delete;
        });
    }
}
