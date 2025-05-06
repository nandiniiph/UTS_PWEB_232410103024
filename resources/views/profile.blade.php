@extends('layouts.app')

@section('title', 'Profile Pengguna')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <!-- Profile Header -->
                <div class="card-header bg-primary py-4 position-relative">
                    <div class="d-flex justify-content-center">
                        <div class="bg-white p-2 rounded-circle position-absolute top-100 start-50 translate-middle">
                            <i class="bi bi-person-circle fs-1 text-primary"></i>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-5">
                    <!-- User Header Section -->
                    <div class="text-center mt-3 mb-4">
                        <h3 class="mb-1">{{ $username }}</h3>
                        <p class="text-muted mb-0">
                            <i class="bi bi-person-badge me-1"></i>
                            <span class="badge bg-{{
                                $profile['account_type'] === 'Administrator' ? 'primary' :
                                ($profile['account_type'] === 'Premium Member' ? 'warning' : 'secondary')
                            }}">
                                {{ $profile['account_type'] }}
                            </span>
                        </p>
                    </div>

                    <hr class="my-4 mx-auto" style="width: 80%">

                    <!-- Profile Content -->
                    <div class="row">
                        <!-- Personal Info Card -->
                        <div class="col-md-6 mb-4 mb-md-0">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title text-primary mb-3">
                                        <i class="bi bi-info-circle me-2"></i>Informasi Pribadi
                                    </h5>

                                    <!-- Profile Info Items -->
                                    @foreach([
                                        ['icon' => 'person-fill', 'label' => 'Username', 'value' => $username],
                                        ['icon' => 'envelope-fill', 'label' => 'Email', 'value' => $profile['email']],
                                        ['icon' => 'telephone-fill', 'label' => 'Telepon', 'value' => $profile['telepon']]
                                    ] as $item)
                                    <div class="mb-3">
                                        <div class="d-flex align-items-center mb-1 text-muted">
                                            <i class="bi bi-{{ $item['icon'] }} me-2"></i>
                                            <span class="fw-medium">{{ $item['label'] }}:</span>
                                        </div>
                                        <div class="ps-4">
                                            {{ $item['value'] }}
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Account Info Card -->
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title text-primary mb-3">
                                        <i class="bi bi-card-checklist me-2"></i>Informasi Akun
                                    </h5>

                                    <!-- Account Info Items -->
                                    <div class="mb-3">
                                        <div class="d-flex align-items-center mb-1 text-muted">
                                            <i class="bi bi-calendar-check me-2"></i>
                                            <span class="fw-medium">Member Sejak:</span>
                                        </div>
                                        <div class="ps-4">
                                            {{ \Carbon\Carbon::parse($profile['member_sejak'])->translatedFormat('d F Y') }}
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="d-flex align-items-center mb-1 text-muted">
                                            <i class="bi bi-shield-lock me-2"></i>
                                            <span class="fw-medium">Status Akun:</span>
                                        </div>
                                        <div class="ps-4">
                                            <span class="badge bg-{{ $profile['status'] === 'Aktif' ? 'success' : 'danger' }} bg-opacity-10 text-{{ $profile['status'] === 'Aktif' ? 'success' : 'danger' }}">
                                                {{ $profile['status'] }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="d-flex align-items-center mb-1 text-muted">
                                            <i class="bi bi-star me-2"></i>
                                            <span class="fw-medium">Tipe Akun:</span>
                                        </div>
                                        <div class="ps-4">
                                            <span class="badge bg-{{
                                                $profile['account_type'] === 'Administrator' ? 'primary' :
                                                ($profile['account_type'] === 'Premium Member' ? 'warning' : 'secondary')
                                            }} bg-opacity-10 text-{{
                                                $profile['account_type'] === 'Administrator' ? 'primary' :
                                                ($profile['account_type'] === 'Premium Member' ? 'warning' : 'secondary')
                                            }}">
                                                {{ $profile['account_type'] }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
