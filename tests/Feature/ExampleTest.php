<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * Uji Halaman Login (Root & /login).
     */
    public function test_halaman_login_bisa_diakses(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('CleanWash');

        $responseLogin = $this->get('/login');
        $responseLogin->assertStatus(200);
    }

    /**
     * Uji Halaman Dashboard dengan parameter username dan data controller.
     */
    public function test_halaman_dashboard_menerima_username(): void
    {
        $response = $this->get('/dashboard?username=Budi');
        $response->assertStatus(200);
        $response->assertSee('Budi');
        $response->assertSee('Total Layanan');
        // Pastikan data mingguan dan aktivitas dari controller ter-render
        $response->assertSee('Distribusi Beban Cucian Mingguan');
        $response->assertSee('Order Cuci Setrika 4kg selesai disetrika uap');
    }

    /**
     * Uji Halaman Dashboard dengan username spasi kosong (fallback 'Tamu').
     */
    public function test_halaman_dashboard_fallback_username_kosong(): void
    {
        $response = $this->get('/dashboard?username=%20%20%20');
        $response->assertStatus(200);
        $response->assertSee('Tamu');
    }

    /**
     * Uji Halaman Pengelolaan me-render array layanan dengan @foreach.
     */
    public function test_halaman_pengelolaan_merender_daftar_layanan(): void
    {
        $response = $this->get('/pengelolaan');
        $response->assertStatus(200);
        $response->assertSee('Cuci Kering');
        $response->assertSee('Cuci Setrika');
        $response->assertSee('Setrika Saja');
        $response->assertSee('accent-emerald');
    }

    /**
     * Uji Halaman Profile menampilkan username dan email fallback.
     */
    public function test_halaman_profile_menampilkan_username(): void
    {
        $response = $this->get('/profile?username=Budi');
        $response->assertStatus(200);
        $response->assertSee('Budi');
        $response->assertSee('budi@laundry-uts.test');
        $response->assertSee('Operator / Pengguna Simulasi');
    }

    /**
     * Uji Halaman Profile dengan username simbol (fallback email 'user').
     */
    public function test_halaman_profile_email_fallback_simbol(): void
    {
        $response = $this->get('/profile?username=***');
        $response->assertStatus(200);
        $response->assertSee('user@laundry-uts.test');
    }
}
