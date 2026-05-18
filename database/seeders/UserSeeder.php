<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat akun Admin secara otomatis
        User::create([
            'name' => 'Admin Gudang Furnitur',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'), // Nanti login pakai password ini
            'role' => 'admin',
        ]);
    }
}