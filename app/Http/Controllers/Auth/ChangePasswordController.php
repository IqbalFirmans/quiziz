<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function change_password()
    {
        return view('auth.change-password');
    }

    public function password_update(Request $request)
    {
        $request->validate([
            'old_password' => 'required|min:8',
            'new_password' => 'required|min:8|different:old_password',
            'confirm_password' => 'required|min:8|same:new_password'
        ]);

        // mengecek apakah password lama sesuai dengan yang diinputkan user
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with('error', 'Password yang Anda masukan tidak sesuai');
        }

        // menemukan user yang sedang terautentikasi, kemudian mengupdate password lama yang ada di database dengan password baru dari inputan user yang telah di hash/terenkripsi
        User::find(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        // auth()->user()->update([
        //     'password' => Hash::make($request->new_password)
        // ]);

        return redirect()->route('profile')->with('success', 'Password Berhasil Diubah!');
    }
}
