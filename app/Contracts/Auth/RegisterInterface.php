<?php

namespace App\Contracts\Auth;

use App\Models\User;
use Illuminate\Http\Request;

interface RegisterInterface{
    public function register(Request $request);
    public function SendEmailVerification(User $user);
    public function Verification($token);
}


