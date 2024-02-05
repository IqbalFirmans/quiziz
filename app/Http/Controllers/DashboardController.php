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

    public function tables()
    {
        $title = 'Tables';
        return view('admin.tables', compact('title'));
    }
}
