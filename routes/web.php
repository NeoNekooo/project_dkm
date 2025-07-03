<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\AdminDashboardController;


Route::get('/login', [LoginController::class, 'formLogin']);
Route::post('/login', [LoginController::class, 'loginAction'])->name('login.action');

Route::get('/', function () {
    return view('pages.user.home');
});

Route::get('/tentang-kami', function () {
    return view('pages.user.tentang-kami');
})->name('tentang');

Route::get('/program', function () {
    return view('pages.user.program');
})->name('program');

Route::get('/infaq', function () {
    return view('pages.user.infaq');
})->name('infaq');

Route::get('/event-mesjid', function () {
    return view('pages.user.event-mesjid');
})->name('event-mesjid');

Route::get('/blog', function () {
    return view('pages.user.blog');
})->name('blog');

Route::get('/kontak', function () {
    return view('pages.user.kontak');
})->name('kontak');

Route::get('/pengumuman', function () {
    return view('pages.user.pengumuman');
})->name('pengumuman');


Route::middleware('auth')->get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
