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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->registerPolicies();

        Gate::define('admin', function ($user) {
            return $user->role_id==1;
        });

        Gate::define('restaurant', function ($user) {
            return $user->role_id==2;
        });
        Gate::define('customer', function ($user) {
            return $user->role_id==3;
        });
        Gate::define('waiter', function ($user) {
            return $user->role_id==4;
        });
        Gate::define('roles',function($user){
            return $user->role_id==2;
        });
        
        
        Gate::define('', function ($user) {
            return true;
        });

 
        //
    
    }
}
