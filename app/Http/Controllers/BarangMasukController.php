<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    // Fungsi Utama untuk Memproses Data Form Barang Masuk
    public function store(Request $request)
    {
        // 1. Validasi data yang dikirim dari halaman web
        $request->validate([
            'material_id' => 'required',
            'jumlah_masuk' => 'required|numeric|min:1',
            'tanggal_masuk' => 'required|date',
        ]);

        // 2. Ambil spesifikasi ukuran material dari database
        $material = DB::table('materials')->where('id', $request->material_id)->first();

        // 3. JALUR RUMUS KUBIKASI DARI IBU INDUSTRI
        if ($material->tebal != null && $material->panjang != null) {
            // Rumus: (Tebal cm / 100) x Panjang meter x Jumlah Batang
            $tebalMeter = $material->tebal / 100;
            $totalKubikasi = $tebalMeter * $material->panjang * $request->jumlah_masuk;
        } else {
            // Jika bukan kayu (seperti lem/baut), kubikasinya otomatis diisi 0
            $totalKubikasi = 0;
        }

        // 4. Simpan riwayat transaksi ke tabel barang_masuk
        DB::table('barang_masuk')->insert([
            'material_id' => $request->material_id,
            'jumlah_masuk' => $request->jumlah_masuk,
            'total_kubikasi' => $totalKubikasi, // Hasil rumus otomatis tersimpan!
            'tanggal_masuk' => $request->tanggal_masuk,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 5. Update & Tambah stok fisik utama di tabel materials (Satuan Pcs/Batang)
        DB::table('materials')
            ->where('id', $request->material_id)
            ->increment('stok_sekarang', $request->jumlah_masuk);

        // 6. Kembali ke halaman form dengan pesan sukses
        return redirect()->back()->with('success', 'Transaksi berhasil disimpan! Rumus kubikasi otomatis diaplikasikan.');
    }
}
