<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'thumbnail',
        'kategori',
        'user_id',
        'published_at',
        'is_published',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function images()
    {
        return $this->hasMany(PostImage::class);
    }

    protected $casts = [
        'kategori' => 'array',
    ];

    // Optional: Scope untuk post yang sudah dipublish
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
