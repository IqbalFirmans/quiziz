<?php

namespace App\Repositories\Auth;

use App\Contracts\Auth\RegisterInterface;
use Illuminate\Http\Request;
use App\Models\User;
use App\Validators\ValidasiValidator;

class RegisterRepository implements RegisterInterface
{
    public $validasi;
    public function __construct(ValidasiValidator $validasi)
    {
        $this->validasi = $validasi;
    }
    public function register($request) {
        $rules = [
            'name' => 'required|max:25',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ];
        $this->validasi->validate($request, $rules);
        return User::create($request);
    }
    public function SendEmailVerification(User $user) {

    }
    public function Verification($token) {

    }
}
