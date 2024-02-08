<?php

namespace App\Providers;

use App\Contracts\Auth\LoginInterface;
use App\Contracts\Auth\RegisterInterface;
use App\Contracts\ValidasiInterface;
use App\Services\Auth\LoginService;
use App\Services\Auth\RegisterService;
use App\Validators\ValidasiValidator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RegisterInterface::class, RegisterService::class);
        $this->app->bind(LoginInterface::class, LoginService::class);
        $this->app->bind(ValidasiInterface::class, ValidasiValidator::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
