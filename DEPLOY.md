# Deploy ke Cloudflare Pages

Website statis Desa Pagerkidul di-deploy dari repo ini via Cloudflare Pages.
Folder `backend/` (Laravel) TIDAK ikut ter-deploy — Cloudflare Pages hanya
melayani file statis. Backend membutuhkan hosting PHP terpisah.

## Pengaturan Cloudflare Pages

Di dashboard Cloudflare → Workers & Pages → Create → Pages → Connect to Git →
pilih repo `pagerkidul-old`, lalu isi:

| Pengaturan            | Nilai            |
| --------------------- | ---------------- |
| Production branch     | `main`           |
| Framework preset      | None             |
| Build command         | `bash deploy.sh` |
| Build output directory| `dist`           |
| Root directory        | *(kosongkan)*    |

`deploy.sh` menyalin hanya halaman publik + folder `assets/` ke `dist/`.
`admin.html` (demo frontend-only berisi data dummy) dan `backend/` sengaja
tidak disalin, jadi tidak bisa diakses publik. Tombol "Login Admin" dan
script demo login (`admin-login-ui.js`, kredensial demo hardcoded) juga
sudah dihapus dari halaman publik — hosting statis tidak punya backend
admin. Nanti bila backend Laravel sudah di-hosting, tombol login bisa
ditambahkan lagi mengarah ke panel Filament yang asli.

Setiap push ke `main` setelah ini akan otomatis ter-deploy ulang.

## Checklist foto (tugas pemilik repo)

Dua file foto berikut belum ada di repo dan harus ditambahkan manual ke
folder `assets/images/` dengan nama persis seperti ini (peka huruf besar/kecil):

1. `desa.JPG` — foto hero (28 referensi di halaman). Pakai versi kompres
   (~111 KB, lebar 1920px), bukan file asli 4,5 MB.
2. `foto.jpg` — foto Kepala Desa di `perangkat.html` (5 referensi).

Tanpa dua file ini, bagian foto tersebut akan tampil kosong (404) di website
yang sudah ter-deploy. File lain (`logo-pacitan.jpg` dan
`staff-placeholder.svg` untuk foto perangkat desa yang belum ada foto aslinya)
sudah tersedia di repo.

## Catatan

- Link media sosial di footer masih `#` (placeholder) — isi dengan URL asli
  bila sudah ada akun resmi desa.
- Nama perangkat desa di `perangkat.html` masih placeholder sampai data
  resmi tersedia.
