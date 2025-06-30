<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; 

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'     => 'atmin',
            'email'    => 'pler@gmail.com',
            'password' => 'admin123',
        ]);
    }
}
