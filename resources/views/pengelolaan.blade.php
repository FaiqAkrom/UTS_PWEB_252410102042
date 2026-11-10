@extends('layouts.app')

@section('title', 'Katalog & Pengelolaan Layanan')

@section('content')
<div class="page-header">
    <h1>Katalog Layanan Laundry</h1>
    <p>
        Daftar paket dan tarif resmi laundry yang bersumber dari struktur data array pada PageController.
    </p>
</div>

{{-- Rendering Data Statis Layanan Menggunakan Blade @foreach --}}
<div class="services-grid">
    @foreach ($layanan as $item)
        <article class="service-card">
            <div>
                <div class="service-badge">{{ $item['kategori'] }}</div>
                <h2 class="service-title">{{ $item['nama'] }}</h2>
                <p class="service-desc">{{ $item['deskripsi'] }}</p>
            </div>

            <div class="service-meta">
                <div class="service-price">
                    Rp {{ number_format($item['harga'], 0, ',', '.') }}
                    <span>/ {{ $item['satuan'] }}</span>
                </div>
                <div class="service-time">
                    ⏱️ {{ $item['estimasi'] }}
                </div>
            </div>
        </article>
    @endforeach
</div>

<div class="section-block" style="margin-top: 32px;">
    <h2>💡 Informasi Pengelolaan Layanan</h2>
    <p style="color: var(--text-muted); font-size: 0.95rem;">
        Halaman ini membuktikan implementasi konsep pengiriman <strong>Array PHP dari Controller</strong> dan perulangan direktif <strong>Blade <code>@@foreach</code></strong>. Tidak terdapat operasi manipulasi basis data (CRUD) sesuai batasan tugas UTS.
    </p>
</div>
@endsection
