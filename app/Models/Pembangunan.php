<?php

// app/Models/Pembangunan.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembangunan extends Model
{
    protected $fillable = ['judul', 'tanggal', 'deskripsi', 'gambar', 'urutan'];
}

