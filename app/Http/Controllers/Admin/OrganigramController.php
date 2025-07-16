<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organigram;
use Illuminate\Support\Facades\Storage;

class OrganigramController extends Controller
{
    public function edit()
    {
        $organigram = Organigram::first();
        return view('pages.admin.organigram.edit', compact('organigram'));
    }

    public function update(Request $request)
    {
        $organigram = Organigram::first();

        if ($request->hasFile('gambar')) {
            if ($organigram->gambar) {
                Storage::delete($organigram->gambar);
            }
            $path = $request->file('gambar')->store('organigram');
            $organigram->update(['gambar' => $path]);
        }

        return redirect()->route('admin.organigram.edit')->with('success', 'Organigram berhasil diperbarui.');
    }

    public function index()
    {
        $organigram = Organigram::first();
        return view('pages.user.organigram', compact('organigram'));
    }
}

