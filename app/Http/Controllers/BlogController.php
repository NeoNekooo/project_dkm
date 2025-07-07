<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->where('is_published', true)->get();
        return view('pages.user.blog', compact('posts'));
    }
}
