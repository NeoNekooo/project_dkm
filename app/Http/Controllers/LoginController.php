<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    /**
     * Tampilkan halaman login.
     */
    public function formLogin()
    {
        return view('layouts.admin.auth');
    }

    /**
     * Proses login user.
     */
    public function loginAction(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'name' => 'required|string|max:20',
            'password' => 'required|string',
        ]);

        // Cek apakah 'remember me' dicentang
        $remember = $request->boolean('remember');

        // Coba login dengan kredensial
        if (Auth::attempt($credentials, $remember)) {
            // Regenerasi session untuk keamanan
            $request->session()->regenerate();

            $user = Auth::user();

            // Catat login ke log sistem
            Log::info("User {$user->name} logged in at " . now());

            // Redirect berdasarkan role
            if ($user->role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            } else {
                return redirect()->intended('/');
            }
        }

        // Jika gagal login
        return back()->withErrors([
            'name' => 'Username atau password salah.',
        ])->withInput(); // kembalikan isian lama
    }
}
