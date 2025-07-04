<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $kontak = Kontak::first();
        return view('pages.admin.kontak.index', compact('kontak'));
    }

    public function update(Request $request)
    {
        $kontak = Kontak::first();

        $kontak->update([
            'nomer1' => $request->nomer1,
            'nomer2' => $request->nomer2,
            'email'   => $request->email,
            'alamat'  => $request->alamat,
            'map'     => $request->map,
        ]);

        return redirect()->route('admin.kontak.index')->with('success', 'Kontak berhasil diperbarui');
    }
}
