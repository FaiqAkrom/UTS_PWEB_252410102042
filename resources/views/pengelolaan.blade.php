@extends('layouts.app')

@section('title', 'Katalog Layanan')

@section('content')
{{-- Header Halaman dengan Tipografi Two-Tone --}}
<div style="margin-bottom: 24px; display: flex; justify-content: space-between; align-items: flex-end; flex-wrap: wrap; gap: 16px;">
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

{{-- Filter & Search Bar Sederhana (Responsif pada Layar HP) --}}
<div style="background: #ffffff; border: 1px solid var(--border-color); border-radius: var(--radius-md); padding: 12px 18px; margin-bottom: 24px; display: flex; justify-content: space-between; align-items: center; box-shadow: var(--shadow-soft); flex-wrap: wrap; gap: 12px;">
    <div style="display: flex; align-items: center; gap: 10px; font-size: 0.85rem; color: var(--text-muted); flex: 1; min-width: 200px;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="color: #71717a;">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
        <input 
            type="text" 
            id="service-search-input" 
            placeholder="Cari nama paket atau kategori layanan..." 
            style="border: none; outline: none; background: transparent; font-size: 0.85rem; width: 100%; max-width: 280px; color: var(--text-black);"
            oninput="filterCards()"
        >
    </div>

    <div style="font-size: 0.75rem; color: var(--text-muted);">
        Menampilkan <strong>{{ count($layanan) }}</strong> Paket Terdaftar
    </div>
</div>

{{-- Rendering Data Statis Layanan Menggunakan Blade @foreach (Murni dari Controller) --}}
<div class="services-catalog-grid" id="services-grid">
    @foreach ($layanan as $item)
        <article class="service-item-card service-card-element" data-name="{{ strtolower($item['nama']) }}" data-cat="{{ strtolower($item['kategori']) }}">
            {{-- Top Accent Bar dari Controller --}}
            <div class="service-accent-bar {{ $item['aksen']['bar'] }}"></div>

            <div>
                <div class="service-badge {{ $item['aksen']['badge'] }}">
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
                    <div style="font-size: 0.85rem; font-weight: 700; color: var(--text-black); display: flex; align-items: center; justify-content: flex-end; gap: 4px;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: #52525b;">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                        <span>{{ $item['estimasi'] }}</span>
                    </div>
                </div>
            </div>
        </article>
    @endforeach
</div>

{{-- Kotak Keterangan Kepatuhan UTS (Tanpa Emote) --}}
<div style="background: #ffffff; border: 1px solid var(--border-color); border-radius: var(--radius-md); padding: 18px 22px; margin-top: 32px; box-shadow: var(--shadow-soft);">
    <div style="display: flex; align-items: center; gap: 8px; font-weight: 700; font-size: 0.9rem; color: var(--text-black); margin-bottom: 4px;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: #0284c7;">
            <circle cx="12" cy="12" r="10"></circle>
            <line x1="12" y1="16" x2="12" y2="12"></line>
            <line x1="12" y1="8" x2="12.01" y2="8"></line>
        </svg>
        <span>Catatan Akademik & Kepatuhan UTS</span>
    </div>
    <p style="font-size: 0.8rem; color: var(--text-muted); line-height: 1.5;">
        Halaman ini membuktikan implementasi konsep pengiriman <strong>Array PHP dari Controller</strong> dan perulangan direktif <strong>Blade <code>@@foreach</code></strong>. Seluruh data disajikan secara <em>read-only</em> tanpa operasi manipulasi basis data (CRUD) sesuai batasan tugas UTS Pemrograman Web.
    </p>
</div>

<script>
    // Fitur pencarian sederhana di sisi peramban
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
