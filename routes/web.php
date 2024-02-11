<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Profile\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\QuizController;

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
        Route::get('/laporan', [DashboardController::class, 'laporan'])->name('dashboard.laporan');
    });
});

// route untuk authentikasi login register
Route::middleware(['guest'])->group(function () {
    Route::prefix('auth')->group(function () {
        Route::get('/login', [LoginController::class, 'login'])->name('login');
        Route::get('/register', [RegisterController::class, 'register'])->name('register');
        Route::post('/register', [RegisterController::class, 'store'])->name('auth.register');
        Route::post('/login', [LoginController::class, 'process_login'])->name('auth.login');

        // register dengan akun github
        Route::get('/github/redirect', [SocialiteController::class, 'redirect_socialite_github']);

        Route::get('/github/callback', [SocialiteController::class, 'callback_socialite_github']);

        // forgot-password route
        Route::get('/forgot-password', [ResetPasswordController::class, 'request_reset'])->name('password.request');
        Route::post('/forgot-password', [ResetPasswordController::class, 'send_reset_link'])->name('password.email');
        Route::get('/reset-password/{token}', [ResetPasswordController::class, 'reset_password'])->name('password.reset');
        Route::post('/reset-password', [ResetPasswordController::class, 'update_password'])->name('password.update');
    });
});

// route untuk button dari email verifikasi
Route::get('/email/verify/{id}/{hash}', [RegisterController::class, 'verify_email'])->middleware(['auth', 'signed'])->name('verification.verify');

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
        // profile
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::put('/profile/{id}', [ProfileController::class, 'update_profile'])->name('profile.update');
        // logout
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
        // crud kuis
        Route::resource('/quiz', QuizController::class);
    });
});
