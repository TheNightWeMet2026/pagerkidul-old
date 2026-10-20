# TODO - Split Pages (Landing + Detail Pages)

## Step 0 - Backup (completed)
- [x] Buat branch backup/before-split-pages
- [x] Push ke GitHub

## Step 1 - Landing page (index.html)
- [x] Potong index.html agar berisi: NAVBAR + HERO + PROFIL (ringkas sampai visi-misi) + DIVIDER + LOKASI (di bagian bawah) + FOOTER
- [x] Update navbar link:
  - Home -> index.html
  - Profil Desa -> profil.html
  - Perangkat Desa -> perangkat.html
  - Statistik -> statistik.html
  - Potensi -> potensi.html
  - UMKM -> umkm.html
  - Lokasi -> index.html
- [x] Update footer menu link senada

## Step 2 - Buat halaman baru
- [x] Buat `profil.html`
  - Berisi profil lengkap (deskripsi + visi + misi + tombol/CTA yang relevan)
- [x] Buat `perangkat.html`
  - Berisi section perangkat desa dari index
- [x] Buat `statistik.html`
  - Berisi section statistik + canvas chart ids: pendidikanChart, pekerjaanChart, genderChart, umurChart
- [x] Buat `potensi.html`
  - Berisi section potensi
- [x] Buat `umkm.html`
  - Berisi section UMKM showcase

## Step 3 - Konsistensi layout & assets
- [x] Pastikan tiap halaman memuat:
  - Bootstrap + style.css
  - script.js (untuk chart/map/lightbox; chart/map akan auto-aman karena ada guard)
  - AOS init
  - Leaflet init hanya kalau halaman punya map element (script.js sudah guard)
  - GLightbox hanya jika diperlukan (potensi/galeri)

## Step 4 - Pengujian
- [x] Buka masing-masing halaman dan cek:
  - Link navbar bekerja
  - Chart tampil di statistik.html
  - Map tampil jika ada id="map" (landing/local)
  - Tidak ada error console

## Step 5 - (Opsional) perapihan
- [x] Rapikan link yang sebelumnya menuju `#galeri` (di index tidak ada section #galeri)
- [x] Buat 301/redirect jika dibutuhkan (opsional)
- [x] Lokasi tetap di landing `index.html`

