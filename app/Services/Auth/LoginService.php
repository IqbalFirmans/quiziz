<?php

namespace App\Services\Auth;

use App\Contracts\Auth\LoginInterface;
use App\Validators\ValidasiValidator;
use Illuminate\Support\Facades\Auth;

class LoginService implements LoginInterface
{
    public $validasi;
    public function __construct(ValidasiValidator $validasi)
    {
        $this->validasi = $validasi;
    }
    public function login($request) {
        $rules = [
            'NameOrEmail' => 'required',
            'password' => 'required|min:8'
        ];
        $this->validasi->validate($request, $rules);
        if (filter_var($request['NameOrEmail'], FILTER_VALIDATE_EMAIL)) {
            # code...
            $credentials = [
                'email' => $request['NameOrEmail'],
                'password' => $request['password']
            ];
        } else {
            # code...
            $credentials = [
                'name' => $request['NameOrEmail'],
                'password' => $request['password']
            ];
        }
        return Auth::attempt($credentials);
    }
}
