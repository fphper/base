<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Dingo\Api\Auth\Auth;
use Dingo\Api\Auth\Provider\Basic;
//use Laravel\Passport\Passport;

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

        //
        // Dingo 认证驱动注册
        $this->app->make(Auth::class)->extend('basic', function ($app) {
            return new Basic($app['auth'], 'email');
        });

//        Passport::routes();
    }
}
