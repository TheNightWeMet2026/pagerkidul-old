# Backend — Website Desa Pagerkidul (Laravel + Filament)

Backend dinamis website Desa Pagerkidul. Konten publik (profil desa,
perangkat, statistik, potensi, UMKM) dikelola melalui panel admin
Filament dan ditampilkan di halaman publik Blade.

## Kebutuhan

- PHP ^8.2
- Composer
- SQLite (bawaan) atau MySQL

## Instalasi

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite   # jika memakai SQLite (bawaan)
php artisan migrate --seed
php artisan storage:link         # wajib agar foto unggahan tampil
php artisan serve
```

## URL

| URL | Keterangan |
| --- | --- |
| `/` | Beranda |
| `/profil` | Profil desa |
| `/perangkat-desa` | Perangkat desa |
| `/statistik` | Statistik penduduk |
| `/potensi` | Potensi desa |
| `/umkm` | UMKM desa |
| `/admin` | Panel admin Filament |

## Akun admin bawaan (seeder)

Setelah `php artisan migrate --seed`:

- Email: `admin@pagerkidul.id`
- Password: `password`

**Segera ganti password setelah login pertama.**
Hanya user dengan `is_admin = true` yang bisa masuk panel
(lihat `App\Models\User::canAccessPanel`).

Seeder juga mengisi konten awal yang sama dengan situs statis:
profil desa, 5 perangkat, statistik (gender/pendidikan/pekerjaan/umur),
4 potensi, dan 3 UMKM. Seeder aman dijalankan berulang
(menggunakan `updateOrCreate`).

## Tes

```bash
php artisan test
```

Tes memakai SQLite in-memory (lihat `phpunit.xml`).

## Teknologi

Laravel 12, Filament 5, Bootstrap 5.
