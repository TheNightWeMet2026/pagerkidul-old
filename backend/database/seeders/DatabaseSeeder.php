<?php

namespace Database\Seeders;

use App\Models\Official;
use App\Models\Potential;
use App\Models\Statistic;
use App\Models\Umkm;
use App\Models\User;
use App\Models\VillageProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * Idempotent: safe to run more than once (uses updateOrCreate).
     *
     * Default admin (change the password after first login!):
     *   email:    admin@pagerkidul.id
     *   password: password
     */
    public function run(): void
    {
        // --- Admin user for the Filament panel (/admin) ---
        // canAccessPanel() requires is_admin = true, so a plain
        // factory user could never log in. Seed a real admin.
        User::updateOrCreate(
            ['email' => 'admin@pagerkidul.id'],
            [
                'name' => 'Admin Desa Pagerkidul',
                'password' => Hash::make('password'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]
        );

        // --- Village profile (content taken from the static site) ---
        VillageProfile::updateOrCreate(
            ['village_name' => 'Desa Pagerkidul'],
            [
                'description' => 'Desa Pagerkidul merupakan salah satu desa di Kabupaten Pacitan yang terus mengembangkan pelayanan publik berbasis informasi. Website ini menjadi media penyampaian profil desa, statistik kependudukan, transparansi pemerintahan, dan informasi bagi masyarakat.',
                'vision' => 'Mewujudkan Desa Pagerkidul yang maju, mandiri, transparan, sejahtera, dan berbasis teknologi informasi.',
                'missions' => implode("\n", [
                    'Mewujudkan pemerintahan desa yang transparan dan akuntabel.',
                    'Meningkatkan pelayanan publik berbasis digital.',
                    'Mengembangkan potensi desa dan ekonomi masyarakat.',
                    'Menyediakan informasi desa yang terpercaya dan mudah diakses.',
                ]),
                'address' => 'Desa Pagerkidul, Kecamatan Sudimoro, Kabupaten Pacitan, Jawa Timur',
                'phone' => '(0357) 000000',
                'email' => 'desa@pagerkidul.id',
                'service_hours' => 'Senin–Jumat, 08.00–15.00 WIB',
            ]
        );

        // --- Officials ---
        $officials = [
            ['name' => 'Nama Kepala Desa', 'position' => 'Kepala Desa', 'sort_order' => 0],
            ['name' => 'Nama Sekretaris', 'position' => 'Sekretaris Desa', 'sort_order' => 1],
            ['name' => 'Nama Kasi', 'position' => 'Kasi Pemerintahan', 'sort_order' => 2],
            ['name' => 'Nama Kaur', 'position' => 'Kaur Keuangan', 'sort_order' => 3],
            ['name' => 'Nama Kadus', 'position' => 'Kepala Dusun', 'sort_order' => 4],
        ];

        foreach ($officials as $official) {
            Official::updateOrCreate(
                ['name' => $official['name'], 'position' => $official['position']],
                ['sort_order' => $official['sort_order'], 'is_active' => true]
            );
        }

        // --- Statistics (same figures the static statistik page charts) ---
        $statistics = [
            'gender' => [
                ['label' => 'Laki-laki', 'value' => 1635],
                ['label' => 'Perempuan', 'value' => 1605],
            ],
            'education' => [
                ['label' => 'SD', 'value' => 950],
                ['label' => 'SMP', 'value' => 700],
                ['label' => 'SMA', 'value' => 1200],
                ['label' => 'D3/S1', 'value' => 390],
            ],
            'occupation' => [
                ['label' => 'Petani', 'value' => 900],
                ['label' => 'Nelayan', 'value' => 350],
                ['label' => 'UMKM', 'value' => 280],
                ['label' => 'PNS', 'value' => 110],
                ['label' => 'Pelajar', 'value' => 600],
            ],
            'age' => [
                ['label' => '0-14', 'value' => 420],
                ['label' => '15-24', 'value' => 580],
                ['label' => '25-44', 'value' => 1030],
                ['label' => '45-59', 'value' => 720],
                ['label' => '60+', 'value' => 490],
            ],
        ];

        foreach ($statistics as $group => $items) {
            foreach ($items as $i => $item) {
                Statistic::updateOrCreate(
                    ['group' => $group, 'label' => $item['label']],
                    ['value' => $item['value'], 'sort_order' => $i, 'is_active' => true]
                );
            }
        }

        // --- Potentials ---
        $potentials = [
            ['title' => 'Pertanian', 'category' => 'pertanian', 'description' => 'Komoditas utama berupa padi, jagung, dan singkong yang menjadi sumber penghasilan masyarakat.'],
            ['title' => 'Peternakan', 'category' => 'peternakan', 'description' => 'Peternakan kambing dan sapi menjadi salah satu sektor ekonomi unggulan masyarakat desa.'],
            ['title' => 'UMKM', 'category' => 'lainnya', 'description' => 'Berbagai produk olahan pangan dan kerajinan lokal terus dikembangkan oleh masyarakat.'],
            ['title' => 'Wisata Alam', 'category' => 'wisata', 'description' => 'Memiliki panorama alam yang masih asri dan berpotensi menjadi destinasi wisata berbasis desa.'],
        ];

        foreach ($potentials as $i => $potential) {
            Potential::updateOrCreate(
                ['title' => $potential['title']],
                [...$potential, 'sort_order' => $i, 'is_active' => true]
            );
        }

        // --- UMKM ---
        $umkms = [
            [
                'product_name' => 'Keripik Singkong',
                'business_name' => 'UMKM Makmur Jaya',
                'owner_name' => 'Pak Ahmad',
                'category' => 'makanan',
                'hamlet' => 'Krajan',
                'production_type' => 'Rumahan',
                'description' => 'Keripik singkong khas Desa Pagerkidul diproduksi menggunakan singkong lokal pilihan dengan cita rasa gurih dan tanpa bahan pengawet.',
            ],
            [
                'product_name' => 'Jahe Instan',
                'business_name' => 'Kelompok Wanita Tani',
                'owner_name' => 'Ibu Siti',
                'category' => 'minuman',
                'hamlet' => 'Pager',
                'production_type' => 'Kelompok UMKM',
                'description' => 'Minuman herbal berbahan jahe merah, gula aren dan rempah-rempah pilihan yang diproduksi secara higienis oleh masyarakat Desa Pagerkidul.',
            ],
            [
                'product_name' => 'Anyaman Bambu',
                'business_name' => 'UMKM Sumber Rejeki',
                'owner_name' => 'Pak Joko',
                'category' => 'kerajinan',
                'hamlet' => 'Kidul',
                'production_type' => 'Manual',
                'description' => 'Kerajinan bambu berupa tempat tisu, keranjang, besek, dan berbagai produk dekoratif yang dibuat secara manual oleh pengrajin lokal.',
            ],
        ];

        foreach ($umkms as $i => $umkm) {
            Umkm::updateOrCreate(
                ['product_name' => $umkm['product_name']],
                [...$umkm, 'sort_order' => $i, 'is_active' => true]
            );
        }
    }
}
