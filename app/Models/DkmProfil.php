<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DkmProfil extends Model
{
    use HasFactory;

    protected $table = 'dkm_profil';

    protected $fillable = [
        'nama',
        'visi',
        'id_tentang',
        'id_kontak',
        'logo',
        'background',
        'luas_tanah',
        'tahun_berdiri',
        'ig',
        'fb',
        'yt',
        'wa',
    ];


    public function kontak()
    {
        return $this->belongsTo(Kontak::class, 'id_kontak');
    }

    public function logo()
    {
        return $this->belongsTo(File::class, 'logo');
    }

    public function background()
    {
        return $this->belongsTo(File::class, 'background');
    }

    public function tentangKami()
    {
    return $this->belongsTo(TentangKami::class, 'id_tentang');
    }

}
