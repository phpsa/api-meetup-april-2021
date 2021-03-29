<?php

namespace App\Providers;

use App\Models\Blog\Post;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->registerGates();
        //
    }

    protected function registerGates()
    {
        Gate::define('manage_own_post', function ($user, $post) {
            // Only users whose login account is linked to a firm can do things for that firm.
            if ($post instanceof Post) {
                $post = $post->id;
            }

            return $user->hasPost($post) ? Response::allow() : Response::deny("You do not have access to this post");
        });
    }
}
