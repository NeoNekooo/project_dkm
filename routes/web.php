<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;


Route::get('/', [LoginController::class, 'formLogin']);
Route::post('/login', [LoginController::class, 'loginAction'])->name('login.action');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

