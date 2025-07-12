<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactMessageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:100',
            'last_name' => 'nullable|max:100',
            'email' => 'required|email',
            'message' => 'required|max:1000',
        ]);

        ContactMessage::create($request->only([
            'first_name', 'last_name', 'email', 'message'
        ]));

        return back()->with('success', 'Pesan Anda telah dikirim');
    }
}
