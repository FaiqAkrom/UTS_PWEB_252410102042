@extends('layouts.app')

@section('title', 'Dashboard Utama')

@section('content')
<div class="page-header">
    <h1>Dashboard Operasional Laundry</h1>
    <p>
        Selamat datang kembali, <strong>{{ $username }}</strong>! Berikut ringkasan performa laundry hari ini.
    </p>
</div>

{{-- Grid Metrik Ringkasan Laundry (Data Statis dari PageController) --}}
<div class="grid-metrics">
    <div class="metric-card">
        <div class="metric-icon">📋</div>
        <div class="metric-info">
            <h3>Total Layanan</h3>
            <div class="metric-value">{{ $ringkasan['total_layanan'] }} Layanan</div>
        </div>
    </div>

    <div class="metric-card">
        <div class="metric-icon">⏳</div>
        <div class="metric-info">
            <h3>Sedang Diproses</h3>
            <div class="metric-value">{{ $ringkasan['pesanan_proses'] }} Antrean</div>
        </div>
    </div>

    <div class="metric-card">
        <div class="metric-icon">✅</div>
        <div class="metric-info">
            <h3>Selesai Hari Ini</h3>
            <div class="metric-value">{{ $ringkasan['pesanan_selesai'] }} Order</div>
        </div>
    </div>

    <div class="metric-card">
        <div class="metric-icon">🏪</div>
        <div class="metric-info">
            <h3>Status Mesin</h3>
            <div class="metric-value" style="font-size: 1.25rem; color: var(--success);">
                {{ $ringkasan['status_operasional'] }}
            </div>
        </div>
    </div>
</div>

{{-- Navigasi Pintasan Cepat --}}
<div class="section-block">
    <h2>Aksi Cepat Sistem</h2>
    <p style="color: var(--text-muted); margin-bottom: 20px;">
        Pilih modul pengelolaan di bawah untuk melihat rincian katalog layanan atau memeriksa data identitas operator.
    </p>

    <div style="display: flex; gap: 14px; flex-wrap: wrap;">
        <a href="{{ route('pengelolaan', ['username' => $username]) }}" class="btn" style="background-color: var(--primary-light); color: var(--primary);">
            📦 Kelola & Lihat Layanan Laundry &rarr;
        </a>
        <a href="{{ route('profile', ['username' => $username]) }}" class="btn" style="background-color: #f1f5f9; color: var(--text-main);">
            👤 Lihat Profil Saya &rarr;
        </a>
    </div>
</div>
@endsection

