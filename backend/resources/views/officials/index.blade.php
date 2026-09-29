@extends('layouts.app')

@section('title', 'Perangkat Desa Pagerkidul')

@section(
    'meta_description',
    'Informasi struktur organisasi dan perangkat Pemerintah Desa Pagerkidul.'
)

@section('content')
    <section style="padding-top: 140px; padding-bottom: 80px;">
        <div class="container">
            <div class="section-title text-center mb-5">
                <span>Pemerintah Desa</span>

                <h2>Perangkat Desa Pagerkidul</h2>

                <p>
                    Struktur organisasi Pemerintah Desa Pagerkidul dalam
                    memberikan pelayanan kepada masyarakat.
                </p>
            </div>

            @if ($chief)
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-4 col-md-6">
                        <article class="card border-0 shadow-sm text-center h-100">
                            <img
                                src="{{ $chief->photo
                                    ? asset('storage/' . $chief->photo)
                                    : asset('assets/images/desa.jpg') }}"
                                class="card-img-top"
                                alt="Foto {{ $chief->name }}"
                                style="height: 340px; object-fit: cover;"
                            >

                            <div class="card-body p-4">
                                <span class="badge text-bg-success mb-3">
                                    Pimpinan Desa
                                </span>

                                <h3 class="card-title">
                                    {{ $chief->name }}
                                </h3>

                                <p class="fw-semibold text-muted">
                                    {{ $chief->position }}
                                </p>

                                @if ($chief->phone)
                                    <p class="mb-0">
                                        <i class="fa-solid fa-phone me-2"></i>
                                        {{ $chief->phone }}
                                    </p>
                                @endif
                            </div>
                        </article>
                    </div>
                </div>
            @endif

            <div class="row g-4 justify-content-center">
                @forelse ($staff as $official)
                    <div class="col-lg-3 col-md-6">
                        <article class="card border-0 shadow-sm text-center h-100">
                            <img
                                src="{{ $official->photo
                                    ? asset('storage/' . $official->photo)
                                    : asset('assets/images/desa.jpg') }}"
                                class="card-img-top"
                                alt="Foto {{ $official->name }}"
                                style="height: 280px; object-fit: cover;"
                            >

                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ $official->name }}
                                </h5>

                                <p class="text-muted">
                                    {{ $official->position }}
                                </p>

                                @if ($official->phone)
                                    <p class="mb-0">
                                        <i class="fa-solid fa-phone me-2"></i>
                                        {{ $official->phone }}
                                    </p>
                                @endif
                            </div>
                        </article>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-light text-center">
                            Data perangkat desa lainnya belum tersedia.
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
