<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Img;
use Illuminate\Support\Facades\Storage;

class ImgController extends Controller
{
    public function index()
    {
        $imgs = Img::latest()->get();
        return view('pages.admin.gallery.index', compact('imgs'));
    }

    public function create()
    {
        return view('pages.admin.gallery.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'tag' => 'required|string|max:100',
            'image' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['path'] = $request->file('image')->store('gallery', 'public');
        }

        Img::create($data);

        return redirect()->route('admin.gallery.index')->with('success', 'Gambar berhasil ditambahkan.');
    }

    public function destroy(Img $img)
    {
        Storage::disk('public')->delete($img->path);
        $img->delete();
        return back()->with('success', 'Gambar berhasil dihapus.');
    }
}
