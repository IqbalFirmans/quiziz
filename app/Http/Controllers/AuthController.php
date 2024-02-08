<?php

namespace App\Http\Controllers;

use App\Services\Auth\LoginService;
use App\Services\Auth\RegisterService;
use App\Services\Auth\SocialiteGithubService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class AuthController extends Controller
{
    public $login, $register, $socialite;
    public function __construct(LoginService $login, RegisterService $register, SocialiteGithubService $socialite)
    {
        $this->login = $login;
        $this->register = $register;
        $this->socialite = $socialite;
    }
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $this->register->register($request->all());
        $this->register->SendEmailVerification();
        $this->register->Login();
        return redirect()->route('verification.notice');
    }
    public function verify_email(EmailVerificationRequest $request)
    {
        $request->fulfill();
        $this->register->VerifyEmail($request);
        return redirect('/user/profile');
    }
    public function process_login(Request $request)
    {
        $login = $this->login->login($request->all());
        if (!$login) {
            # code...
            return redirect()->back()->withErrors('Gagal Login.');
        }
        return redirect()->route('home')->with('success', 'Sukses login, selamat datang di web ini.');
    }
    public function redirect_socialite_github()
    {
        return $this->socialite->redirect_github();
    }
    public function callback_socialite_github()
    {
        $this->socialite->callback_github();
        return redirect('/user/home')->with('success', 'Sukses masuk dengan akun github.');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Sukses logout.');
    }
}
