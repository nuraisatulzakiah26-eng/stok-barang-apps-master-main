@extends('layouts.admin') {{-- Ini memanggil file admin.blade.php kamu --}}

@section('title', 'Daftar Material') {{-- Ini mengisi @yield('title') di induk --}}

@section('content')
    {{-- Copy-paste kode tabel Bootstrap yang tadi di sini --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Master Bahan Baku</h2>
        <button class="btn btn-primary">+ Tambah Material</button>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    {{-- Judul tabel sesuai data dummy excel kamu --}}
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">No</th>
                            <th>Nama Bahan Baku</th>
                            <th>Size</th>
                            <th>Satuan</th>
                            <th>Stok Minimum</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Contoh isian dari data dummy kamu (Jati) --}}
                        <tr>
                            <td class="ps-4">1</td>
                            <td>Jati</td>
                            <td>1</td>
                            <td>M</td>
                            <td>10</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-outline-secondary">Edit</button>
                                <button class="btn btn-sm btn-outline-danger">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection