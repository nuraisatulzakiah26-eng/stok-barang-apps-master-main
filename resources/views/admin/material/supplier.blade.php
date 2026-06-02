@extends('layouts.admin') 
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Data Supplier</h2>
       <button class="btn btn-primary">+ Tambah Supplier</button>
       </div>
        {{-- Tabel Tampil Data --}}
        
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">No</th>
                            <th>Nama Supplier</th>
                            <th>Alamat</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
    
            {{-- Loop data dari controller --}}
            @foreach ($suppliers as $index => $supplier)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $supplier->nama_supplier }}</td>
                <td>{{ $supplier->alamat }}</td>
                <td>
                    <button class="btn btn-warning btn-sm">Edit</button>
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
            </div>
        </div>
    </div>
@endsection