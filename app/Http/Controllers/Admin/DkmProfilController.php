<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DkmProfil;
use App\Models\kontak;
use Illuminate\Http\Request;

class DkmProfilController extends Controller
{
    public function index()
    {
        $profil = DkmProfil::with('kontak')->first();
        return view('pages.admin.profil.index', compact('profil'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $profil = DkmProfil::with('kontak')->first();

        $profil->update([
            'nama' => $request->nama,
            'visi' => $request->visi,
            'tentang_kami' => $request->tentang_kami,
            'logo' => $request->hasFile('logo') ? $request->file('logo')->store('logo', 'public') : $profil->logo,
            'background' => $request->hasFile('background') ? $request->file('background')->store('background', 'public') : $profil->background,
        ]);

        if ($profil->kontak && $request->map) {
            $profil->kontak->map = $request->map;
            $profil->kontak->save();
        }

        return redirect()->route('admin.profil.index')->with('success', 'Profil berhasil diperbarui');
    }
}
