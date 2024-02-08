<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\Auth\RegisterRepository;
use App\Services\LoginService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class AuthController extends Controller
{
    public $login, $register;
    public function __construct(LoginService $login, RegisterRepository $register)
    {
        $this->login = $login;
        $this->register = $register;
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
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Sukses logout.');
    }
}
