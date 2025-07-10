<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\DkmProfilController;
use App\Http\Controllers\Admin\TentangKamiController;
use App\Http\Controllers\Admin\KontakController;
use App\Http\Controllers\Admin\InfaqController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ImgController;
use App\Http\Controllers\Admin\KegiatanController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


Route::get('/login', [LoginController::class, 'formLogin'])->name('login');
Route::post('/login', [LoginController::class, 'loginAction'])->name('login.action')->middleware('throttle:5,1');

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

Route::get('/gallery', [ImgController::class, 'showGallery'])->name('gallery');

Route::get('/sejarah-pembangunan', [ImgController::class, 'showTimeline'])->name('timeline');

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
    Route::resource('/admin/blog', PostController::class)
    ->names('admin.post')
    ->parameters(['blog' => 'post']);

    Route::prefix('admin/gallery')->name('admin.gallery.')->middleware(['auth'])->group(function () {
        Route::get('/', [ImgController::class, 'index'])->name('index');
        Route::get('/create', [ImgController::class, 'create'])->name('create');
        Route::post('/', [ImgController::class, 'store'])->name('store');
        Route::get('/{img}/edit', [ImgController::class, 'edit'])->name('edit');
        Route::put('/{img}', [ImgController::class, 'update'])->name('update');
        Route::delete('/{img}', [ImgController::class, 'destroy'])->name('destroy');
    });
    Route::resource('/admin/program', ProgramController::class)->names('admin.program');
    Route::resource('/admin/kegiatan', KegiatanController::class);





});

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login')->with('success', 'Anda telah keluar.');
})->name('logout');
