<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\StringShorter\ShorterProviders\SimpleShorterProvider;
use App\Services\StringShorter\ShorterProviders\ShorterProviderInterface;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        ShorterProviderInterface::class => SimpleShorterProvider::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
