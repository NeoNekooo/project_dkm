<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amalan;
use Illuminate\Http\Request;

class AmalanController extends Controller
{

    public function index()
    {
       
        $amalans = Amalan::orderBy('kategori')->orderBy('urutan')->get();
        return view('pages.admin.amalans.index', compact('amalans'));
    }

 
    public function create()
    {
        $kategoris = ['Harian', 'Mingguan', 'Khusus']; // Kategori yang tersedia
        return view('pages.admin.amalans.create', compact('kategoris'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|in:Harian,Mingguan,Khusus', 
            'nama_amalan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'waktu' => 'nullable|string|max:255',
            'urutan' => 'nullable|integer',
        ]);

        Amalan::create($request->all());

        return redirect()->route('admin.amalans.index')->with('success', 'Amalan berhasil ditambahkan!');
    }


    public function show(Amalan $amalan)
    {

        return redirect()->route('admin.amalans.index');
    }


    public function edit(Amalan $amalan)
    {
        $kategoris = ['Harian', 'Mingguan', 'Khusus'];
        return view('pages.admin.amalans.edit', compact('amalan', 'kategoris'));
    }


    public function update(Request $request, Amalan $amalan)
    {
        $request->validate([
            'kategori' => 'required|string|in:Harian,Mingguan,Khusus',
            'nama_amalan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'waktu' => 'nullable|string|max:255',
            'urutan' => 'nullable|integer',
        ]);

        $amalan->update($request->all());

        return redirect()->route('admin.amalans.index')->with('success', 'Amalan berhasil diperbarui!');
    }


    public function destroy(Amalan $amalan)
    {
        $amalan->delete();

        return redirect()->route('admin.amalans.index')->with('success', 'Amalan berhasil dihapus!');
    }
}