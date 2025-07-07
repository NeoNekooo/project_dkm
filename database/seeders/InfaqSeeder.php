<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Infaq;

class InfaqSeeder extends Seeder
{
    public function run(): void
    {
        Infaq::create([
            'headline' => 'Mari Bersedekah untuk Pembangunan Masjid',
            'description' => 'Dana akan digunakan untuk renovasi toilet, tempat wudhu, dan aula masjid.',
            'picture' => 'default.jpg',
            'nomer_rekening' => '1234567890',
            'nama_rekening' => 'DKM Al-Ikhlash',
        ]);
    }
}
