<?php

namespace App\Providers;

use App\Services\ToDoListService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ToDoListServiceProvider extends ServiceProvider implements DeferrableProvider
{

    public function provides(): array
    {
        return [ToDoListService::class];
    }

    public array $singletons = [
        ToDoListService::class => \App\Services\Impl\ToDoListServiceImpl::class,
    ];

    public function register()
    {

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
