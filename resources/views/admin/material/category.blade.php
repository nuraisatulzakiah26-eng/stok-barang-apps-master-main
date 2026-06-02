@extends('layouts.admin') 
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Data Kategori Material Furnitur</h2>
       <a href="{{ route('material.category.create') }}" class="btn btn-primary">+ Tambah Kategori</a>
        </div>
         {{-- Tabel Tampil Data --}}
       </div>
        {{-- Tabel Tampil Data --}}
        
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">No</th>
                            <th>Nama Kategori</th>
                            <th>Jenis Material</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
    
            {{-- Loop data dari controller --}}
            @foreach ($categories as $index => $cat)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $cat->nama_Kategori }}</td> {{-- Sesuai dengan file migration --}}
                <td>Kayu</td> {{-- Sesuai dengan file migration --}}
                <td>
                <a href="{{ route('material.category.edit', $cat->id) }}" class="btn btn-warning btn-sm">Edit</a>
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