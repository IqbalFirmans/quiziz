<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Auth\RegisterService;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class RegisterController extends Controller
{
    public $register;
    public function __construct(RegisterService $register)
    {
        $this->register = $register;
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
}
