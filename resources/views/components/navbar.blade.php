{{-- Komponen Navbar (Blade Component <x-navbar />) --}}
@php
    // Ambil parameter username langsung dari request URL
    $currentUsername = request('username', '');
    $queryParam = $currentUsername !== '' ? ['username' => $currentUsername] : [];
@endphp

<header class="navbar">
    <div class="container">
        {{-- Brand Logo --}}
        <a href="{{ route('dashboard', $queryParam) }}" class="nav-brand">
            <div class="brand-icon-box">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path>
                </svg>
            </div>
            <div style="display: flex; align-items: center;">
                <span class="brand-title">CleanWash</span>
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
                                {{ strtoupper(mb_substr($currentUsername, 0, 1)) }}
                            </div>
                            <span>{{ $currentUsername }}</span>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</header>
