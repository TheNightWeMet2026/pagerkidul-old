@extends('layouts.app')

@section(
    'title',
    $profile?->village_name ?? 'Desa Pagerkidul'
)

@section(
    'meta_description',
    'Website resmi Desa Pagerkidul sebagai media informasi, pelayanan publik, transparansi pemerintahan, dan promosi potensi desa.'
)

@section('content')

    {{-- HERO SLIDER --}}
    <section class="hero-slider position-relative text-white">
        <div
            id="homeHeroCarousel"
            class="carousel slide carousel-fade"
            data-bs-ride="carousel"
            data-bs-interval="5000"
        >
            {{-- Indikator --}}
            <div class="carousel-indicators">
                <button
                    type="button"
                    data-bs-target="#homeHeroCarousel"
                    data-bs-slide-to="0"
                    class="active"
                    aria-current="true"
                    aria-label="Slide 1"
                ></button>

                <button
                    type="button"
                    data-bs-target="#homeHeroCarousel"
                    data-bs-slide-to="1"
                    aria-label="Slide 2"
                ></button>

                <button
                    type="button"
                    data-bs-target="#homeHeroCarousel"
                    data-bs-slide-to="2"
                    aria-label="Slide 3"
                ></button>
            </div>

            <div class="carousel-inner">

                {{-- Slide 1 --}}
                <div class="carousel-item active">
                    <img
                        src="{{ asset('assets/images/haldesa.jpeg') }}"
                        class="d-block w-100 hero-slide-image"
                        alt="Pemandangan Desa Pagerkidul"
                    >
                </div>

                {{-- Slide 2 --}}
                <div class="carousel-item">
                    <img
                        src="{{ asset('assets/images/darkcloud.jpg') }}"
                        class="d-block w-100 hero-slide-image"
                        alt="Potensi Desa Pagerkidul"
                    >
                </div>

                {{-- Slide 3 --}}
                <div class="carousel-item">
                    <img
                        src="{{ asset('assets/images/desa.jpg') }}"
                        class="d-block w-100 hero-slide-image"
                        alt="Kegiatan masyarakat Desa Pagerkidul"
                    >
                </div>
            </div>

            {{-- Overlay --}}
            <div class="hero-overlay"></div>

            {{-- Konten Hero --}}
            <div class="hero-content">
                <div class="container">
                    <div class="col-lg-8">
                        <span class="badge bg-light text-success mb-3 px-3 py-2">
                            Website Resmi Pemerintah Desa
                        </span>

                        <h1 class="display-3 fw-bold mb-4">
                            Selamat Datang di
                            {{ $profile?->village_name ?? 'Desa Pagerkidul' }}
                        </h1>

                        <p class="lead mb-4">
                            {{ $profile?->description
                                ?: 'Portal informasi dan pelayanan digital Desa Pagerkidul yang menghadirkan profil desa, data kependudukan, potensi lokal, serta informasi pemerintahan secara terbuka dan mudah diakses.' }}
                        </p>

                        <a
                            href="{{ route('profile.index') }}"
                            class="btn btn-light btn-lg me-2 mb-2"
                        >
                            Lihat Profil
                        </a>

                        <a
                            href="{{ route('potentials.index') }}"
                            class="btn btn-outline-light btn-lg mb-2"
                        >
                            Potensi Desa
                        </a>
                    </div>
                </div>
            </div>

            {{-- Tombol kiri --}}
            <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#homeHeroCarousel"
                data-bs-slide="prev"
            >
                <span
                    class="carousel-control-prev-icon"
                    aria-hidden="true"
                ></span>

                <span class="visually-hidden">
                    Sebelumnya
                </span>
            </button>

            {{-- Tombol kanan --}}
            <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#homeHeroCarousel"
                data-bs-slide="next"
            >
                <span
                    class="carousel-control-next-icon"
                    aria-hidden="true"
                ></span>

                <span class="visually-hidden">
                    Berikutnya
                </span>
            </button>
        </div>
    </section>


    {{-- INFORMASI DESA --}}
    <section class="py-5">
        <div class="container">
            <div class="section-title text-center mb-5">
                <span>Informasi Desa</span>
                <h2>Desa Pagerkidul dalam Angka</h2>
            </div>

            <div class="row g-4 text-center">
                <div class="col-lg-3 col-md-6">
                    <article class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <i class="fa-solid fa-users fa-2x mb-3"></i>

                            <h2>
                                {{ number_format($population, 0, ',', '.') }}
                            </h2>

                            <p class="mb-0">
                                Jumlah Penduduk
                            </p>
                        </div>
                    </article>
                </div>

                <div class="col-lg-3 col-md-6">
                    <article class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <i class="fa-solid fa-user-tie fa-2x mb-3"></i>

                            <h2>
                                {{ $officialCount }}
                            </h2>

                            <p class="mb-0">
                                Perangkat Desa
                            </p>
                        </div>
                    </article>
                </div>

                <div class="col-lg-3 col-md-6">
                    <article class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <i class="fa-solid fa-seedling fa-2x mb-3"></i>

                            <h2>
                                {{ $potentialCount }}
                            </h2>

                            <p class="mb-0">
                                Potensi Desa
                            </p>
                        </div>
                    </article>
                </div>

                <div class="col-lg-3 col-md-6">
                    <article class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <i class="fa-solid fa-store fa-2x mb-3"></i>

                            <h2>
                                {{ $umkmCount }}
                            </h2>

                            <p class="mb-0">
                                UMKM Desa
                            </p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>


    {{-- PERANGKAT DESA --}}
    <section class="py-5 bg-light">
        <div class="container">
            <div class="section-title text-center mb-5">
                <span>Pemerintah Desa</span>

                <h2>Perangkat Desa</h2>

                <p>
                    Aparatur pemerintah desa yang memberikan pelayanan
                    kepada masyarakat.
                </p>
            </div>

            <div class="row g-4 justify-content-center">
                @forelse ($officials as $official)
                    <div class="col-lg-3 col-md-6">
                        <article class="card border-0 shadow-sm h-100 text-center">
                            <img
                                src="{{ $official->photo
                                    ? asset('storage/' . $official->photo)
                                    : asset('assets/images/desa.jpg') }}"
                                class="card-img-top"
                                alt="Foto {{ $official->name }}"
                                style="height: 280px; object-fit: cover;"
                            >

                            <div class="card-body">
                                <h5>
                                    {{ $official->name }}
                                </h5>

                                <p class="text-muted mb-0">
                                    {{ $official->position }}
                                </p>
                            </div>
                        </article>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-light text-center">
                            Data perangkat desa belum tersedia.
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-4">
                <a
                    href="{{ route('officials.index') }}"
                    class="btn btn-success"
                >
                    Lihat Semua Perangkat
                </a>
            </div>
        </div>
    </section>


    {{-- POTENSI DESA --}}
    <section class="py-5">
        <div class="container">
            <div class="section-title text-center mb-5">
                <span>Potensi Unggulan</span>

                <h2>Potensi Desa</h2>

                <p>
                    Potensi lokal yang dapat dikembangkan untuk mendukung
                    pertumbuhan ekonomi masyarakat.
                </p>
            </div>

            <div class="row g-4">
                @forelse ($potentials as $potential)
                    <div class="col-lg-4 col-md-6">
                        <article class="card border-0 shadow-sm h-100">
                            <img
                                src="{{ $potential->image
                                    ? asset('storage/' . $potential->image)
                                    : asset('assets/images/desa.jpg') }}"
                                class="card-img-top"
                                alt="{{ $potential->title }}"
                                style="height: 240px; object-fit: cover;"
                            >

                            <div class="card-body">
                                <span class="badge text-bg-success mb-3">
                                    {{ ucfirst($potential->category) }}
                                </span>

                                <h4>
                                    {{ $potential->title }}
                                </h4>

                                <p>
                                    {{ \Illuminate\Support\Str::limit(
                                        $potential->description,
                                        130
                                    ) }}
                                </p>
                            </div>
                        </article>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-light text-center">
                            Data potensi desa belum tersedia.
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-4">
                <a
                    href="{{ route('potentials.index') }}"
                    class="btn btn-success"
                >
                    Lihat Semua Potensi
                </a>
            </div>
        </div>
    </section>


    {{-- UMKM --}}
    <section class="py-5 bg-light">
        <div class="container">
            <div class="section-title text-center mb-5">
                <span>Produk Lokal</span>

                <h2>UMKM Desa</h2>

                <p>
                    Produk dan usaha masyarakat Desa Pagerkidul yang siap
                    berkembang dan dikenal lebih luas.
                </p>
            </div>

            <div class="row g-4">
                @forelse ($umkms as $umkm)
                    <div class="col-lg-4 col-md-6">
                        <article class="card border-0 shadow-sm h-100">
                            <img
                                src="{{ $umkm->image
                                    ? asset('storage/' . $umkm->image)
                                    : asset('assets/images/desa.jpg') }}"
                                class="card-img-top"
                                alt="{{ $umkm->product_name }}"
                                style="height: 240px; object-fit: cover;"
                            >

                            <div class="card-body">
                                <span class="badge text-bg-success mb-3">
                                    {{ ucfirst($umkm->category) }}
                                </span>

                                <h4>
                                    {{ $umkm->product_name }}
                                </h4>

                                @if ($umkm->business_name)
                                    <p class="fw-semibold mb-2">
                                        {{ $umkm->business_name }}
                                    </p>
                                @endif

                                <p>
                                    {{ \Illuminate\Support\Str::limit(
                                        $umkm->description ?? '',
                                        130
                                    ) }}
                                </p>
                            </div>
                        </article>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-light text-center">
                            Data UMKM belum tersedia.
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-4">
                <a
                    href="{{ route('umkms.index') }}"
                    class="btn btn-success"
                >
                    Lihat Semua UMKM
                </a>
            </div>
        </div>
    </section>


    {{-- INFORMASI PELAYANAN --}}
    <section class="py-5">
        <div class="container">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5">
                    <div class="row g-4">
                        <div class="col-lg-7">
                            <span class="badge text-bg-success mb-3">
                                Pelayanan Desa
                            </span>

                            <h2 class="mb-3">
                                Informasi Pelayanan Pemerintah Desa
                            </h2>

                            <p class="mb-0">
                                Masyarakat dapat menghubungi pemerintah desa
                                melalui informasi kontak berikut.
                            </p>
                        </div>

                       <div class="col-lg-5">
                            <p>
                                <strong>
                                    <i class="fa-solid fa-location-dot me-2"></i>
                                    Alamat
                                </strong>
                                <br>
                                {{ $profile?->address ?: 'Belum tersedia' }}
                            </p>

                            @if ($profile?->phone)
                                @php
                                    $whatsapp = preg_replace('/[^0-9]/', '', $profile->phone);

                                    if (str_starts_with($whatsapp, '0')) {
                                        $whatsapp = '62' . substr($whatsapp, 1);
                                    }
                                @endphp

                                <p>
                                    <strong>
                                        <i class="fa-brands fa-whatsapp me-2"></i>
                                        WhatsApp
                                    </strong>
                                    <br>

                                    <a
                                        href="https://wa.me/{{ $whatsapp }}?text={{ urlencode('Halo, saya ingin menanyakan informasi pelayanan Desa Pagerkidul.') }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="text-decoration-none"
                                    >
                                        {{ $profile->phone }}
                                    </a>
                                </p>
                            @else
                                <p>
                                    <strong>
                                        <i class="fa-brands fa-whatsapp me-2"></i>
                                        WhatsApp
                                    </strong>
                                    <br>
                                    Belum tersedia
                                </p>
                            @endif

                            <p>
                                <strong>
                                    <i class="fa-solid fa-envelope me-2"></i>
                                    Email
                                </strong>
                                <br>
                                {{ $profile?->email ?: 'Belum tersedia' }}
                            </p>

                            <p class="mb-0">
                                <strong>
                                    <i class="fa-solid fa-clock me-2"></i>
                                    Jam Pelayanan
                                </strong>
                                <br>
                                {{ $profile?->service_hours ?: 'Belum tersedia' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="py-5 bg-light">
        <div class="container">
            <div class="section-title text-center mb-4">
                <span>Lokasi</span>

                <h2>Peta Lokasi Balai Desa</h2>

                <p>
                    Lokasi Balai Desa Pagerkidul yang dapat diakses melalui
                    Google Maps.
                </p>
            </div>

            <div class="card border-0 shadow-sm overflow-hidden">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3948.6716250362806!2d111.34653447505696!3d-8.235737491797284!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7969d926ed7ac7%3A0x4f18dbfb1d3d9314!2sBALAI%20DESA%20PAGERKIDUL!5e0!3m2!1sen!2sid!4v1785814503511!5m2!1sen!2sid"
                    width="100%"
                    height="450"
                    style="border: 0;"
                    allowfullscreen
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Peta Lokasi Balai Desa Pagerkidul"
                ></iframe>
            </div>

            <div class="text-center mt-3">
                <a
                    href="https://www.google.com/maps/search/?api=1&query=Balai+Desa+Pagerkidul"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="btn btn-success"
                >
                    <i class="fa-solid fa-map-location-dot me-2"></i>
                    Buka di Google Maps
                </a>
            </div>
        </div>
    </section>

@endsection