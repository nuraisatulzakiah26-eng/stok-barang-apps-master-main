<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\suppliers; 

class SupplierController extends Controller
{
    // 1. Menampilkan Halaman Utama Tabel Supplier & Fitur Pencarian
    public function index(Request $request)
    {
        // Mengambil kata kunci dari form input name="cari"
        $keyword = $request->get('cari');

        // Jika tombol cari ditekan atau ada keyword yang diisi
        if ($keyword) {
            $suppliers = suppliers::where('nama_supplier', 'LIKE', "%$keyword%")
                ->orWhere('alamat', 'LIKE', "%$keyword%")
                ->orWhere('telepon', 'LIKE', "%$keyword%")
                ->get();
        } else {
            // Jika tidak ada pencarian, tampilkan semua data seperti semula
            $suppliers = suppliers::all();
        }

        return view('admin.material.supplier', compact('suppliers'));
    }

    // 2. Memproses & Menyimpan Data Supplier Baru (Menggunakan Metode Manual)
    public function store(Request $request)
    {
        // Validasi input data dari form HTML
        $request->validate([
            'nama_supplier'     => 'required|string|max:255',
            'alamat'            => 'required|string',
            'telepon'           => 'required|string|max:15',
            'email'             => 'nullable|email|max:255',
            'kategori_material' => 'required|in:Material Pokok,Material Pembantu,Semua',
        ]);

        // Menggunakan alternatif pengisian manual agar Kategori Material tidak ter-reset otomatis
        $supplier = new suppliers();
        $supplier->nama_supplier     = $request->nama_supplier;
        $supplier->alamat            = $request->alamat;
        $supplier->telepon           = $request->telepon;
        $supplier->email             = $request->email;
        $supplier->kategori_material = $request->kategori_material;
        $supplier->save();

        // Setelah berhasil menyimpan, halaman otomatis di-refresh dengan pesan sukses
        return redirect()->back()->with('sukses', 'Data supplier baru berhasil disimpan!');
    }

    // 3. Memproses Perubahan Data (Edit / Update)
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_supplier'     => 'required|string|max:255',
            'alamat'            => 'required|string',
            'telepon'           => 'required|string|max:15',
            'email'             => 'nullable|email|max:255',
            'kategori_material' => 'required|in:Material Pokok,Material Pembantu,Semua',
        ]);    

        // Cari data supplier berdasarkan ID, lalu timpa dengan data baru
        $supplier = suppliers::findOrFail($id);
        $supplier->nama_supplier     = $request->nama_supplier;
        $supplier->alamat            = $request->alamat;
        $supplier->telepon           = $request->telepon;
        $supplier->email             = $request->email;
        $supplier->kategori_material = $request->kategori_material;
        $supplier->save();

        return redirect()->back()->with('sukses', 'Data supplier berhasil diperbarui!');
    }

    // 4. Menghapus Data Supplier
    public function destroy($id)
    {
        $supplier = suppliers::findOrFail($id);
        $supplier->delete();

        return redirect()->back()->with('sukses', 'Data supplier berhasil dihapus!');
    }
}