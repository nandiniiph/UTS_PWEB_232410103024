@extends('layouts.app')

@section('title', 'Pengelolaan Reservasi')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Reservasi</h1>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Tamu</th>
                    <th>Check-In</th>
                    <th>Tipe Kamar</th>
                    <th>Status</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $res)
                <tr>
                    <td>{{ $res['id'] }}</td>
                    <td>{{ $res['nama_tamu'] }}</td>
                    <td>{{ $res['check_in'] }}</td>
                    <td>{{ $res['tipe_kamar'] }}</td>
                    <td>
                        <span class="badge bg-{{ $res['status'] == 'Confirmed' ? 'success' : 'warning' }}">
                            {{ $res['status'] }}
                        </span>
                    </td>
                    <td>Rp {{ number_format($res['total_harga'], 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
