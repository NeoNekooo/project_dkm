<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\kontak;

class KontakSeeder extends Seeder
{
    public function run(): void
    {
        kontak::create([
            'alamat' => 'Jl. Merpati No. 88, Jakarta Selatan',
            'email' => 'info@masjidnurulhidayah.or.id',
            'nomer1' => '081234567890',
            'nomer2' => '081234567120',
            'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13271.853695366479!2d132.4729552444007!3d33.73576191693072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3545615a1e5be903%3A0xa6a816cd520f72b0!2sAoshima!5e0!3m2!1sid!2sid!4v1751433854133!5m2!1sid!2sid',
        ]);
    }
}
