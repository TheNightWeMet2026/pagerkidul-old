@extends('layouts.app')

@section('title', 'UMKM Desa Pagerkidul')

@section(
    'meta_description',
    'Informasi produk dan usaha masyarakat Desa Pagerkidul.'
)

@section('content')
    <section style="padding-top: 140px; padding-bottom: 80px;">
        <div class="container">
            <div class="section-title text-center mb-5">
                <span>Produk Lokal</span>

                <h2>UMKM Desa Pagerkidul</h2>

                <p>
                    Produk dan usaha masyarakat Desa Pagerkidul yang memiliki
                    potensi untuk terus berkembang.
                </p>
            </div>

            <div class="row g-4">
                @forelse ($umkms as $umkm)
                    <div class="col-lg-4 col-md-6">
                        <article class="card h-100 border-0 shadow-sm">
                            <img
                                src="{{ $umkm->image
                                    ? asset('storage/' . $umkm->image)
                                    : asset('assets/images/desa.jpg') }}"
                                class="card-img-top"
                                alt="Foto {{ $umkm->product_name }}"
                                style="height: 240px; object-fit: cover;"
                            >

                            <div class="card-body">
                                <span class="badge text-bg-success mb-3">
                                    {{ ucfirst($umkm->category) }}
                                </span>

                                <h4 class="card-title">
                                    {{ $umkm->product_name }}
                                </h4>

                                @if ($umkm->business_name)
                                    <p class="fw-semibold mb-1">
                                        {{ $umkm->business_name }}
                                    </p>
                                @endif

                                @if ($umkm->owner_name)
                                    <p class="text-muted mb-2">
                                        Pemilik: {{ $umkm->owner_name }}
                                    </p>
                                @endif

                                @if ($umkm->description)
                                    <p class="card-text">
                                        {{ $umkm->description }}
                                    </p>
                                @endif

                                @if ($umkm->hamlet)
                                    <p class="mb-2">
                                        <i class="fa-solid fa-location-dot me-2"></i>
                                        Dusun {{ $umkm->hamlet }}
                                    </p>
                                @endif

                                @if ($umkm->production_type)
                                    <p class="mb-2">
                                        <i class="fa-solid fa-industry me-2"></i>
                                        {{ $umkm->production_type }}
                                    </p>
                                @endif

                                @if ($umkm->phone)
                                    @php
                                        $whatsappNumber = preg_replace(
                                            '/[^0-9]/',
                                            '',
                                            $umkm->phone
                                        );

                                        if (str_starts_with($whatsappNumber, '0')) {
                                            $whatsappNumber = '62' .
                                                substr($whatsappNumber, 1);
                                        }
                                    @endphp

                                    <a
                                        href="https://wa.me/{{ $whatsappNumber }}"
                                        class="btn btn-success mt-3"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                    >
                                        <i class="fa-brands fa-whatsapp me-2"></i>
                                        Hubungi Penjual
                                    </a>
                                @endif
                            </div>
                        </article>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-light text-center">
                            Data UMKM desa belum tersedia.
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection