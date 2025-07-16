<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\DkmProfilController;
use App\Http\Controllers\Admin\TentangKamiController;
use App\Http\Controllers\Admin\OrganigramController;
use App\Http\Controllers\Admin\KontakController;
use App\Http\Controllers\Admin\InfaqController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ImgController;
use App\Http\Controllers\Admin\KegiatanController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\ProgramRamadhanController;
use App\Http\Controllers\Admin\AmalanController;
use App\Http\Controllers\AmalanUserController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\PembangunanController;

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

Route::get('/organigram', function () {
    return view('pages.user.organigram');
})->name('organigram');

Route::get('/event-mesjid', function () {
    return view('pages.user.event-mesjid');
})->name('event-mesjid');

Route::get('/amalan', [AmalanUserController::class, 'index'])->name('user.amalan.index');

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.detail');

Route::get('/kontak', function () {
    return view('pages.user.kontak');
})->name('kontak');
Route::post('/kontak/kirim', [ContactMessageController::class, 'store'])->name('kontak.kirim');

Route::get('/pengumuman', function () {
    return view('pages.user.pengumuman');
})->name('pengumuman');

Route::get('/gallery', [ImgController::class, 'showGallery'])->name('gallery');

Route::get('/sejarah-pembangunan', [ImgController::class, 'showTimeline'])->name('timeline');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::get('/profil', [DkmProfilController::class, 'index'])->name('profil.index');
    Route::put('/profil', [DkmProfilController::class, 'update'])->name('profil.update');

    Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');
    Route::put('/kontak/update', [KontakController::class, 'update'])->name('kontak.update');

    Route::get('/organigram', [OrganigramController::class, 'edit'])->name('organigram.edit');
    Route::put('/organigram/update', [OrganigramController::class, 'update'])->name('organigram.update');


    Route::get('/tentang-kami', [TentangKamiController::class, 'index'])->name('tentang.index');
    Route::put('/tentang-kami/update', [TentangKamiController::class, 'update'])->name('tentang.update');

    Route::get('/infaq', [InfaqController::class, 'index'])->name('infaq.index');
    Route::put('/infaq/update', [InfaqController::class, 'update'])->name('infaq.update');

    Route::resource('blog', PostController::class)
        ->names('post')
        ->parameters(['blog' => 'post']);

    Route::prefix('gallery')->name('gallery.')->group(function () {
        Route::get('/', [ImgController::class, 'index'])->name('index');
        Route::get('/create', [ImgController::class, 'create'])->name('create');
        Route::post('/', [ImgController::class, 'store'])->name('store');
        Route::get('/{img}/edit', [ImgController::class, 'edit'])->name('edit');
        Route::put('/{img}', [ImgController::class, 'update'])->name('update');
        Route::delete('/{img}', [ImgController::class, 'destroy'])->name('destroy');
    });

    Route::resource('program', ProgramController::class)->names('program');

    Route::resource('kegiatan', KegiatanController::class)->names('kegiatan');
    Route::patch('/kegiatan/{kegiatan}/toggle', [KegiatanController::class, 'toggleStatus'])->name('kegiatan.toggle');

    Route::resource('pembangunan', PembangunanController::class)->names('pembangunan');

    Route::get('/settings', [SettingsController::class, 'edit'])->name('settings.edit');
    Route::patch('/settings', [SettingsController::class, 'update'])->name('settings.update');

    Route::get('/amalans', [AmalanController::class, 'index'])->name('amalans.index');
    Route::get('/amalans/create', [AmalanController::class, 'create'])->name('amalans.create');
    Route::post('/amalans', [AmalanController::class, 'store'])->name('amalans.store');
    Route::get('/amalans/{amalan}', [AmalanController::class, 'show'])->name('amalans.show');
    Route::get('/amalans/{amalan}/edit', [AmalanController::class, 'edit'])->name('amalans.edit');
    Route::put('/amalans/{amalan}', [AmalanController::class, 'update'])->name('amalans.update');
    Route::delete('/amalans/{amalan}', [AmalanController::class, 'destroy'])->name('amalans.destroy');


});

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login')->with('success', 'Anda telah keluar.');
})->name('logout');
