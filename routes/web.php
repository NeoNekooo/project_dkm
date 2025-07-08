<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\DkmProfilController;
use App\Http\Controllers\Admin\TentangKamiController;
use App\Http\Controllers\Admin\KontakController;
use App\Http\Controllers\Admin\InfaqController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ImgController;
use App\Http\Controllers\BlogController;


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


Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.detail');

Route::get('/kontak', function () {
    return view('pages.user.kontak');
})->name('kontak');

Route::get('/pengumuman', function () {
    return view('pages.user.pengumuman');
})->name('pengumuman');

Route::get('/gallery', function () {
    return view('pages.user.gallery');
})->name('gallery');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/profil', [DkmProfilController::class, 'index'])->name('admin.profil.index');
    Route::put('/admin/profil', [DkmProfilController::class, 'update'])->name('admin.profil.update');
    Route::get('/admin/kontak', [KontakController::class, 'index'])->name('admin.kontak.index');
    Route::put('/admin/kontak/update', [KontakController::class, 'update'])->name('admin.kontak.update');
    Route::get('/admin/tentang-kami', [TentangKamiController::class, 'index'])->name('admin.tentang.index');
    Route::put('/admin/tentang-kami/update', [TentangKamiController::class, 'update'])->name('admin.tentang.update');
    Route::get('/admin/infaq', [InfaqController::class, 'index'])->name('admin.infaq.index');
    Route::put('/admin/infaq/update', [InfaqController::class, 'update'])->name('admin.infaq.update');
    Route::resource('/admin/blog', PostController::class)->names('admin.post');
    Route::resource('/admin/gallery', ImgController::class)->names('admin.gallery');





});

   Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');
