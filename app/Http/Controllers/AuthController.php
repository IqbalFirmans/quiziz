<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\Auth\LoginService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Services\Auth\RegisterService;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use App\Services\Auth\SocialiteGithubService;
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

    // Reset password

    public function request_reset()
    {
        return view('auth.forgot-password');
    }

    public function send_reset_link(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function reset_password($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    // End Reset password

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
