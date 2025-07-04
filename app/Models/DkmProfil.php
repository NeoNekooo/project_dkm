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
        'id_kontak',
        'tentang_kami',
        'logo',
        'background',
    ];

    
    public function kontak()
    {
        return $this->belongsTo(kontak::class, 'id_kontak');
    }

    public function logo()
    {
        return $this->belongsTo(File::class, 'logo');
    }

    public function background()
    {
        return $this->belongsTo(File::class, 'background');
    }
}
