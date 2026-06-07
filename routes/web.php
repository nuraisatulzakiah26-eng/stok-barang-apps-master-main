<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Auth; 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
   $materialMenipis = DB::table('materials')
        ->whereRaw('stok_sekarang <= stok_minimum')
        ->get();
        return view('dashboard', compact('materialMenipis'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/material', [BarangController::class, 'index'])->name('material.index');

    Route::get('/material/pokok', [BarangController::class, 'pokok'])->name('material.pokok');
    Route::get('/material/pokok/create', [BarangController::class, 'create'])->name('material.pokok.create');
    Route::post('/material/pokok/store', [BarangController::class, 'store'])->name('material.pokok.store');
    
    // --- RUTE DATA SUPPLIER ---
    // Rute indeks ini otomatis menangkap request GET dari form pencarian 'cari' Anda
    Route::get('/material/supplier', [SupplierController::class, 'index'])->name('material.supplier');
    Route::post('/material/supplier/store', [SupplierController::class, 'store'])->name('supplier.store');

    Route::put('/material/supplier/update/{id}', [SupplierController::class, 'update'])->name('supplier.update');
    Route::delete('/material/supplier/delete/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');

    Route::get('/material/category', [CategoryController::class, 'index'])->name('material.category');
    Route::get('/material/category/create', [CategoryController::class, 'create'])->name('material.category.create');
    Route::post('/material/category/store', [CategoryController::class, 'store'])->name('material.category.store');
    Route::get('/material/category/edit/{id}', [CategoryController::class, 'edit'])->name('material.category.edit');
    Route::put('/material/category/update/{id}', [CategoryController::class, 'update'])->name('material.category.update');

     Route::get('/material/pembantu', function () {
            if (Auth::user()->role === 'staff'){
                return view('staff.pembantu_staff');
            }
        return view('admin.material.Pembantu');
    })->name('material.pembantu');

    Route::get('/laporan/stok', function (){
        return view('laporan.stok');
    })->name('laporan.stok');

      Route::get('/laporan/barang-masuk', function (){
        return view('laporan.Barang-masuk');
    })->name('laporan.masuk');

      Route::get('/laporan/barang-keluar', function (){
        return view('laporan.Barang-keluar');
    })->name('laporan.keluar');

});

require __DIR__.'/auth.php';