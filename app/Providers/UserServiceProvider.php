<?php

namespace App\Providers;

use App\Services\Impl\UserServiceImpl;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Services\UserService;

class UserServiceProvider extends ServiceProvider implements DeferrableProvider
{

    public function provides(): array
    {
        return [UserService::class];
    }

    public function register()
    {
        $this->app->singleton(UserService::class, function ($app) {
            return new UserServiceImpl();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
