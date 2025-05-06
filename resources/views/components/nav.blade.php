<nav class="navbar navbar-expand-lg navbar-dark bg-warning shadow-sm">
    <div class="container">
        <span class="navbar-brand fw-bold">
            <i class="bi bi-building me-2"></i>Hotel App
        </span>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                @php
                    $username = request()->query('username');
                @endphp
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active fw-bold' : '' }}"
                       href="{{ route('dashboard', ['username' => $username]) }}">
                        <i class="bi bi-house-door me-1"></i>Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('pengelolaan') ? 'active fw-bold' : '' }}"
                       href="{{ route('pengelolaan', ['username' => $username]) }}">
                        <i class="bi bi-calendar-check me-1"></i>Pengelolaan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('profile') ? 'active fw-bold' : '' }}"
                       href="{{ route('profile', ['username' => $username]) }}">
                        <i class="bi bi-person me-1"></i>Profile
                    </a>
                </li>
            </ul>

            <div class="d-flex align-items-center">
                <span class="text-white me-3">
                    <i class="bi bi-person-circle me-1"></i>
                    {{ $username ?? 'User' }}
                </span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-light">
                        <i class="bi bi-box-arrow-right me-1"></i>Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
