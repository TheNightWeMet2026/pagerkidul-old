<?php

namespace Tests\Feature;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(DatabaseSeeder::class);
    }

    public function test_all_public_pages_return_successful_response(): void
    {
        foreach (['/', '/profil', '/perangkat-desa', '/statistik', '/potensi', '/umkm'] as $url) {
            $this->get($url)->assertOk();
        }
    }

    public function test_seeder_creates_an_admin_who_can_access_the_panel(): void
    {
        $admin = \App\Models\User::where('email', 'admin@pagerkidul.id')->first();

        $this->assertNotNull($admin);
        $this->assertTrue($admin->is_admin);
    }

    public function test_homepage_shows_seeded_content(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Desa Pagerkidul');
    }
}
