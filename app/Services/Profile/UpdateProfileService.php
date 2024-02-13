<?php

namespace App\Services\Profile;

use App\Models\User;
use App\Repositories\Profile\UpdateProfileRepository;
use App\Validators\ValidasiValidator;

class UpdateProfileService
{
    public $update, $validasi;
    public function __construct(UpdateProfileRepository $update, ValidasiValidator $validasi)
    {
        $this->update = $update;
        $this->validasi = $validasi;
    }
    public function update_profile($user, $id ,$data, $request)
    {
        $rules = [
            'name' => 'required|min:2',
            'photo' => 'mimes:png,jpg,jpeg|max:2048'
        ];
        $this->validasi->validate($data, $rules);
        if ($request->hasFile('photo') != null) {

            // mengecek apakah data photo ada atau tidak
            if ($user->photo != null) {
                // jika user memiliki photo maka photo yang sebelumnya dihapus
                # code...
                $this->update->destroy_file($user->photo);
            }
            // update data dan mengupload gambar baru dan mengganti isi dari photo dengan direktori gambar yang baru
            $this->update->update_withFile($id, $data);
        } else {
            $this->update->update($id, $data);
        }
    }
}
