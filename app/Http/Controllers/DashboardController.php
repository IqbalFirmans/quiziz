<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';

        return view('admin.dashboard', compact('title'));
    }

    public function laporan()
    {
        $title = 'Laporan';
        return view('admin.tables', compact('title'));
    }
}
