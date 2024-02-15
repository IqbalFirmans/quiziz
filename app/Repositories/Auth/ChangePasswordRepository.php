<?php

namespace App\Repositories\Auth;

use App\Contracts\Basic\UpdateInterface;
use App\Models\User;
use App\Validators\ValidasiValidator;
use Illuminate\Support\Facades\Hash;

class ChangePasswordRepository implements UpdateInterface
{
    public $validasi;
    public function __construct(ValidasiValidator $validasi)
    {
        $this->validasi = $validasi;
    }
    public function update($id, $data)
    {
        $rules = [
            'old_password' => 'required|min:8',
            'new_password' => 'required|min:8|different:old_password',
            'confirm_password' => 'required|min:8|same:new_password'
        ];
        $this->validasi->validate($data, $rules);
        return  User::find(auth()->user()->id)->update([
            'password' => Hash::make($data['new_password'])
        ]);
    }

}
