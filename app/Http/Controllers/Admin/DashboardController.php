<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';

        $users_active = User::where('role', 'user')->count();
        // waktu
        $month_now = Carbon::now()->format('m');
        $year_now = Carbon::now()->format('Y');
        $time_now = Carbon::now()->format('d-m-Y H:i:s');
        $now = Carbon::now()->format('d-m-Y');
        // array data user yang registrasi
        $users = [];
        for ($i = 1; $i <= 12; $i++) {
            $users[] = User::whereMonth('created_at', $i)->whereYear('created_at', $year_now)->where('role', 'user')->count();
        }
        $new_users_inMonth = User::whereMonth('created_at', $month_now)->whereYear('created_at', $year_now)->where('role', 'user')->count();
        return view('admin.dashboard', compact('title', 'users_active', 'new_users_inMonth', 'month_now', 'year_now', 'time_now', 'now', 'users'));
    }

    public function laporan()
    {
        $title = 'Laporan';
        return view('admin.tables', compact('title'));
    }
}
