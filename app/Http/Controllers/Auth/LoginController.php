<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Auth\LoginService;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public $login;
    public function __construct(LoginService $login)
    {
        $this->login = $login;
    }
    public function login()
    {
        return view('auth.login');
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
