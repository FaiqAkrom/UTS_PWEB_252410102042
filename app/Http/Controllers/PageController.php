<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Menampilkan halaman Login awal.
     * Tidak memerlukan autentikasi database, hanya form input username.
     */
    public function login()
    {
        return view('login');
    }

    /**
     * Menampilkan Dashboard utama.
     * Menerima request parameter 'username' dan menyajikan data ringkasan statis.
     */
    public function dashboard(Request $request)
    {
        // Mengambil username dari request query/input, dengan fallback 'Tamu' jika kosong
        $username = $request->input('username', 'Tamu');

        // Data ringkasan laundry statis (simulasi metrik dashboard tanpa database)
        $ringkasan = [
            'total_layanan' => 3,
            'pesanan_proses' => 12,
            'pesanan_selesai' => 48,
            'status_operasional' => 'Buka Normal',
        ];

        return view('dashboard', compact('username', 'ringkasan'));
    }

    /**
     * Menampilkan halaman Pengelolaan Layanan Laundry.
     * Menggunakan array data statis untuk dirender dengan @foreach di Blade.
     */
    public function pengelolaan()
    {
        // Array statis daftar layanan laundry sesuai ketentuan proyek
        $layanan = [
            [
                'id' => 1,
                'nama' => 'Cuci Kering',
                'kategori' => 'Reguler',
                'harga' => 7000,
                'satuan' => 'kg',
                'estimasi' => '2 Hari',
                'deskripsi' => 'Pencucian pakaian dengan deterjen cair higienis dan pengeringan optimal hingga siap lipat.',
            ],
            [
                'id' => 2,
                'nama' => 'Cuci Setrika',
                'kategori' => 'Komplit',
                'harga' => 10000,
                'satuan' => 'kg',
                'estimasi' => '1-2 Hari',
                'deskripsi' => 'Paket komplit pencucian bersih, pengeringan, serta penyetrikaan uap dengan pewangi tahan lama.',
            ],
            [
                'id' => 3,
                'nama' => 'Setrika Saja',
                'kategori' => 'Finishing',
                'harga' => 5000,
                'satuan' => 'kg',
                'estimasi' => '1 Hari',
                'deskripsi' => 'Penyetrikaan profesional pakaian bersih hingga rapi, licin, dan siap pakai langsung.',
            ],
        ];

        return view('pengelolaan', compact('layanan'));
    }

    /**
     * Menampilkan halaman Profil pengguna.
     * Menampilkan username yang diteruskan melalui parameter request.
     */
    public function profile(Request $request)
    {
        $username = $request->input('username', 'Tamu');

        $profil = [
            'role' => 'Operator / Pengguna Simulasi',
            'email' => strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $username)) . '@laundry-uts.test',
            'status' => 'Aktif',
            'bergabung_sejak' => 'November 2026',
        ];

        return view('profile', compact('username', 'profil'));
    }
}
