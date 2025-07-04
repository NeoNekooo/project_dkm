<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TentangKami extends Model
{
    use HasFactory;

    protected $table = 'tentang_kami';

    protected $fillable = [
        'foto_masjid',
        'isi',
        'nama_ketua',
        'foto_ketua',
        'sejarah_ketua',
    ];

    public function profil()
    {
        return $this->hasOne(Profil::class, 'id_tentang');
    }
}
