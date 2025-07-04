<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TentangKami;
use Illuminate\Http\Request;

class TentangKamiController extends Controller
{
    public function index()
    {
        $tentang = TentangKami::first();
        return view('pages.admin.tentang.index', compact('tentang'));
    }

    public function update(Request $request)
    {
        $tentang = TentangKami::first();

        $data = $request->validate([
            'isi' => 'required',
            'nama_ketua' => 'nullable|string|max:255',
            'foto_masjid' => 'nullable|image|max:2048',
            'foto_ketua' => 'nullable|image|max:2048',
            'sejarah_ketua' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('foto_masjid')) {
            $data['foto_masjid'] = $request->file('foto_masjid')->store('tentang', 'public');
        }

        if ($request->hasFile('foto_ketua')) {
            $data['foto_ketua'] = $request->file('foto_ketua')->store('tentang', 'public');
        }

        $tentang->update($data);

        return redirect()->route('admin.tentang.index')->with('success', 'Data Tentang Kami berhasil diperbarui.');
    }
}

