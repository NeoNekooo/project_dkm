<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kegiatan;

class KegiatanSeeder extends Seeder
{
    public function run(): void
    {
        $kegiatan = [
            [
                'judul' => 'Kajian Spesial Subuh',
                'isi' => 'Kajian bersama Ustadz Hanan Attaki. Ajak keluarga dan teman!',
                'lokasi' => 'Masjid Al-Ikhlash',
                'tanggal' => '2025-07-06',
            ],
            [
                'judul' => 'Santunan Anak Yatim',
                'isi' => 'Penyaluran dana infaq untuk anak yatim binaan.',
                'lokasi' => 'Aula Serbaguna',
                'tanggal' => '2025-07-07',
            ],
            [
                'judul' => 'Pelatihan Pemulasaraan Jenazah',
                'isi' => 'Pelatihan praktis dan teoritis untuk umum.',
                'lokasi' => 'Ruang Serbaguna Masjid',
                'tanggal' => '2025-07-13',
            ],
        ];

        foreach ($kegiatan as $item) {
            Kegiatan::create($item);
        }
    }
}
