<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembangunan;
use Illuminate\Support\Facades\Storage;

class PembangunanController extends Controller
{
    public function index()
    {
        $pembangunans = Pembangunan::orderBy('urutan')->get();
        return view('pages.admin.pembangunan.index', compact('pembangunans'));
    }

    public function create()
    {
        return view('pages.admin.pembangunan.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required',
            'tanggal' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|max:2048',
            'urutan' => 'nullable|integer'
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('pembangunan', 'public');
        }

        Pembangunan::create($data);

        return redirect()->route('admin.pembangunan.index')->with('success', 'Tahapan berhasil ditambahkan.');
    }

    public function edit(Pembangunan $pembangunan)
    {
        return view('pages.admin.pembangunan.edit', compact('pembangunan'));
    }

    public function update(Request $request, Pembangunan $pembangunan)
    {
        $data = $request->validate([
            'judul' => 'required',
            'tanggal' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|max:2048',
            'urutan' => 'nullable|integer'
        ]);

        if ($request->hasFile('gambar')) {
            if ($pembangunan->gambar) {
                Storage::disk('public')->delete($pembangunan->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('pembangunan', 'public');
        }

        $pembangunan->update($data);

        return redirect()->route('admin.pembangunan.index')->with('success', 'Tahapan berhasil diperbarui.');
    }

    public function destroy(Pembangunan $pembangunan)
    {
        if ($pembangunan->gambar) {
            Storage::disk('public')->delete($pembangunan->gambar);
        }

        $pembangunan->delete();
        return redirect()->route('admin.pembangunan.index')->with('success', 'Tahapan berhasil dihapus.');
    }
}
