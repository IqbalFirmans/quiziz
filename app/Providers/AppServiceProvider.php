<?php

namespace App\Providers;

use App\Contracts\Auth\LoginInterface;
use App\Contracts\Auth\RegisterInterface;
use App\Contracts\Auth\SocialiteInterface;
use App\Contracts\Basic\StoreInterface;
use App\Contracts\Basic\UpdateInterface;
use App\Contracts\Basic\UpdateWithFileInterface;
use App\Contracts\ValidasiInterface;
use App\Repositories\Auth\ChangePasswordRepository;
use App\Repositories\Profile\UpdateProfileRepository;
use App\Repositories\Quiz\PublicationQuizRepository;
use App\Repositories\Quiz\Question\StoreOptionRepository;
use App\Repositories\Quiz\Question\StoreQuestionRepository;
use App\Repositories\Quiz\Question\UpdateOptionRepository;
use App\Repositories\Quiz\Question\UpdateQuestionRepository;
use App\Repositories\Quiz\QuizRepository;
use App\Services\Auth\LoginService;
use App\Services\Auth\RegisterService;
use App\Services\Auth\SocialiteGithubService;
use App\Validators\ValidasiValidator;
use Carbon\Carbon;
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

        // quiz
        $this->app->bind(StoreInterface::class, QuizRepository::class);
        $this->app->bind(UpdateInterface::class, QuizRepository::class);

        // publication quiz
        $this->app->bind(UpdateInterface::class, PublicationQuizRepository::class);

        // store question & option
        $this->app->bind(StoreInterface::class, StoreQuestionRepository::class);
        $this->app->bind(StoreInterface::class, StoreOptionRepository::class);

        // update question & option
        $this->app->bind(UpdateInterface::class, UpdateQuestionRepository::class);
        $this->app->bind(UpdateInterface::class, UpdateOptionRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // set locale for carbon
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
    }
}
