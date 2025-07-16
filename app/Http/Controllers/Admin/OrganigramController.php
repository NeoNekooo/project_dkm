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
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $organigram = Organigram::first();

        if (!$organigram) {
            $organigram = Organigram::create();
        }

        if ($request->hasFile('gambar')) {
            if ($organigram->gambar && Storage::exists($organigram->gambar)) {
                Storage::delete($organigram->gambar);
            }

            $path = $request->file('gambar')->store('organigram', 'public');
            $organigram->update(['gambar' => $path]);
        }

        return redirect()->route('admin.organigram.edit')->with('success', 'Organigram berhasil diperbarui.');
    }

    public function deleteImage()
    {
        $organigram = Organigram::first();

        if ($organigram && $organigram->gambar && Storage::exists($organigram->gambar)) {
            Storage::delete($organigram->gambar);
            $organigram->update(['gambar' => null]);
        }

        return back()->with('success', 'Gambar berhasil dihapus.');
    }

    public function index()
    {
        $organigram = Organigram::first();
        return view('pages.user.organigram', compact('organigram'));
    }
}
