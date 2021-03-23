<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
 
        /* define an moderator role */
        Gate::define('isModerator', function($user) {
        return $user->role == 'moderator';
        });
        
        /* define an faculty role */
        Gate::define('isFaculty', function($user) {
        return $user->role == 'faculty';
        });
        
        /* define a user role */
        Gate::define('isUser', function($user) {
        return $user->role == 'user';
        });
    }
}
