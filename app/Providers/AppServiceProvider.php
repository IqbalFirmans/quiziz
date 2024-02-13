<?php

namespace App\Providers;

use App\Contracts\Auth\LoginInterface;
use App\Contracts\Auth\RegisterInterface;
use App\Contracts\Auth\SocialiteInterface;
use App\Contracts\Store\UpdateInterface;
use App\Contracts\Store\UpdateWithFileInterface;
use App\Contracts\ValidasiInterface;
use App\Repositories\Auth\ChangePasswordRepository;
use App\Repositories\Profile\UpdateProfileRepository;
use App\Services\Auth\LoginService;
use App\Services\Auth\RegisterService;
use App\Services\Auth\SocialiteGithubService;
use App\Validators\ValidasiValidator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // auth
        $this->app->bind(RegisterInterface::class, RegisterService::class);
        $this->app->bind(LoginInterface::class, LoginService::class);
        $this->app->bind(SocialiteInterface::class, SocialiteGithubService::class);

        // validasi
        $this->app->bind(ValidasiInterface::class, ValidasiValidator::class);

        // update profile
        $this->app->bind(UpdateInterface::class, UpdateProfileRepository::class);
        $this->app->bind(UpdateWithFileInterface::class, UpdateProfileRepository::class);

        // change password
        $this->app->bind(UpdateInterface::class, ChangePasswordRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
