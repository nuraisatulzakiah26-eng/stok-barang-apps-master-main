<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('barang_masuk', function (Blueprint $table) {
        $table->id();
        $table->foreignId('material_id')->constrained('materials')->onDelete('cascade');
        $table->integer('jumlah_masuk'); // Jumlah batang/pcs yang dibeli
        $table->decimal('total_kubikasi', 10, 4); // Hasil rumus: (Tebal/100) x Panjang x Jumlah
        $table->date('tanggal_masuk');
        $table->timestamps();
    });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_masuk');
    }
};
