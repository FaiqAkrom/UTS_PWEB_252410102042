{{-- Komponen Navbar (Blade Component <x-navbar />) — Spectra Aesthetic --}}
@php
    $currentUsername = request('username', session('username', ''));
    $queryParam = $currentUsername ? ['username' => $currentUsername] : [];
@endphp

<header class="navbar">
    <div class="container">
        {{-- Brand Logo --}}
        <a href="{{ route('dashboard', $queryParam) }}" class="nav-brand">
            <div class="brand-icon-box">
                <span>🫧</span>
            </div>
            <div style="display: flex; align-items: center;">
                <span class="brand-title">CleanWash</span>
                <span class="brand-badge">Spectra Core</span>
            </div>
        </a>

        {{-- Navigasi Halaman Utama --}}
        <nav>
            <ul class="nav-links">
                <li>
                    <a href="{{ route('login') }}" class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}">
                        Masuk
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard', $queryParam) }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('pengelolaan', $queryParam) }}" class="nav-link {{ request()->routeIs('pengelolaan') ? 'active' : '' }}">
                        Katalog Layanan
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile', $queryParam) }}" class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}">
                        Profil
                    </a>
                </li>

                {{-- User Badge Aktif --}}
                @if($currentUsername)
                    <li>
                        <a href="{{ route('profile', $queryParam) }}" class="nav-user-pill" style="text-decoration: none;">
                            <div class="user-avatar-mini">
                                {{ strtoupper(substr($currentUsername, 0, 1)) }}
                            </div>
                            <span>{{ $currentUsername }}</span>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</header>
