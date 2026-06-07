@extends('layouts.admin') 

@section('content')
    {{-- Notifikasi Sukses --}}
    @if(session('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('sukses') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Sisi Atas: Hanya Judul dan Form Pencarian Panjang --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Data Supplier</h2>
        
        <form action="{{ route('material.supplier') }}" method="GET" class="d-flex gap-2" style="width: 450px;">
            <input type="text" name="cari" class="form-control" placeholder="Cari berdasarkan nama supplier, alamat, atau telepon..." value="{{ request('cari') }}">
            <button type="submit" class="btn btn-secondary">Cari</button>
        </form>
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
                            <th>Telepon</th>
                            <th>Email</th>
                            <th>Kategori Material</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($suppliers as $index => $supplier)
                        <tr>
                            <td class="ps-4">{{ $index + 1 }}</td>
                            <td class="fw-bold text-secondary">{{ $supplier->nama_supplier }}</td>
                            <td>{{ $supplier->alamat }}</td>
                            <td>{{ $supplier->telepon }}</td>
                            <td>{{ $supplier->email ?? '-' }}</td>
                            <td>
                                @if($supplier->kategori_material == 'Material Pokok')
                                    <span class="badge bg-primary">Material Pokok</span>
                                @elseif($supplier->kategori_material == 'Material Pembantu')
                                    <span class="badge bg-warning text-dark">Material Pembantu</span>
                                @else
                                    <span class="badge bg-secondary">Semua</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditSupplier{{ $supplier->id }}">Edit</button>
                                
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapusSupplier{{ $supplier->id }}">Hapus</button>
                            </td>
                        </tr>

                        {{-- MODAL POP-UP: EDIT SUPPLIER --}}
                        <div class="modal fade" id="modalEditSupplier{{ $supplier->id }}" tabindex="-1" aria-labelledby="modalEditSupplierLabel{{ $supplier->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalEditSupplierLabel{{ $supplier->id }}">Edit Data Supplier</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body text-start">
                                            
                                            <div class="mb-3">
                                                <label class="form-label">Nama Supplier</label>
                                                <input type="text" name="nama_supplier" class="form-control" value="{{ $supplier->nama_supplier }}" required>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Alamat</label>
                                                <textarea name="alamat" class="form-control" rows="3" required>{{ $supplier->alamat }}</textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Telepon</label>
                                                <input type="text" name="telepon" class="form-control" value="{{ $supplier->telepon }}" required>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control" value="{{ $supplier->email }}" placeholder="Boleh dikosongkan">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Kategori Material</label>
                                                <select name="kategori_material" class="form-select" required>
                                                    <option value="Material Pokok" {{ $supplier->kategori_material == 'Material Pokok' ? 'selected' : '' }}>Material Pokok (Kayu / Veneer / HPL)</option>
                                                    <option value="Material Pembantu" {{ $supplier->kategori_material == 'Material Pembantu' ? 'selected' : '' }}>Material Pembantu (Lem / Baut / Sekrup)</option>
                                                    <option value="Semua" {{ $supplier->kategori_material == 'Semua' ? 'selected' : '' }}>Semua Kategori</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{-- MODAL POP-UP: KONFIRMASI HAPUS PERSEGI PANJANG (TOMBOL BERDAMPINGAN) --}}
                        <div class="modal fade" id="modalHapusSupplier{{ $supplier->id }}" tabindex="-1" aria-labelledby="modalHapusSupplierLabel{{ $supplier->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-md">
                                <div class="modal-content">
                                    
                                    <div class="modal-body text-center pt-4 pb-3">
                                        <p class="mb-0 fw-bold text-dark" style="font-size: 1.1rem;">
                                            Apakah anda yakin menghapus Data supplier ini?
                                        </p>
                                    </div>
                                    
                                    <div class="modal-footer border-top-0 d-flex justify-content-center pb-4 pt-0">
                                        <form action="{{ route('supplier.destroy', $supplier->id) }}" method="POST" class="d-flex gap-3 justify-content-center" style="width: 280px;">
                                            @csrf
                                            @method('DELETE')
                                            
                                            <button type="submit" class="btn btn-success flex-fill py-2">
                                                Oke
                                            </button>
                                            
                                            <button type="button" class="btn btn-danger flex-fill py-2" data-bs-dismiss="modal">
                                                Batal
                                            </button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">Belum ada data supplier.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Tombol Tambah Supplier Melayang di Pojok Kanan Bawah Layar --}}
    <button class="btn btn-primary position-fixed" data-bs-toggle="modal" data-bs-target="#modalTambahSupplier" style="bottom: 40px; right: 40px; z-index: 1050; border-radius: 8px; padding: 10px 20px; box-shadow: 0 4px 12px rgba(102, 16, 242, 0.3);">
        + Tambah Supplier
    </button>
    
    {{-- MODAL POP-UP: TAMBAH SUPPLIER --}}
    <div class="modal fade" id="modalTambahSupplier" tabindex="-1" aria-labelledby="modalTambahSupplierLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahSupplierLabel">Tambah Data Supplier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('supplier.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        
                        <div class="mb-3">
                            <label class="form-label">Nama Supplier</label>
                            <input type="text" name="nama_supplier" class="form-control" required placeholder="Contoh: PT. Kayu Jati Abadi">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3" required placeholder="Alamat lengkap kantor/gudang"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Telepon</label>
                            <input type="text" name="telepon" class="form-control" required placeholder="Contoh: 081234xxxxxx">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Contoh: cs@kayujati.com (Boleh dikosongkan)">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kategori Material</label>
                            <select name="kategori_material" class="form-select" required>
                                <option value="Material Pokok">Material Pokok (Kayu / Veneer / HPL)</option>
                                <option value="Material Pembantu">Material Pembantu (Lem / Baut / Sekrup)</option>
                                <option value="Semua" selected>Semua Kategori</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection