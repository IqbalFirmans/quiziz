<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Auth\ChangePasswordService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public $change_password;
    public function __construct(ChangePasswordService $change_password)
    {
        $this->change_password = $change_password;
    }
    public function change_password()
    {
        return view('auth.change-password');
    }

    public function password_update(Request $request)
    {
        $process = $this->change_password->change_pass(auth()->user()->id, $request->all());
        if ($process == false) {
            return redirect()->back()->withErrors('Password lama yang anda masukan salah!');
        }
        return redirect()->route('profile')->with('success', 'Password Berhasil Diubah!');
    }
}
