<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('materials', function (Blueprint $table) {
        $table->id();
        $table->string('kode_material')->unique(); // Contoh: MT-001
        $table->string('nama_material');          // Contoh: Kayu Jati
        $table->string('jenis_material');         // Pokok atau Pembantu
        $table->double('size');                   // Ukuran angka (1, 2, dll)
        $table->string('satuan');                 // Contoh: M3, Pcs, Lembar
        $table->integer('stok_minimum');          // Peringatan stok habis jika menyentuh angka ini
        $table->integer('stok_sekarang')->default(0); // Stok riil di gudang
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
