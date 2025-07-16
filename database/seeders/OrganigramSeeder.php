<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Organigram;

class OrganigramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    Organigram::create([
        'gambar' => null,
    ]);
    }   
}
