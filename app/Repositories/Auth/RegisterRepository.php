<?php

namespace App\Repositories\Auth;

use App\Contracts\Auth\RegisterInterface;
use Illuminate\Http\Request;
use App\Models\User;
use App\Validators\ValidasiValidator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class RegisterRepository implements RegisterInterface
{
    public $validasi, $user;
    public function __construct(ValidasiValidator $validasi)
    {
        $this->validasi = $validasi;
    }
    public function register($request)
    {
        $rules = [
            'name' => 'required|max:25',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ];
        $this->validasi->validate($request, $rules);
        $this->user = User::create($request);
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
