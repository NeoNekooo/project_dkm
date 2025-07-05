<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function formLogin()
    {
        return view('layouts.admin.auth');
    }

    public function loginAction(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string|max:20',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            } else {
                return redirect()->intended('/');
            }
        }


        return redirect('/')->withErrors([
            'name' => 'Username atau password salah.',
        ]);
    }
}
