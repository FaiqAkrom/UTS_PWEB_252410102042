@extends('layouts.app')

@section('title', 'Profil Pengguna')

@section('content')
<div style="max-width: 820px; margin: 0 auto 20px;">
    <div style="font-size: 0.75rem; font-weight: 600; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 4px;">
        Identitas & Sesi Kerja
    </div>
    <h1 class="two-tone-heading" style="font-size: 2.1rem;">
        <span class="mute">Profil Pengguna</span>
        <span class="focus">Sistem CleanWash</span>
    </h1>
</div>

<div class="profile-shell">
    {{-- Pastel Spectrum Cover Banner with Decorative Glass Tiles --}}
    <div class="profile-cover">
        <div class="spectra-color-field" style="position: absolute; inset: 0; opacity: 0.85;"></div>
        
        {{-- Grid tile mengisi seluruh area cover: position absolute, inset 0, 3 baris tile --}}
        <div style="position: absolute; inset: 0; z-index: 10; display: grid; grid-template-columns: repeat(9, 1fr); grid-template-rows: repeat(3, 1fr); gap: 6px; padding: 8px; opacity: 0.7;">
            {{-- Baris 1 --}}
            <div style="border-radius: 8px; background: rgba(255,255,255,0.4); border: 1px solid rgba(255,255,255,0.6);"></div>
            <div style="border-radius: 8px; background: rgba(255,255,255,0.25); border: 1px solid rgba(255,255,255,0.5);"></div>
            <div style="border-radius: 8px; background: rgba(255,255,255,0.5); border: 1px solid rgba(255,255,255,0.7);"></div>
            <div style="border-radius: 8px; background: rgba(255,255,255,0.3); border: 1px solid rgba(255,255,255,0.6);"></div>
            <div style="border-radius: 8px; background: rgba(255,255,255,0.45); border: 1px solid rgba(255,255,255,0.6);"></div>
            <div style="border-radius: 8px; background: rgba(255,255,255,0.2); border: 1px solid rgba(255,255,255,0.5);"></div>
            <div style="border-radius: 8px; background: rgba(255,255,255,0.4); border: 1px solid rgba(255,255,255,0.6);"></div>
            <div style="border-radius: 8px; background: rgba(255,255,255,0.55); border: 1px solid rgba(255,255,255,0.7);"></div>
            <div style="border-radius: 8px; background: rgba(255,255,255,0.3); border: 1px solid rgba(255,255,255,0.6);"></div>
            {{-- Baris 2 --}}
            <div style="border-radius: 8px; background: rgba(255,255,255,0.3); border: 1px solid rgba(255,255,255,0.5);"></div>
            <div style="border-radius: 8px; background: rgba(255,255,255,0.5); border: 1px solid rgba(255,255,255,0.7);"></div>
            <div style="border-radius: 8px; background: rgba(255,255,255,0.2); border: 1px solid rgba(255,255,255,0.5);"></div>
            <div style="border-radius: 8px; background: rgba(255,255,255,0.45); border: 1px solid rgba(255,255,255,0.6);"></div>
            <div style="border-radius: 8px; background: rgba(255,255,255,0.35); border: 1px solid rgba(255,255,255,0.6);"></div>
            <div style="border-radius: 8px; background: rgba(255,255,255,0.5); border: 1px solid rgba(255,255,255,0.7);"></div>
            <div style="border-radius: 8px; background: rgba(255,255,255,0.25); border: 1px solid rgba(255,255,255,0.5);"></div>
            <div style="border-radius: 8px; background: rgba(255,255,255,0.4); border: 1px solid rgba(255,255,255,0.6);"></div>
            <div style="border-radius: 8px; background: rgba(255,255,255,0.55); border: 1px solid rgba(255,255,255,0.7);"></div>
            {{-- Baris 3 --}}
            <div style="border-radius: 8px; background: rgba(255,255,255,0.45); border: 1px solid rgba(255,255,255,0.6);"></div>
            <div style="border-radius: 8px; background: rgba(255,255,255,0.3); border: 1px solid rgba(255,255,255,0.6);"></div>
            <div style="border-radius: 8px; background: rgba(255,255,255,0.55); border: 1px solid rgba(255,255,255,0.7);"></div>
            <div style="border-radius: 8px; background: rgba(255,255,255,0.2); border: 1px solid rgba(255,255,255,0.5);"></div>
            <div style="border-radius: 8px; background: rgba(255,255,255,0.4); border: 1px solid rgba(255,255,255,0.6);"></div>
            <div style="border-radius: 8px; background: rgba(255,255,255,0.3); border: 1px solid rgba(255,255,255,0.5);"></div>
            <div style="border-radius: 8px; background: rgba(255,255,255,0.5); border: 1px solid rgba(255,255,255,0.7);"></div>
            <div style="border-radius: 8px; background: rgba(255,255,255,0.25); border: 1px solid rgba(255,255,255,0.5);"></div>
            <div style="border-radius: 8px; background: rgba(255,255,255,0.45); border: 1px solid rgba(255,255,255,0.6);"></div>
        </div>
    </div>

    {{-- Avatar Box --}}
    <div class="profile-avatar-outer">
        <div class="profile-avatar-inner">
            {{ strtoupper(mb_substr($username, 0, 1)) }}
        </div>
    </div>

    {{-- Profile Body Details --}}
    <div class="profile-body">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 12px;">
            <div>
                <div style="display: flex; align-items: center; gap: 8px;">
                    <h2 style="font-size: 1.5rem; font-weight: 800; color: var(--text-black);">{{ $username }}</h2>
                    <span style="font-size: 0.7rem; font-weight: 600; padding: 2px 8px; border-radius: 9999px; background-color: #ecfdf5; color: #059669; border: 1px solid #a7f3d0;">
                        ● Sesi Aktif
                    </span>
                </div>
                <p style="font-size: 0.85rem; color: var(--text-muted); margin-top: 2px;">
                    {{ $profil['role'] }} &bull; CleanWash Management Dashboard
                </p>
            </div>

            <div style="display: flex; gap: 8px;">
                <a href="{{ route('dashboard', ['username' => $username]) }}" class="btn-outline">
                    &larr; Dashboard
                </a>
                <a href="{{ route('login') }}" class="btn-black" style="width: auto; padding: 10px 16px; font-size: 0.85rem;">
                    Ganti Akun
                </a>
            </div>
        </div>

        <table class="profile-table">
            <tbody>
                <tr>
                    <td>Nama Pengguna</td>
                    <td><strong>{{ $username }}</strong></td>
                </tr>
                <tr>
                    <td>Alamat Email (Simulasi)</td>
                    <td>{{ $profil['email'] }}</td>
                </tr>
                <tr>
                    <td>Peran Sistem</td>
                    <td>{{ $profil['role'] }}</td>
                </tr>
                <tr>
                    <td>Status Akun</td>
                    <td>
                        <span style="color: #059669; font-weight: 700;">
                            {{ $profil['status'] }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>Waktu Terdaftar</td>
                    <td>{{ $profil['bergabung_sejak'] }}</td>
                </tr>
                <tr>
                    <td>Metode Autentikasi</td>
                    <td>HTTP Query Parameter (Murni Tanpa Database)</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
