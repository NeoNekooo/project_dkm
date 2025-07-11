<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::latest()->get();
        return view('pages.admin.kegiatan.index', compact('kegiatans'));
    }

    public function create()
    {
        return view('pages.admin.kegiatan.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul'   => 'required|string|max:255',
            'isi'     => 'required|string',
            'lokasi'  => 'required|string|max:255',
            'tanggal' => 'nullable|date',
            'status'  => 'boolean',
        ]);

        Kegiatan::create($data);

        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function edit(Kegiatan $kegiatan)
    {
        return view('pages.admin.kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
        $data = $request->validate([
            'judul'   => 'required|string|max:255',
            'isi'     => 'required|string',
            'lokasi'  => 'required|string|max:255',
            'tanggal' => 'nullable|date',
            'status'  => 'boolean',
        ]);

        $kegiatan->update($data);

        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function toggleStatus(Kegiatan $kegiatan)
    {
        $kegiatan->status = !$kegiatan->status;
        $kegiatan->save();

        return redirect()->back()->with('success', 'Status kegiatan berhasil diperbarui.');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();
        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan berhasil dihapus.');
    }

    public function showKegiatan()
    {
        $kegiatans = Kegiatan::where('status', true)
            ->whereDate('tanggal', '>=', now())
            ->orderBy('tanggal')
            ->get();

        return view('pages.admin.kegiatan', compact('kegiatans'));
    }
}
