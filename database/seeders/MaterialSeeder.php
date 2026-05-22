<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    DB::table('materials')->insert([
        // 1. Material Pokok / Utama
            [
                'kode_material' => 'MT-001',
                'nama_material' => 'Kayu Jati Perhutani',
                'jenis_material' => 'Pokok',
                'size' => 1.0,
                'satuan' => 'M',
                'stok_minimum' => 10,
                'stok_sekarang' => 5, // Sengaja di bawah minimum untuk test notifikasi
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_material' => 'MT-002',
                'nama_material' => 'Kayu Bengkirai',
                'jenis_material' => 'Pokok',
                'size' => 1.0,
                'satuan' => 'M',
                'stok_minimum' => 10,
                'stok_sekarang' => 15, // Stok aman
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 2. Material Pembantu
            [
                'kode_material' => 'MT-003',
                'nama_material' => 'Lem',
                'jenis_material' => 'Pembantu',
                'size' => 2.0,
                'satuan' => 'Kg',
                'stok_minimum' => 100,
                'stok_sekarang' => 45, // Sengaja di bawah minimum untuk test notifikasi
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
