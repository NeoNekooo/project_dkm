<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // ✅ Tambahkan ini!

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'     => 'kucuk',
            'email'    => 'finnnxptrix@gmail.com',
            'password' => 'munawar',
        ]);
    }
}
