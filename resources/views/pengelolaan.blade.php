@extends('layouts.app')

@section('title', 'Katalog Layanan')

@section('content')
{{-- Header Halaman dengan Tipografi Two-Tone --}}
<div style="margin-bottom: 24px; display: flex; justify-content: space-between; align-items: flex-end; flex-wrap: gap; gap: 16px;">
    <div>
        <div style="font-size: 0.75rem; font-weight: 600; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 4px;">
            Katalog Paket & Tarif Resmi
        </div>
        <h1 class="two-tone-heading" style="font-size: 2.1rem;">
            <span class="mute">Daftar Paket</span>
            <span class="focus">Layanan Laundry CleanWash</span>
        </h1>
    </div>

    <span style="font-size: 0.75rem; font-weight: 600; padding: 4px 12px; border-radius: 9999px; background-color: #f4f4f5; color: #52525b; border: 1px solid #e4e4e7;">
        Sumber: Controller Array
    </span>
</div>

{{-- Filter & Search Bar Sederhana --}}
<div style="background: #ffffff; border: 1px solid var(--border-color); border-radius: var(--radius-md); padding: 12px 18px; margin-bottom: 24px; display: flex; justify-content: space-between; align-items: center; box-shadow: var(--shadow-soft);">
    <div style="display: flex; align-items: center; gap: 8px; font-size: 0.85rem; color: var(--text-muted);">
        <span>🔍</span>
        <input 
            type="text" 
            id="service-search-input" 
            placeholder="Cari nama paket atau kategori layanan..." 
            style="border: none; outline: none; background: transparent; font-size: 0.85rem; width: 280px; color: var(--text-black);"
            oninput="filterCards()"
        >
    </div>

    <div style="font-size: 0.75rem; color: var(--text-muted);">
        Menampilkan <strong>{{ count($layanan) }}</strong> Paket Terdaftar
    </div>
</div>

{{-- Rendering Data Statis Layanan Menggunakan Blade @foreach --}}
<div class="services-catalog-grid" id="services-grid">
    @php
        $accentClasses = [
            1 => ['bar' => 'accent-emerald', 'badge' => 'badge-emerald'],
            2 => ['bar' => 'accent-sky', 'badge' => 'badge-sky'],
            3 => ['bar' => 'accent-orange', 'badge' => 'badge-orange'],
        ];
    @endphp

    @foreach ($layanan as $item)
        @php
            $style = $accentClasses[$item['id']] ?? ['bar' => 'accent-emerald', 'badge' => 'badge-emerald'];
        @endphp
        <article class="service-item-card service-card-element" data-name="{{ strtolower($item['nama']) }}" data-cat="{{ strtolower($item['kategori']) }}">
            {{-- Top Accent Bar --}}
            <div class="service-accent-bar {{ $style['bar'] }}"></div>

            <div>
                <div class="service-badge {{ $style['badge'] }}">
                    {{ $item['kategori'] }}
                </div>
                <h2 class="service-name">{{ $item['nama'] }}</h2>
                <p class="service-desc">{{ $item['deskripsi'] }}</p>
            </div>

            <div class="service-meta-box">
                <div>
                    <div class="service-price-text">
                        Rp {{ number_format($item['harga'], 0, ',', '.') }}
                    </div>
                    <div class="service-unit">Per {{ $item['satuan'] }}</div>
                </div>

                <div style="text-align: right;">
                    <div style="font-size: 0.75rem; font-weight: 600; color: var(--text-muted);">Estimasi</div>
                    <div style="font-size: 0.85rem; font-weight: 700; color: var(--text-black);">
                        ⏱️ {{ $item['estimasi'] }}
                    </div>
                </div>
            </div>
        </article>
    @endforeach
</div>

{{-- Kotak Keterangan Kepatuhan UTS --}}
<div style="background: #ffffff; border: 1px solid var(--border-color); border-radius: var(--radius-md); padding: 18px 22px; margin-top: 32px; box-shadow: var(--shadow-soft);">
    <div style="display: flex; align-items: center; gap: 8px; font-weight: 700; font-size: 0.9rem; color: var(--text-black); margin-bottom: 4px;">
        <span>💡</span>
        <span>Catatan Akademik & Kepatuhan UTS</span>
    </div>
    <p style="font-size: 0.8rem; color: var(--text-muted); line-height: 1.5;">
        Halaman ini membuktikan implementasi konsep pengiriman <strong>Array PHP dari Controller</strong> dan perulangan direktif <strong>Blade <code>@@foreach</code></strong>. Seluruh data disajikan secara <em>read-only</em> tanpa operasi manipulasi basis data (CRUD) sesuai batasan tugas UTS Pemrograman Web.
    </p>
</div>

<script>
    function filterCards() {
        const query = document.getElementById('service-search-input').value.toLowerCase();
        const cards = document.querySelectorAll('.service-card-element');
        cards.forEach(card => {
            const name = card.getAttribute('data-name');
            const cat = card.getAttribute('data-cat');
            if (name.includes(query) || cat.includes(query)) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }
</script>
@endsection
