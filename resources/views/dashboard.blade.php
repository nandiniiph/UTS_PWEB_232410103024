@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <!-- Header Hotel -->
    <div class="row mb-4 mt-3">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-4">
                    @if(isset($welcome_message) && $welcome_message)
                        <p class="text-muted mb-2">{{ $welcome_message }} di</p>
                    @endif
                    <h1 class="display-5 fw-bold text-primary">
                        <i class="bi bi-building"></i> Hotel Luxury
                    </h1>
                    <p class="lead text-muted">
                        Kenyamanan dan Kemewahan yang Tak Terlupakan
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Total Reservasi Card -->
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-purple" data-bs-toggle="modal" data-bs-target="#totalReservasiModal" style="cursor: pointer; background-color: #6f42c1;">
                <div class="card-body">
                    <h5 class="card-title">Total Reservasi</h5>
                    <p class="card-text fs-2">{{ $stats['total_reservasi'] }}</p>
                    <small class="opacity-75">Klik untuk detail</small>
                </div>
            </div>
        </div>

        <!-- Reservasi Hari Ini Card -->
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-orange" data-bs-toggle="modal" data-bs-target="#reservasiHariIniModal" style="cursor: pointer; background-color: #fd7e14;">
                <div class="card-body">
                    <h5 class="card-title">Reservasi Hari Ini</h5>
                    <p class="card-text fs-2">{{ $stats['reservasi_hari_ini'] }}</p>
                    <small class="opacity-75">Klik untuk detail</small>
                </div>
            </div>
        </div>

        <!-- Kamar Tersedia Card -->
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-teal" data-bs-toggle="modal" data-bs-target="#kamarTersediaModal" style="cursor: pointer; background-color: #20c997;">
                <div class="card-body">
                    <h5 class="card-title">Kamar Tersedia</h5>
                    <p class="card-text fs-2">{{ $stats['kamar_tersedia'] }}</p>
                    <small class="opacity-75">Klik untuk detail</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Deskripsi Kamar -->
    <div class="card shadow-sm mb-5 mt-5">
        <div class="card-header bg-white border-bottom py-3">
            <h4 class="mb-0 d-flex align-items-center">
                <i class="bi bi-door-open text-primary me-2"></i>
                Tipe Kamar
            </h4>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach($room_types as $type => $room)
                <div class="col-md-6 mb-4">
                    <div class="card h-100 border-{{ $type == 'deluxe' ? 'primary' : 'warning' }}">
                        <div class="card-header bg-{{ $type == 'deluxe' ? 'primary' : 'warning' }} text-{{ $type == 'deluxe' ? 'white' : 'dark' }}">
                            <h5 class="mb-0">{{ $room['name'] }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <div class="bg-light rounded overflow-hidden" style="height: 200px; width: 100%;">
                                    <img src="{{ asset('img/' . $room['image']) }}"
                                         alt="{{ $room['name'] }}"
                                         class="w-100 h-100"
                                         style="object-fit: cover;">
                                </div>
                            </div>
                            <ul class="list-unstyled">
                                @foreach($room['facilities'] as $facility)
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> {{ $facility }}</li>
                                @endforeach
                            </ul>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="badge bg-{{ $room['availability'] ? 'success' : 'danger' }}">
                                    {{ $room['availability'] ? 'Tersedia' : 'Penuh' }}
                                </span>
                                <h5 class="text-primary mb-0">Rp {{ number_format($room['price'], 0, ',', '.') }}/malam</h5>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Fasilitas Hotel -->
    <div class="card shadow-sm mb-5">
        <div class="card-header bg-white border-bottom py-3">
            <h4 class="mb-0 d-flex align-items-center">
                <i class="bi bi-star-fill text-warning me-2"></i>
                Fasilitas Hotel
            </h4>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach($facilities as $facility)
                <div class="col-md-4">
                    <div class="d-flex align-items-start mb-4">
                        <div class="flex-shrink-0 bg-primary bg-opacity-10 p-2 rounded me-3">
                            <i class="bi bi-{{ $facility['icon'] }} fs-4 text-primary"></i>
                        </div>
                        <div>
                            <h5 class="mb-1">{{ $facility['name'] }}</h5>
                            <p class="text-muted mb-0">{{ $facility['description'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Galeri Foto -->
    <div class="card shadow-sm">
        <div class="card-header bg-white border-bottom py-3">
            <h4 class="mb-0 d-flex align-items-center">
                <i class="bi bi-images text-primary me-2"></i>
                Galeri Hotel
            </h4>
        </div>
        <div class="card-body">
            <div class="row g-3">
                @foreach($gallery as $image)
                <div class="col-md-4 col-6">
                    <div class="ratio ratio-16x9">
                        <div class="bg-light rounded d-flex align-items-center justify-content-center">
                            <img src="{{ asset('img/' . $image) }}"
                                 alt="{{ str_replace('.png', '', $image) }}"
                                 class="img-fluid rounded">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Modal for Total Reservasi -->
<div class="modal fade" id="totalReservasiModal" tabindex="-1" aria-labelledby="totalReservasiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="totalReservasiModalLabel">Detail Total Reservasi</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Total keseluruhan reservasi yang pernah dilakukan:</p>
                <ul>
                    <li>Total: {{ $stats['total_reservasi'] }} reservasi</li>
                    <li>Bulan ini: {{ $stats['reservasi_bulan_ini'] }}</li>
                    <li>Tahun ini: {{ $stats['reservasi_tahun_ini'] }}</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Reservasi Hari Ini -->
<div class="modal fade" id="reservasiHariIniModal" tabindex="-1" aria-labelledby="reservasiHariIniModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="reservasiHariIniModalLabel">Detail Reservasi Hari Ini</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Detail reservasi untuk hari ini:</p>
                <ul>
                    <li>Total: {{ $stats['reservasi_hari_ini'] }} reservasi</li>
                    <li>Check-in: {{ $stats['checkin_hari_ini'] }}</li>
                    <li>Check-out: {{ $stats['checkout_hari_ini'] }}</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Kamar Tersedia -->
<div class="modal fade" id="kamarTersediaModal" tabindex="-1" aria-labelledby="kamarTersediaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="kamarTersediaModalLabel">Detail Kamar Tersedia</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Status ketersediaan kamar:</p>
                <ul>
                    <li>Tersedia: {{ $stats['kamar_tersedia'] }} kamar</li>
                    <li>Total kamar: {{ $stats['total_kamar'] }}</li>
                    <li>Terisi: {{ $stats['kamar_terisi'] }}</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

@endsection
