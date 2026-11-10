@extends('layouts.app')

@section('title', 'Masuk Simulasi')

@section('content')
<div class="login-wrapper">
    <div class="login-card">
        <div class="login-header">
            <div class="icon">🧺</div>
            <h2>Selamat Datang</h2>
            <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 4px;">
                CleanWash Management Dashboard
            </p>
        </div>

        {{-- Form Login: Mengirimkan input username via HTTP GET ke route dashboard --}}
        <form action="{{ route('dashboard') }}" method="GET">
            <div class="form-group">
                <label for="username">Nama Pengguna / Operator</label>
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    class="form-control" 
                    placeholder="Contoh: Budi Santoso" 
                    required 
                    autocomplete="off"
                    autofocus
                >
                <p class="form-text">
                    *Halaman ini mendemonstrasikan request handling tanpa autentikasi database. Nama akan diteruskan ke Dashboard dan Profil.
                </p>
            </div>

            <button type="submit" class="btn btn-primary">
                Masuk ke Dashboard &rarr;
            </button>
        </form>
    </div>
</div>
@endsection

