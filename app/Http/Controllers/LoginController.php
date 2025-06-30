<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function formLogin()
    {
        return view('layout.auth');
    }

    public function loginAction(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string|max:20',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            logger('User setelah login:', ['user' => $user]);

            // Tambahkan logika redirect berdasarkan role di sini
            return redirect()->intended('/dashboard');
        }

        // jika gagal login
        return redirect('/')->withErrors([
            'name' => 'Username atau password salah.',
        ]);
    }
}
