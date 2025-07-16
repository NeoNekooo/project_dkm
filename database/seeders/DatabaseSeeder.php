<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            KontakSeeder::class,
            DkmProfilSeeder::class,
            TentangKamiSeeder::class,
            InfaqSeeder::class,
            PostSeeder::class,
            KegiatanSeeder::class,
            OrganigramSeeder::class,
        ]);
    }
}
