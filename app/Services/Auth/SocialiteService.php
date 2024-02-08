<?php

namespace App\Services\Auth;

use App\Contracts\Auth\SocialiteInterface;
use Laravel\Socialite\Facades\Socialite;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialiteService implements SocialiteInterface
{
    public function __construct()
    {
        //
    }
    public function redirect($with)
    {
        return Socialite::driver($with)->redirect();
    }
    public function callback($with)
    {
        $githubUser = Socialite::driver('github')->user();

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
