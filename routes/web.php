<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\AdminDashboardController;


Route::get('/login', [LoginController::class, 'formLogin']);
Route::post('/login', [LoginController::class, 'loginAction'])->name('login.action');

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
