{{-- Komponen Navbar (Blade Component <x-navbar />) --}}
@php
    $currentUsername = request('username', session('username', ''));
    $queryParam = $currentUsername ? ['username' => $currentUsername] : [];
@endphp

<header class="navbar">
    <div class="container">
        <a href="{{ route('dashboard', $queryParam) }}" class="nav-brand">
            <span class="brand-icon">🫧</span>
            <span>CleanWash Dashboard</span>
        </a>

        <nav>
            <ul class="nav-links">
                <li>
                    <a href="{{ route('login') }}" class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}">
                        Login
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard', $queryParam) }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('pengelolaan', $queryParam) }}" class="nav-link {{ request()->routeIs('pengelolaan') ? 'active' : '' }}">
                        Pengelolaan Layanan
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile', $queryParam) }}" class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}">
                        Profil
                    </a>
                </li>
                @if($currentUsername)
                    <li>
                        <span class="nav-user-badge">👤 {{ $currentUsername }}</span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</header>

