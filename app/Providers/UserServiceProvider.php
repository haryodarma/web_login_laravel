<?php

namespace App\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Services\UserService;

class UserServiceProvider extends ServiceProvider implements DeferrableProvider
{

    public function provides(): array
    {
        return [UserService::class];
    }
    /**
     * Register services.
     *
     * @return void
     */

    public array $singletons = [
        \App\Services\UserService::class => \App\Services\Impl\UserServiceImpl::class
    ];

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
        //
    }
}
