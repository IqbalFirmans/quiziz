<?php

namespace App\Repositories\Profile;

use App\Contracts\Store\UpdateInterface;
use App\Contracts\Store\UpdateWithFileInterface;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UpdateProfileRepository implements UpdateInterface, UpdateWithFileInterface
{
    public function __construct()
    {
        //
    }
    public function update($id, $data)
    {
        $user = User::findOrFail($id);
        return $user->update([
            'name' => $data['name'],
            'biodata' => $data['biodata']
        ]);
    }
    public function update_withFile($id, $data)
    {
        $user = User::findOrFail($id);
        return $user->update([
            'name' => $data['name'],
            'photo' => $this->store_file($data['photo'], 'profile', 'public'),
            'biodata' => $data['biodata']
        ]);
    }
    public function destroy_file($path)
    {
        return Storage::delete($path);
    }
    public function store_file($file, $path, $option)
    {
        return $file->store($path, $option);
    }
}
