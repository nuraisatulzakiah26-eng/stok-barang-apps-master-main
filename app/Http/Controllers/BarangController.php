<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $materials = DB::table('materials')->get();
    return view('admin.material.pokok', compact('materials'));
    }

    public function pokok()
    {
       $materials = DB::table('materials')->where('jenis_material', 'Pokok')->get();   
    return view('admin.material.pokok', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = DB::table('categories')->get();
        return view('admin.material.pokok_create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_material' => 'required|string|max:255',
            'jenis_material' => 'required|string|max:255',
            'stok_sekarang' => 'required|integer',
            'stok_minimum' => 'required|integer',
        ]);

        DB::table('materials')->insert([
            'nama_material' => $request->nama_material,
            'jenis_material' => $request->jenis_material,
            'stok_sekarang' => $request->stok_sekarang,
            'stok_minimum' => $request->stok_minimum,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('material.pokok')->with('success', 'Material berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        //
    }
}
