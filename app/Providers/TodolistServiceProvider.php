<?php

namespace App\Providers;

use App\Services\Impl\TodolistServiceImpl;
use App\Services\TodolistService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

class TodolistServiceProvider extends ServiceProvider implements DeferrableProvider
{

    public array $singletons = [

        TodolistService::class => TodolistServiceImpl::class
    ];

    public function provides(): array
    {
        return [TodolistService::class];
    }
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
        //
    }
}
