<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Policies\PostPolicy;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Post::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /*  Gate::define('update-post', function (User $user, Post $post){
            return $user->id === $post->user_id;
        });

        Gate::define('delete-post', function (User $user, Post $post){
            return $user->id === $post->user_id;
        }); */

        Gate::define('create-post', function(User $user, Role $role)
        {
            return $user->hasRole($role->name);
        });                                      // backend da gate bilan tekshirish
    }
}
