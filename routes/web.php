<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/user/home');
});

// route untuk bagian admin
Route::middleware(['role:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::get('/tables', [DashboardController::class, 'tables'])->name('dashboard.tables');
    });
});

// route untuk authentikasi login register
Route::middleware(['guest'])->group(function () {
    Route::prefix('auth')->group(function () {
        Route::get('/login', [AuthController::class, 'login'])->name('login');
        Route::get('/register', [AuthController::class, 'register'])->name('register');
        Route::post('/register', [AuthController::class, 'store'])->name('auth.register');
        Route::post('/login', [AuthController::class, 'process_login'])->name('auth.login');

        // register dengan akun github
        Route::get('/github/redirect', [AuthController::class, 'redirect_socialite_github']);

        Route::get('/github/callback', [AuthController::class, 'callback_socialite_github']);

        // forgot-password route
        Route::get('/forgot-password', [AuthController::class, 'request_reset'])->name('password.request');
        Route::post('/forgot-password', [AuthController::class, 'send_reset_link'])->name('password.email');
        Route::get('/reset-password/{token}', [AuthController::class, 'reset_password'])->name('password.reset');
        Route::post('/reset-password', [AuthController::class, 'update_password'])->name('password.update');
    });
});

// route untuk button dari email verifikasi
Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verify_email'])->middleware(['auth', 'signed'])->name('verification.verify');

// route untuk memberi tahu user untuk cek email setelah registrasi
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// route untuk user
Route::prefix('user')->group(function () {
    Route::get('/home', function () {
        return view('user.home');
    })->name('home');
    Route::get('/share', function () {
        return view('user.share');
    })->name('share');
    // route untuk user yang sudah login
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/profile', function () {
            return view('user.profile');
        })->name('profile');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});
