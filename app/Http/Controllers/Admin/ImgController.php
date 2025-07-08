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
        $imgs = Img::latest()->paginate(8); // 8 per halaman

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
    public function showTimeline()
{
    $imgs = Img::orderBy('tanggal')->get(); // Urutkan berdasarkan waktu

    return view('pages.public.timeline', compact('imgs'));
}

public function showGallery()
{
    $imgs = Img::latest()->get();
    $categories = $imgs->pluck('tag')->unique()->values();

    $formattedImgs = $imgs->map(function ($img) {
        return [
            'id' => $img->id,
            'name' => $img->name,
            'tanggal' => \Carbon\Carbon::parse($img->tanggal)->translatedFormat('d F Y'),
            'tag' => $img->tag,
            'path' => asset('storage/' . $img->path),
        ];
    });

    return view('pages.gallery.index', compact('imgs', 'formattedImgs', 'categories'));
}



}
