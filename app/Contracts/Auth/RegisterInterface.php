<?php

namespace App\Contracts\Auth;

use App\Models\User;
use Illuminate\Http\Request;

interface RegisterInterface{
    public function register(Request $request);
    public function SendEmailVerification();
    public function Login();
    public function VerifyEmail($request);
}


