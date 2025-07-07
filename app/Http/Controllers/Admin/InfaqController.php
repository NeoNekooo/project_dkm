<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Infaq;
use Illuminate\Http\Request;

class InfaqController extends Controller
{
    public function index()
    {
        $infaq = Infaq::first();
        return view('pages.admin.infaq.index', compact('infaq'));
    }

    public function update(Request $request)
    {
        $infaq = Infaq::first();

        $data = $request->validate([
            'headline' => 'required|string|max:255',
            'description' => 'required|string',
            'nomer_rekening' => 'nullable|string|max:50',
            'nama_rekening' => 'nullable|string|max:100',
            'picture' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('picture')) {
            $data['picture'] = $request->file('picture')->store('infaq', 'public');
        }

        $infaq->update($data);

        return redirect()->route('admin.infaq.index')->with('success', 'Data Infaq berhasil diperbarui.');
    }
}

