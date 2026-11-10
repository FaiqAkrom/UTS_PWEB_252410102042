@extends('layouts.app')

@section('title', 'Dashboard Utama')

@section('content')
{{-- Top Welcome Banner dengan Warna Penuh (Full-Width Pastel Gradient) --}}
<div class="dashboard-hero-banner">
    <div style="position: relative; z-index: 10; display: flex; flex-direction: column; gap: 8px;">
        <div style="display: inline-flex; align-items: center; gap: 8px; font-size: 0.75rem; font-weight: 600; color: #3f3f46;">
            <span style="width: 6px; height: 6px; border-radius: 50%; background-color: #10b981;"></span>
            Ikhtisar Operasional &bull; Periode Aktif
        </div>

        <h1 class="two-tone-heading" style="font-size: 2.1rem;">
            <span class="mute">Selamat datang kembali,</span>
            <span class="focus">{{ $username }}</span>
        </h1>

        <p style="color: #4b5563; font-size: 0.95rem; max-width: 580px; margin-top: 4px;">
            Berikut adalah laporan ringkasan beban cucian dan performa mesin laundry CleanWash hari ini.
        </p>

        <div style="margin-top: 16px; display: flex; gap: 10px; flex-wrap: wrap;">
            <a href="{{ route('pengelolaan', ['username' => $username]) }}" class="btn-black" style="width: auto; padding: 10px 18px; font-size: 0.85rem;">
                <span>Katalog Layanan &rarr;</span>
            </a>
            <a href="{{ route('profile', ['username' => $username]) }}" class="btn-outline">
                <span>Profil Operator</span>
            </a>
        </div>
    </div>
</div>

{{-- 4 KPI Metric Cards (Bebas Emote, Menggunakan Clean SVG Icons) --}}
<div class="kpi-grid">
    <div class="kpi-card">
        <div class="kpi-header">
            <span>Total Layanan Aktif</span>
            <div class="kpi-icon-pill" style="background: #ecfdf5; color: #059669;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                    <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                </svg>
            </div>
        </div>
        <div class="kpi-value">{{ $ringkasan['total_layanan'] }} Layanan</div>
        <div class="kpi-footer">
            <span style="color: #059669; font-weight: 600;">Paket resmi siap pakai</span>
            <span>Katalog controller</span>
        </div>
    </div>

    <div class="kpi-card">
        <div class="kpi-header">
            <span>Sedang Diproses</span>
            <div class="kpi-icon-pill" style="background: #f0f9ff; color: #0284c7;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polyline points="12 6 12 12 16 14"></polyline>
                </svg>
            </div>
        </div>
        <div class="kpi-value">{{ $ringkasan['pesanan_proses'] }} Antrean</div>
        <div class="kpi-footer">
            <span style="color: #0284c7; font-weight: 600;">Mesin cuci beroperasi</span>
            <span>Estimasi tepat</span>
        </div>
    </div>

    <div class="kpi-card">
        <div class="kpi-header">
            <span>Selesai Hari Ini</span>
            <div class="kpi-icon-pill" style="background: #eff6ff; color: #2563eb;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
            </div>
        </div>
        <div class="kpi-value">{{ $ringkasan['pesanan_selesai'] }} Order</div>
        <div class="kpi-footer">
            <span style="color: #2563eb; font-weight: 600;">Siap diambil pelanggan</span>
            <span>Rapi & wangi</span>
        </div>
    </div>

    <div class="kpi-card">
        <div class="kpi-header">
            <span>Status Operasional</span>
            <div class="kpi-icon-pill" style="background: #fff7ed; color: #ea580c;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path>
                    <line x1="12" y1="2" x2="12" y2="12"></line>
                </svg>
            </div>
        </div>
        <div class="kpi-value" style="font-size: 1.45rem; color: #059669;">
            {{ $ringkasan['status_operasional'] }}
        </div>
        <div class="kpi-footer">
            <span style="color: #059669; font-weight: 600;">100% Beban Terkendali</span>
            <span>Simulasi realtime</span>
        </div>
    </div>
</div>

{{-- Visual Distribusi Beban Cucian & Log Aktivitas --}}
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 24px;">
    {{-- Left: Spectrum Traffic Bar Visual --}}
    <div style="background: #ffffff; border: 1px solid var(--border-color); border-radius: var(--radius-lg); padding: 24px; box-shadow: var(--shadow-soft);">
        <div style="margin-bottom: 20px;">
            <h2 style="font-size: 1.15rem; font-weight: 700; color: var(--text-black);">
                Distribusi Beban Cucian Mingguan
            </h2>
            <p style="font-size: 0.8rem; color: var(--text-muted); margin-top: 2px;">
                Visualisasi volume cucian berdasarkan paket layanan
            </p>
        </div>

        {{-- Bar Grid --}}
        <div style="display: grid; grid-template-columns: repeat(7, 1fr); gap: 10px; align-items: flex-end; height: 160px; padding-bottom: 12px; border-bottom: 1px solid var(--border-light);">
            @php
                $weeklyData = [
                    ['day' => 'Sen', 'h1' => 60, 'h2' => 80, 'h3' => 45],
                    ['day' => 'Sel', 'h1' => 75, 'h2' => 90, 'h3' => 55],
                    ['day' => 'Rab', 'h1' => 85, 'h2' => 70, 'h3' => 65],
                    ['day' => 'Kam', 'h1' => 65, 'h2' => 85, 'h3' => 50],
                    ['day' => 'Jum', 'h1' => 95, 'h2' => 90, 'h3' => 80],
                    ['day' => 'Sab', 'h1' => 80, 'h2' => 75, 'h3' => 70],
                    ['day' => 'Min', 'h1' => 70, 'h2' => 85, 'h3' => 60],
                ];
            @endphp

            @foreach ($weeklyData as $bar)
                <div style="display: flex; flex-direction: column; align-items: center; justify-content: flex-end; height: 100%;">
                    <div style="width: 100%; max-width: 30px; display: flex; align-items: flex-end; gap: 3px; height: 120px;">
                        <div style="flex: 1; height: {{ $bar['h1'] }}%; background: #10b981; border-radius: 4px 4px 0 0;" title="Cuci Kering"></div>
                        <div style="flex: 1; height: {{ $bar['h2'] }}%; background: #0ea5e9; border-radius: 4px 4px 0 0;" title="Cuci Setrika"></div>
                        <div style="flex: 1; height: {{ $bar['h3'] }}%; background: #f97316; border-radius: 4px 4px 0 0;" title="Setrika Saja"></div>
                    </div>
                    <span style="font-size: 0.75rem; color: var(--text-muted); margin-top: 8px; font-weight: 600;">{{ $bar['day'] }}</span>
                </div>
            @endforeach
        </div>

        {{-- Legend --}}
        <div style="display: flex; gap: 16px; flex-wrap: wrap; margin-top: 14px; font-size: 0.75rem; color: var(--text-muted);">
            <span style="display: flex; align-items: center; gap: 6px;">
                <span style="width: 8px; height: 8px; border-radius: 2px; background: #10b981;"></span> Cuci Kering
            </span>
            <span style="display: flex; align-items: center; gap: 6px;">
                <span style="width: 8px; height: 8px; border-radius: 2px; background: #0ea5e9;"></span> Cuci Setrika
            </span>
            <span style="display: flex; align-items: center; gap: 6px;">
                <span style="width: 8px; height: 8px; border-radius: 2px; background: #f97316;"></span> Setrika Saja
            </span>
        </div>
    </div>

    {{-- Right: Recent Activity Live Log --}}
    <div style="background: #ffffff; border: 1px solid var(--border-color); border-radius: var(--radius-lg); padding: 24px; box-shadow: var(--shadow-soft); display: flex; flex-direction: column; justify-content: space-between;">
        <div>
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px;">
                <h2 style="font-size: 1.15rem; font-weight: 700; color: var(--text-black);">
                    Aktivitas Operasional
                </h2>
                <span style="font-size: 0.7rem; font-weight: 600; padding: 2px 8px; border-radius: 6px; background-color: #f4f4f5; color: #71717a;">
                    Live Log
                </span>
            </div>

            <div style="display: flex; flex-direction: column; gap: 14px;">
                <div style="display: flex; gap: 12px; align-items: flex-start;">
                    <span style="width: 8px; height: 8px; border-radius: 50%; background: #10b981; margin-top: 6px; flex-shrink: 0;"></span>
                    <div>
                        <p style="font-size: 0.82rem; font-weight: 600; color: var(--text-black);">Order Cuci Setrika 4kg selesai disetrika uap</p>
                        <p style="font-size: 0.72rem; color: var(--text-muted);">15 menit yang lalu &bull; Operator Stasiun A</p>
                    </div>
                </div>

                <div style="display: flex; gap: 12px; align-items: flex-start;">
                    <span style="width: 8px; height: 8px; border-radius: 50%; background: #0ea5e9; margin-top: 6px; flex-shrink: 0;"></span>
                    <div>
                        <p style="font-size: 0.82rem; font-weight: 600; color: var(--text-black);">Pencucian 6kg Cuci Kering masuk mesin pengering</p>
                        <p style="font-size: 0.72rem; color: var(--text-muted);">40 menit yang lalu &bull; Mesin 03</p>
                    </div>
                </div>

                <div style="display: flex; gap: 12px; align-items: flex-start;">
                    <span style="width: 8px; height: 8px; border-radius: 50%; background: #f97316; margin-top: 6px; flex-shrink: 0;"></span>
                    <div>
                        <p style="font-size: 0.82rem; font-weight: 600; color: var(--text-black);">Order Setrika Saja 3kg telah diambil oleh pelanggan</p>
                        <p style="font-size: 0.72rem; color: var(--text-muted);">2 jam yang lalu &bull; Kasir Laundry</p>
                    </div>
                </div>
            </div>
        </div>

        <div style="margin-top: 20px; padding-top: 14px; border-top: 1px solid var(--border-light);">
            <a href="{{ route('pengelolaan', ['username' => $username]) }}" style="font-size: 0.8rem; font-weight: 600; color: var(--text-black); text-decoration: none; display: flex; align-items: center; justify-content: space-between;">
                <span>Lihat Katalog Layanan Lengkap</span>
                <span>&rarr;</span>
            </a>
        </div>
    </div>
</div>
@endsection
