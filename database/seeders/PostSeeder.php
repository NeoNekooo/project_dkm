<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        // Make sure there's a user to attach to (author)
        $user = User::first() ?? User::factory()->create();

        // Create example blog posts
        Post::create([
            'title' => 'Selamat Datang di Website Masjid',
            'slug' => Str::slug('Selamat Datang di Website Masjid'),
            'excerpt' => 'Sebuah artikel pembuka mengenai website masjid dan informasi yang tersedia.',
            'body' => '<p>Ini adalah artikel blog pertama kami yang menjelaskan tentang layanan dan informasi yang tersedia di website masjid ini.</p>',
            'thumbnail' => 'default.jpg', // make sure the image exists in storage
            'user_id' => $user->id,
            'published_at' => now(),
            'is_published' => true,
        ]);

    }
}
