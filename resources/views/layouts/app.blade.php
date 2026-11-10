<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Dashboard') — CleanWash Spectra</title>
    
    <!-- Google Fonts: Inter & Plus Jakarta Sans (Spectra Typographic Signature) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Custom CSS via helper asset() -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    {{-- 1. Menggunakan Blade Component: <x-navbar /> --}}
    <x-navbar />

    {{-- 2. Menggunakan Direktif Blade: @include untuk menyisipkan sub-view banner --}}
    @include('partials.banner')

    {{-- 3. Area Konten Dinamis menggunakan Direktif @yield --}}
    <main class="main-content">
        <div class="container">
            @yield('content')
        </div>
    </main>

    {{-- 4. Menggunakan Blade Component: <x-footer /> --}}
    <x-footer />
</body>
</html>
