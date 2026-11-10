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
     * Uji Halaman Dashboard dengan parameter username.
     */
    public function test_halaman_dashboard_menerima_username(): void
    {
        $response = $this->get('/dashboard?username=Budi');
        $response->assertStatus(200);
        $response->assertSee('Budi');
        $response->assertSee('Total Layanan');
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
    }

    /**
     * Uji Halaman Profile menampilkan username.
     */
    public function test_halaman_profile_menampilkan_username(): void
    {
        $response = $this->get('/profile?username=Budi');
        $response->assertStatus(200);
        $response->assertSee('Budi');
        $response->assertSee('Operator / Pengguna Simulasi');
    }
}
