<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TentangKami;

class TentangKamiSeeder extends Seeder
{
    public function run(): void
    {
        TentangKami::create([
            'foto_masjid' => 'tentang/foto_masjid.jpg',
            'isi' => 'Masjid kami adalah tempat ibadah dan pusat kegiatan keislaman bagi masyarakat sekitar. 
                      Dengan lingkungan yang bersih dan nyaman, kami berkomitmen menjadi wadah pembinaan umat 
                      menuju kebaikan bersama.',
            'nama_ketua' => 'Ustadz H. Ahmad Subandi',
            'foto_ketua' => '',
            'sejarah_ketua' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione repellat ipsa sint sunt dicta debitis cupiditate dolorum totam iure nobis asperiores tenetur voluptas voluptatem illum excepturi minima, eos nemo? Cumque.', 
        ]);
    }
}
