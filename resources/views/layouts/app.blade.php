<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Laundry Management Dashboard') — CleanWash</title>
    
    {{-- Memanggil file CSS eksternal menggunakan helper asset() --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    {{-- 1. Menggunakan Blade Component: <x-navbar /> --}}
    <x-navbar />

    {{-- 2. Menggunakan Direktif Blade: @include untuk menyisipkan sub-view --}}
    @include('partials.banner')

    {{-- 3. Area Konten Dinamis menggunakan Direktif @yield --}}
    <main class="main-content">
        <div class="container">
            @yield('content')
        </div>
    </main>

    {{-- 4. Menggunakan Blade Component: <x-footer /> --}}
    <x-footer />

    @yield('scripts')
</body>
</html>

