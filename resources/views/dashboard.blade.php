@extends('layouts.admin') {{-- Memanggil kerangka utama dashboard kamu --}}

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row mb-10">
        <div class="col-md-12">
            <h3 class="fw-bold text-dark mb-1">Selamat Datang, {{ ucfirst(Auth::user()->role) }}</h3>
            <p class="text-muted">Berikut adalah rangkuman aktivitas sistem PKS-Inventory hari ini.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3 d-flex align-items-center border-bottom">
                    <div class="bg-danger-soft text-danger p-2 rounded-3 me-3">
                        <i data-feather="alert-triangle" class="nav-icon icon-xs"></i>
                    </div>
                    <div>
                        <h4 class="mb-0 fw-bold text-danger">Peringatan: Stok Material Menipis!</h4>
                        <small class="text-muted">Segera hubungi supplier untuk melakukan pemesanan ulang bahan baku di bawah ini.</small>
                    </div>
                </div>
                
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">Kode</th>
                                    <th>Nama Bahan Baku</th>
                                    <th>Jenis</th>
                                    <th>Kualitas</th>
                                    <th>Ukuran</th>
                                    <th>Lokasi</th>
                                    <th>Sisa Stok</th>
                                    <th>Stok Minimum</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($materialMenipis as $item)
                                    <tr>
                                        <td class="ps-4 fw-bold text-secondary">{{ $item->kode_material }}</td>
                                        <td>{{ $item->nama_material }}</td>
                                        <td>
                                            <span class="badge {{ $item->jenis_material == 'Pokok' ? 'bg-primary' : 'bg-warning' }}">
                                                {{ $item->jenis_material }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-dark fw-medium">{{ $item->kualitas ?? '-' }}</span>
                                            </td>
                                        <td>{{ $item->size }} {{ $item->satuan }}</td>
                                        <td>
                                            @if($item->lokasi_gudang || $item->blok_area)
                                               <small class="text-muted">{{ $item->lokasi_gudang ?? '-' }} ({{ $item->blok_area ?? '-' }})</small>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td class="text-danger fw-bold">{{ $item->stok_sekarang }}</td>
                                        <td class="text-muted">{{ $item->stok_minimum }}</td>
                                        <td class="text-center">
                                            <span class="badge bg-light-danger text-danger">Butuh Restock</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-5 text-muted">
                                            <i data-feather="check-circle" class="text-success mb-2" style="width: 40px; height: 40px;"></i>
                                            <p class="mb-0 fw-bold">Semua aman! Tidak ada material yang kehabisan stok.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection