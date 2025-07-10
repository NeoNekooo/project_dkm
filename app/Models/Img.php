<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Img extends Model
{
    protected $fillable = ['name', 'tanggal', 'tag', 'path'];

    /**
     * Automatically delete the image file when model is deleted
     */
    protected static function booted()
    {
        static::deleted(function ($img) {
            Storage::disk('public')->delete($img->path);
        });
    }

    public function getImageUrlAttribute()
    {
        return asset('storage/'.$this->path);
    }

    /**
     * Get images by tag (query scope)
     */
    public function scopeTagged($query, $tag)
    {
        return $query->where('tag', $tag);
    }
}
