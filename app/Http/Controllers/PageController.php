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
        // Ambil input username, hilangkan spasi, fallback ke 'Tamu' jika kosong
        $rawUsername = trim($request->input('username', ''));
        $username = $rawUsername !== '' ? $rawUsername : 'Tamu';

        // Data ringkasan laundry statis (simulasi metrik dashboard tanpa database)
        $ringkasan = [
            'total_layanan' => 3,
            'pesanan_proses' => 12,
            'pesanan_selesai' => 48,
            'status_operasional' => 'Buka Normal',
        ];

        // Data grafik beban cucian mingguan (dipindahkan dari view)
        $mingguan = [
            ['day' => 'Sen', 'h1' => 60, 'h2' => 80, 'h3' => 45],
            ['day' => 'Sel', 'h1' => 75, 'h2' => 90, 'h3' => 55],
            ['day' => 'Rab', 'h1' => 85, 'h2' => 70, 'h3' => 65],
            ['day' => 'Kam', 'h1' => 65, 'h2' => 85, 'h3' => 50],
            ['day' => 'Jum', 'h1' => 95, 'h2' => 90, 'h3' => 80],
            ['day' => 'Sab', 'h1' => 80, 'h2' => 75, 'h3' => 70],
            ['day' => 'Min', 'h1' => 70, 'h2' => 85, 'h3' => 60],
        ];

        // Data aktivitas operasional terbaru untuk dirender dengan @foreach
        $aktivitas = [
            [
                'teks' => 'Order Cuci Setrika 4kg selesai disetrika uap',
                'waktu' => '15 menit yang lalu',
                'sumber' => 'Operator Stasiun A',
                'warna' => '#10b981',
            ],
            [
                'teks' => 'Pencucian 6kg Cuci Kering masuk mesin pengering',
                'waktu' => '40 menit yang lalu',
                'sumber' => 'Mesin 03',
                'warna' => '#0ea5e9',
            ],
            [
                'teks' => 'Order Setrika Saja 3kg telah diambil oleh pelanggan',
                'waktu' => '2 jam yang lalu',
                'sumber' => 'Kasir Laundry',
                'warna' => '#f97316',
            ],
        ];

        return view('dashboard', compact('username', 'ringkasan', 'mingguan', 'aktivitas'));
    }

    /**
     * Menampilkan halaman Pengelolaan Layanan Laundry.
     * Menggunakan array data statis lengkap dengan styling aksen untuk dirender di Blade.
     */
    public function pengelolaan()
    {
        // Array statis daftar layanan laundry beserta class aksen warnanya
        $layanan = [
            [
                'id' => 1,
                'nama' => 'Cuci Kering',
                'kategori' => 'Reguler',
                'harga' => 7000,
                'satuan' => 'kg',
                'estimasi' => '2 Hari',
                'deskripsi' => 'Pencucian pakaian dengan deterjen cair higienis dan pengeringan optimal hingga siap lipat.',
                'aksen' => [
                    'bar' => 'accent-emerald',
                    'badge' => 'badge-emerald',
                ],
            ],
            [
                'id' => 2,
                'nama' => 'Cuci Setrika',
                'kategori' => 'Komplit',
                'harga' => 10000,
                'satuan' => 'kg',
                'estimasi' => '1-2 Hari',
                'deskripsi' => 'Paket komplit pencucian bersih, pengeringan, serta penyetrikaan uap dengan pewangi tahan lama.',
                'aksen' => [
                    'bar' => 'accent-sky',
                    'badge' => 'badge-sky',
                ],
            ],
            [
                'id' => 3,
                'nama' => 'Setrika Saja',
                'kategori' => 'Finishing',
                'harga' => 5000,
                'satuan' => 'kg',
                'estimasi' => '1 Hari',
                'deskripsi' => 'Penyetrikaan profesional pakaian bersih hingga rapi, licin, dan siap pakai langsung.',
                'aksen' => [
                    'bar' => 'accent-orange',
                    'badge' => 'badge-orange',
                ],
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
        // Ambil input username, hilangkan spasi, fallback ke 'Tamu' jika kosong
        $rawUsername = trim($request->input('username', ''));
        $username = $rawUsername !== '' ? $rawUsername : 'Tamu';

        // Buat prefix email dari username; jika karakter kosong, gunakan 'user' sebagai cadangan
        $emailPrefix = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $username));
        if ($emailPrefix === '') {
            $emailPrefix = 'user';
        }

        $profil = [
            'role' => 'Operator / Pengguna Simulasi',
            'email' => $emailPrefix . '@laundry-uts.test',
            'status' => 'Aktif',
            'bergabung_sejak' => 'November 2026',
        ];

        return view('profile', compact('username', 'profil'));
    }
}
