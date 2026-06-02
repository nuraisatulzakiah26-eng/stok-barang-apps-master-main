@extends ('layouts.admin')
@section('content')
<div class="container mb-5">
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Tambah Material / Bahan Baku</h4>
            </div>
            <div class="card-body">
               <form action="{{ route('material.pokok.store') }}" method="POST">
    @csrf
    
    <div class="mb-3">
    <label for="jenis_material" class="form-label">Jenis Material</label>
    <select class="form-select" id="jenis_material" name="jenis_material" required>
        <option value="">-- Pilih Jenis Kayu --</option>
        
        {{-- Kita lakukan perulangan untuk membongkar data $categories dari controller --}}
        @foreach ($categories as $cat)
            {{-- value akan menyimpan ID kategori untuk database, sedangkan teks di luar untuk dibaca manusia --}}
            <option value="{{ $cat->nama_Kategori }}">{{ $cat->nama_Kategori }}</option>
        @endforeach

    </select>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="stok_sekarang" class="form-label">Stok Sekarang</label>
        <input type="number" class="form-control" id="stok_sekarang" name="stok_sekarang" min="0" placeholder="0" required>
    </div>
    <div class="col-md-6 mb-3">
        <label for="stok_minimum" class="form-label">Stok Minimum</label>
        <input type="number" class="form-control" id="stok_minimum" name="stok_minimum" min="0" placeholder="0" required>
    </div>
</div>
<div class="d-flex justify-content-between mt-4">
    <a href="{{ route('material.pokok') }}" class="btn btn-secondary">Kembali</a>
    <button type="submit" class="btn btn-success">Simpan Material</button>
</div>

</form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
