<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Auth\SocialiteGithubService;

class SocialiteController extends Controller
{
    public $socialite_github;
    public function __construct(SocialiteGithubService $socialite_github)
    {
        $this->socialite_github = $socialite_github;
    }
    public function redirect_socialite_github()
    {
        return $this->socialite_github->redirect();
    }
    public function callback_socialite_github()
    {
        $callback = $this->socialite_github->callback();
        if ($callback === false) {
            return redirect()->route('register')->withErrors('Akun email anda sudah pernah digunakan sebelumnya.');
        } else {
            return redirect('/user/home')->with('success', 'Sukses masuk dengan akun github.');
        }
    }
}
