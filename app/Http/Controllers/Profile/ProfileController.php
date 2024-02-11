<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Profile\UpdateProfileService;

class ProfileController extends Controller
{
    public $update;
    public function __construct(UpdateProfileService $update)
    {
        $this->update = $update;
    }
    public function index()
    {
        return view('user.profile');
    }

    public function update_profile($id, Request $request)
    {
        $this->update->update_profile(User::find($id),$id, $request->all(), $request);
        return redirect()->back()->with('success', 'Berhasil Update Profile');
    }
}
