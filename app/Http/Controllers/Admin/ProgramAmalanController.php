<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgramAmalan;
use Illuminate\Http\Request;

class ProgramAmalanController extends Controller
{
    public function index()
    {
        $programs = ProgramAmalan::all()->groupBy('kategori');
        return view('admin.program.index', compact('programs'));
    }

    public function create()
    {
        return view('admin.program.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'deskripsi' => 'required',
        ]);

        ProgramAmalan::create($request->all());

        return redirect()->route('admin.program.index')->with('success', 'Program ditambahkan');
    }

    public function edit(ProgramAmalan $program)
    {
        return view('admin.program.edit', compact('program'));
    }

    public function update(Request $request, ProgramAmalan $program)
    {
        $request->validate([
            'kategori' => 'required',
            'deskripsi' => 'required',
        ]);

        $program->update($request->all());

        return redirect()->route('admin.program.index')->with('success', 'Program diperbarui');
    }

    public function destroy(ProgramAmalan $program)
    {
        $program->delete();

        return redirect()->route('admin.program.index')->with('success', 'Program dihapus');
    }
}
