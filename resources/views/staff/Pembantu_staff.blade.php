@extends('layouts.admin') {{-- Ini memanggil file admin.blade.php kamu --}}

@section('title', 'Daftar Material') {{-- Ini mengisi @yield('title') di induk --}}

@section('content')
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
                            <td>Lem</td>
                            <td>1</td>
                            <td>M</td>
                            <td>10</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection