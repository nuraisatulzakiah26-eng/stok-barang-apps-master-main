<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

    Route::get('/material', function () {
        return view('admin.material.pokok');
    })->name('material.pokok');

     Route::get('/material/pembantu', function () {
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
