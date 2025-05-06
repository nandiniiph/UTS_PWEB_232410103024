@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="row justify-content-center mt-3">
    <div class="col-md-5">
        <div class="text-center mb-4">
            <h3 class="text-danger mb-2">Selamat Datang di Hotel Management System</h3>
            <p class="text-muted">Sistem pengelolaan reservasi kamar hotel</p>
        </div>

        <!-- Login Card -->
        <div class="card shadow">
            <div class="card-header bg-warning text-black">
                <h4 class="mb-0">Login Sistem</h4>
            </div>
            <div class="card-body">
                <p class="text-muted mb-4">Silakan masukkan username dan password Anda untuk mengakses sistem</p>
                <form action="{{ route('login.submit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-warning w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
