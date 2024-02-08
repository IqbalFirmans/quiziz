<?php

namespace App\Services\Auth;

use App\Contracts\Auth\RegisterInterface;
use App\Repositories\Auth\RegisterRepository;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class RegisterService implements RegisterInterface
{
    public $register, $user;
    public function __construct(RegisterRepository $register)
    {
        $this->register = $register;
    }
    public function register($request)
    {
       $this->user = $this->register->register($request);
       return $this->user;
    }
    public function SendEmailVerification()
    {
        event(new Registered($this->user));
    }
    public function Login()
    {
        return Auth::login($this->user);
    }
    public function VerifyEmail($request)
    {
        return $request->fulfill();
    }
}
