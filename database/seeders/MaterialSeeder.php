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
    [
        'kode_material' => 'MT-001',
        'nama_material' => 'Kayu Jati Papan',
        'jenis_material' => 'Pokok',
        'tebal' => 5.00,      // Ada tebal (cm)
        'panjang' => 4.00,    // Ada panjang (m)
        'lebar' => 20.00,    // Ada lebar (cm)
        'satuan' => 'Pcs',
        'stok_sekarang' => 10,
        'stok_minimum' => 5,
    ],
    [
        'kode_material' => 'MT-002',
        'nama_material' => 'Lem Fox Kuning',
        'jenis_material' => 'Pembantu',
        'tebal' => null,      // Kosongkan karena bukan kayu
        'panjang' => null,  // Kosongkan karena bukan kayu
        'lebar' => null,     
        'satuan' => 'Kg',
        'stok_sekarang' => 20,
        'stok_minimum' => 5,
    ]
]);
    }
}
