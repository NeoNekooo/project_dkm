<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amalan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori',
        'nama_amalan',
        'deskripsi',
        'waktu',
        'urutan',
    ];


}