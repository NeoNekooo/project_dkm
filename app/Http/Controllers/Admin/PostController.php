<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->take(8)->get();
        return view('pages.admin.post.index', compact('posts'));
    }

    public function create()
    {
        return view('pages.admin.post.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'excerpt' => 'required|string',
            'body' => 'required|string',
            'thumbnail' => 'nullable|image|max:2048',
            'images.*' => 'nullable|image|max:2048',
            'published_at' => 'nullable|date',
            'is_published' => 'nullable|boolean',
        ]);

        $data['slug'] = $data['slug'] ?? Str::slug($data['title']);
        $data['is_published'] = $request->has('is_published');
        $data['user_id'] = auth()->id(); // Optional, assign current user

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $post = Post::create($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('post', 'public');
                PostImage::create([
                    'post_id' => $post->id,
                    'path' => $path,
                ]);
            }
        }

        return redirect()->route('admin.post.index')->with('success', 'Post berhasil dibuat.');
    }


    public function edit(Post $post)
    {
        return view('pages.admin.post.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'thumbnail' => 'nullable|image|max:2048',
            'images.*' => 'nullable|image|max:2048',
        ]);

        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('thumbnail')) {
            if ($post->thumbnail) {
                Storage::disk('public')->delete($post->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $post->update($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('post', 'public');
                PostImage::create([
                    'post_id' => $post->id,
                    'path' => $path,
                ]);
            }
        }

        return redirect()->route('admin.post.index')->with('success', 'Post berhasil diperbarui.');
    }

    public function destroy(Post $post)
    {
        // Delete thumbnail
        if ($post->thumbnail) {
            Storage::disk('public')->delete($post->thumbnail);
        }

        foreach ($post->images as $img) {
            Storage::disk('public')->delete($img->path);
            $img->delete();
        }

        $post->delete();

        return redirect()->route('admin.post.index')->with('success', 'Post berhasil dihapus.');
    }

    public function deleteImage($id)
    {
        $image = PostImage::findOrFail($id);
        Storage::disk('public')->delete($image->path);
        $image->delete();

        return back()->with('success', 'Gambar berhasil dihapus.');
    }
}
