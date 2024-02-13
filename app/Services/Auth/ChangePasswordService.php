<?php

namespace App\Services\Auth;

use App\Repositories\Auth\ChangePasswordRepository;
use Illuminate\Support\Facades\Hash;

class ChangePasswordService
{
    public $change;
    public function __construct(ChangePasswordRepository $change)
    {
        $this->change = $change;
    }
    public function change_pass($id, $data)
    {
        // mengecek apakah password lama sesuai dengan yang diinputkan user
        if (Hash::check($data['old_password'], auth()->user()->password)) {
            return $this->change->update($id, $data);
        } else {
            return false;
        }
    }
}
