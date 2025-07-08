<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_published', true)->latest()->paginate(8);
        return view('pages.user.blog', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->where('is_published', true)->firstOrFail();
        return view('pages.user.show-blog', compact('post'));
    }
}
