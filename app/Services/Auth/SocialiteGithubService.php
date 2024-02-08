<?php

namespace App\Services\Auth;

use App\Contracts\Auth\Socialite\GithubInterface;
use Laravel\Socialite\Facades\Socialite;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialiteGithubService implements GithubInterface
{
    public function __construct()
    {
        //
    }
    public function redirect_github()
    {
        return Socialite::driver("github")->redirect();
    }
    public function callback_github()
    {
        $githubUser = Socialite::driver("github")->user();


        $user = User::updateOrCreate([
            'github_id' => $githubUser->id,
        ], [
            'name' => $githubUser->nickname,
            'email' => $githubUser->email,
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
            'password' => $githubUser->nickname,
        ]);

        $user->email_verified_at = Carbon::now();
        $user->save();
        return Auth::login($user);
    }
}
