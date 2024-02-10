<?php

namespace App\Http\Controllers\Profile;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('user.profile');
    }

    public function update_profile($id, Request $request)
    {
        // dd($request->all());
        // validasi
        $request->validate([
            'name' => 'required|min:2',
            'photo' => 'required|mimes:png,jpg,jpeg|max:20048'
        ]);

        // mengambil data user yang mau di edit profilenya ke dalam variabel user
        $user = User::findOrFail($id);

        // mengecek apakah ada request file
        if ($request->hasFile('photo')) {

            // mengecek apakah data photo ada atau tidak
            if ($user->photo != null) {
                // jika user memiliki photo maka photo yang sebelumnya dihapus
                # code...
                Storage::delete($user->photo);
            }
            // mengupload gambar baru dan mengganti isi dari photo dengan direktori gambar yang baru
            $user->photo = $request->file('photo')->store('profile', 'public');
        }

        // mengedit data name dan biodata dengan request
        $user->name = $request->name;
        $user->biodata = $request->biodata;

        // untuk menyimpan perubahan
        $user->save();

        return redirect()->back()->with('success', 'Berhasil Update Profile');
    }
}
