<?php

namespace App\Repositories\Auth;

use App\Models\User;
use App\Validators\ValidasiValidator;

class RegisterRepository
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
}
