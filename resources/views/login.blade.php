@extends('layouts.app')

@section('title', 'Masuk ke Sistem')

@section('content')
<div class="login-hero-section">
    {{-- Two-Tone Spectra Signature Heading --}}
    <h1 class="two-tone-heading">
        <span class="mute">Kelola operasional laundry</span>
        <span class="focus">dalam satu harmoni kendali</span>
    </h1>
    <p style="color: var(--text-muted); font-size: 0.95rem; margin-top: 10px; max-width: 440px; margin-left: auto; margin-right: auto;">
        CleanWash menyatukan seluruh antrean cucian, katalog paket layanan, dan profil pengguna dalam satu sistem terpadu.
    </p>

    {{-- Clean Minimalist Login Box --}}
    <div class="login-card">
        <div class="login-card-header" style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h2 style="font-weight: 700;">Masuk ke Dashboard</h2>
                <p>Gunakan nama pengguna simulasi Anda</p>
            </div>
            <span style="font-size: 0.7rem; font-weight: 600; padding: 3px 8px; border-radius: 6px; background-color: #ecfdf5; color: #059669; border: 1px solid #a7f3d0;">
                Mode Stateless
            </span>
        </div>

        {{-- Form Login: Mengirim parameter username via HTTP GET --}}
        <form action="{{ route('dashboard') }}" method="GET">
            <div class="form-group">
                <label for="username" class="form-label">Nama Pengguna / Operator Laundry</label>
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    class="form-input" 
                    placeholder="Contoh: Budi Santoso atau NIM Anda" 
                    required 
                    autocomplete="off"
                    autofocus
                >
                <p style="font-size: 0.75rem; color: var(--text-light); margin-top: 6px;">
                    *Sesuai ketentuan UTS, form ini mendemonstrasikan request handling tanpa autentikasi database.
                </p>
            </div>

            <button type="submit" class="btn-black">
                <span>Masuk ke Dashboard Laundry</span>
                <span>&rarr;</span>
            </button>
        </form>
    </div>

    <p style="font-size: 0.75rem; color: var(--text-light); margin-top: 16px;">
        Simulasi arsitektur MVC Laravel murni tanpa penyimpanan basis data.
    </p>
</div>

{{-- Bottom Signature Pastel Spectrum Mesh & Glassmorphic Offset Brick Grid --}}
<div class="spectra-mesh-container" style="height: 220px; margin-top: 20px;">
    <!-- Pastel Color Field Blur -->
    <div class="spectra-color-field" style="position: absolute; inset: 0; top: 10px;"></div>

    <!-- Glassmorphic Rounded Brick Grid -->
    <div style="position: relative; z-index: 10; max-width: 1200px; margin: 0 auto; padding: 12px 10px 0;">
        <div class="spectra-tile-row">
            @for ($i = 0; $i < 12; $i++)
                <div class="spectra-tile"></div>
            @endfor
        </div>
        <div class="spectra-tile-row offset">
            @for ($i = 0; $i < 12; $i++)
                <div class="spectra-tile"></div>
            @endfor
        </div>
        <div class="spectra-tile-row">
            @for ($i = 0; $i < 12; $i++)
                <div class="spectra-tile"></div>
            @endfor
        </div>
    </div>

    <!-- Smooth Top Fade Mask -->
    <div class="spectra-fade-top" style="position: absolute; inset: 0; height: 90px; z-index: 15; pointer-events: none;"></div>
</div>
@endsection
