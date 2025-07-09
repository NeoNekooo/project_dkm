<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_published', true)->latest()->paginate(8);
        return view('pages.user.blog', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)
                    ->where('is_published', true)
                    ->firstOrFail();

        $recommendedPosts = Post::where('id', '!=', $post->id)
                                ->where('is_published', true)
                                ->inRandomOrder()
                                ->limit(3)
                                ->get();

        return view('pages.user.show-blog', compact('post', 'recommendedPosts'));
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post->thumbnail) {
            Storage::delete('public/' . $post->thumbnail);
        }

        $post->delete();

        return redirect()->route('blog.index')->with('success', 'Postingan blog berhasil dihapus!');
    }
}