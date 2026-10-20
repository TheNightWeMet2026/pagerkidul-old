# Website Desa Pagerkidul

Website resmi Desa Pagerkidul, Kecamatan Sudimoro, Kabupaten Pacitan, Jawa Timur.
Media informasi, pelayanan publik, transparansi pemerintahan, dan promosi potensi desa.

Repo ini berisi dua versi situs yang berbagi aset dan desain yang sama:

| Bagian | Teknologi | Keterangan |
| --- | --- | --- |
| Frontend statis (root) | HTML + Bootstrap 5 + Chart.js + Leaflet | Halaman publik tanpa backend: `index.html`, `profil.html`, `perangkat.html`, `statistik.html`, `potensi.html`, `umkm.html`, dan `admin.html` (demo frontend) |
| `backend/` | Laravel 12 + Filament 5 | Versi dinamis: konten dikelola dari panel admin `/admin`, data tersimpan di database |

## Menjalankan frontend statis

Cukup serve folder root, misalnya:

```bash
python3 -m http.server 8000
# buka http://localhost:8000
```

## Menjalankan backend (Laravel)

Lihat [backend/README.md](backend/README.md) untuk langkah lengkap
(install, migrasi + seeder, dan login admin).

Ringkasnya:

```bash
cd backend
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
php artisan serve
```

- Situs publik: `http://localhost:8000`
- Panel admin: `http://localhost:8000/admin`
  - Email: `admin@pagerkidul.id`
  - Password bawaan: `password` — **wajib diganti setelah login pertama.**

## Struktur aset

Aset frontend statis ada di `assets/` (root), sedangkan backend memakai
salinannya di `backend/public/assets/`. Jika mengubah `style.css` /
`script.js` / gambar, ubah di kedua tempat agar keduanya tetap sinkron.

## Catatan

- Login di `admin.html` (frontend statis) hanyalah demo berbasis
  `localStorage` — bukan pengaman sungguhan. Pengelolaan konten yang
  sebenarnya dilakukan lewat panel Filament di backend.
- Foto perangkat desa saat ini memakai `assets/images/staff-placeholder.svg`
  karena foto aslinya belum ada di repo; ganti dengan foto asli perangkat.
- `assets/images/desa.JPG` masih berukuran besar (4,5 MB, nama berkas
  memakai huruf kapital `.JPG`); kompres dan samakan namanya menjadi
  `desa.jpg` pada kesempatan berikutnya, lalu perbarui referensinya.
