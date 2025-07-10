<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        return view('pages.admin.program.index', compact('programs'));
    }

    public function create()
    {
        return view('pages.admin.program.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
            'icon' => 'required|string',
        ]);

        $colors = [
            'bg-yellow-100 text-yellow-700 border-yellow-200',
            'bg-green-100 text-green-700 border-green-200',
            'bg-blue-100 text-blue-700 border-blue-200',
            'bg-purple-100 text-purple-700 border-purple-200',
            'bg-emerald-100 text-emerald-700 border-emerald-200',
            'bg-orange-100 text-orange-700 border-orange-200',
        ];

        $data['color'] = $colors[array_rand($colors)];

        Program::create($data);

        return redirect()->route('admin.program.index')->with('success', 'Program berhasil ditambahkan.');
    }


    public function edit(Program $program)
    {
        return view('pages.admin.program.edit', compact('program'));
    }

    public function update(Request $request, Program $program)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
            'icon' => 'required|string',
        ]);

        $program->update($data);

        return redirect()->route('admin.program.index')->with('success', 'Program berhasil diperbarui.');
    }


    public function destroy(Program $program)
    {
        $program->delete();
        return redirect()->route('admin.program.index')->with('success', 'Program berhasil dihapus.');
    }
}
