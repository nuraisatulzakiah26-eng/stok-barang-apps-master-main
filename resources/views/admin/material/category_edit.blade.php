@extends('layouts.admin') 
@section('content')
   <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Edit Kategori Material</h4>
                </div>
                <div class="card-body">
                    {{-- Form mengarah ke route store yang kita buat tadi --}}
                    <form action="{{ route('material.category.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nama_Kategori" class="form-label">Nama Kategori / Jenis Kayu</label>
                            <input type="text" class="form-control @error('nama_Kategori') is-invalid @enderror" 
                                   id="nama_Kategori" name="nama_Kategori" placeholder="Contoh: Kayu Ulin" value="{{ $category->nama_Kategori }}" required>
                            @error('nama_Kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                        <label for="jenis_material" class="form-label">Jenis Material</label>
                        <select class="form-select" id="jenis_material" name="jenis_material" required>
                            <option value="Kayu" {{ $category->jenis_material == 'Kayu' ? 'selected' : '' }}>Kayu</option>
                        </select>
                    </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('material.category') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-success">Simpan Data</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection