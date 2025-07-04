<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DkmProfil;

class DkmProfilSeeder extends Seeder
{
    public function run(): void
    {
        DkmProfil::create([
            'nama' => 'Masjid Nurul Hidayah',
            'visi' => 'Menjadi pusat ibadah dan kegiatan keagamaan yang inklusif dan dinamis.',
            'id_tentang' => 1,
            'id_kontak' => 1, 
            'logo' => null,
            'background' => null,
        ]);
    }
}
