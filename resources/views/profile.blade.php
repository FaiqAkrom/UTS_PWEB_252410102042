@extends('layouts.app')

@section('title', 'Profil Pengguna')

@section('content')
<div class="page-header" style="text-align: center;">
    <h1>Profil Pengguna Sistem</h1>
    <p>Informasi akun yang diteruskan melalui HTTP Request Parameter.</p>
</div>

<div class="profile-card">
    <div class="profile-header">
        <div class="profile-avatar">
            {{ strtoupper(substr($username, 0, 1)) }}
        </div>
        <div class="profile-title">
            <h2>{{ $username }}</h2>
            <p>{{ $profil['role'] }}</p>
        </div>
    </div>

    <table class="profile-details-table">
        <tbody>
            <tr>
                <td>Username Terdaftar</td>
                <td><strong>{{ $username }}</strong></td>
            </tr>
            <tr>
                <td>Alamat Email (Simulasi)</td>
                <td>{{ $profil['email'] }}</td>
            </tr>
            <tr>
                <td>Status Akun</td>
                <td>
                    <span style="color: var(--success); font-weight: 600;">
                        ● {{ $profil['status'] }}
                    </span>
                </td>
            </tr>
            <tr>
                <td>Terdaftar Sejak</td>
                <td>{{ $profil['bergabung_sejak'] }}</td>
            </tr>
            <tr>
                <td>Metode Autentikasi</td>
                <td>HTTP Query Parameter (Tanpa Database)</td>
            </tr>
        </tbody>
    </table>

    <div style="margin-top: 32px; display: flex; gap: 12px; justify-content: flex-end;">
        <a href="{{ route('dashboard', ['username' => $username]) }}" class="btn" style="background-color: var(--primary-light); color: var(--primary);">
            &larr; Kembali ke Dashboard
        </a>
        <a href="{{ route('login') }}" class="btn" style="background-color: #fee2e2; color: #dc2626;">
            Ganti Akun (Keluar)
        </a>
    </div>
</div>
@endsection

