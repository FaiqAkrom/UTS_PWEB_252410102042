# UTS Pemrograman Web 2026 — Laundry Management Dashboard (CleanWash)

Aplikasi web simulasi dashboard pengelolaan laundry berbasis **Laravel Murni**, arsitektur **MVC**, **Blade Templating Engine**, dan **Vanilla CSS**.

> **Dokumentasi Lengkap Proyek & Panduan Responsi:**  
> Silakan baca file [README_ROUTING_CONTROLLER.md](README_ROUTING_CONTROLLER.md) untuk penjelasan mendalam mengenai alur arsitektur, bedah baris kode, kepatuhan batasan UTS, dan panduan menjawab pertanyaan penguji.

---

## Ringkasan Fitur & 9 File Wajib

1. `routes/web.php` — Definisi rute GET login, dashboard, pengelolaan, dan profile.
2. `app/Http/Controllers/PageController.php` — Single controller pemroses request dan penyedia array statis.
3. `resources/views/layouts/app.blade.php` — Master template layout (`@yield`, `@include`, `<x-component>`).
4. `resources/views/components/navbar.blade.php` — Komponen navigasi atas dengan indikator aktif & badge user.
5. `resources/views/components/footer.blade.php` — Komponen footer hak cipta.
6. `resources/views/login.blade.php` — Form simulasi login pengirim nama via GET query parameter.
7. `resources/views/dashboard.blade.php` — Sapaan personal dan ringkasan metrik laundry statis.
8. `resources/views/pengelolaan.blade.php` — Katalog layanan laundry (Cuci Kering, Cuci Setrika, Setrika Saja) dirender via `@foreach`.
9. `resources/views/profile.blade.php` — Informasi profil pengguna berdasarkan request parameter.

## Cara Menjalankan Proyek di Komputer Lokal

```bash
# Jalankan server pengembangan Laravel
php artisan serve
```

Akses aplikasi melalui peramban web di: `http://127.0.0.1:8000`
