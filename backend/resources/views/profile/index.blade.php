@extends('layouts.app')

@section(
    'title',
    'Profil ' . ($profile?->village_name ?? 'Desa Pagerkidul')
)

@section(
    'meta_description',
    'Informasi profil, visi, misi, kontak, dan pelayanan Desa Pagerkidul.'
)

@section('content')
    <section style="padding-top: 140px; padding-bottom: 80px;">
        <div class="container">
            <div class="section-title text-center mb-5">
                <span>Tentang Desa</span>

                <h2>
                    Profil {{ $profile?->village_name ?? 'Desa Pagerkidul' }}
                </h2>

                <p>
                    Informasi umum, visi, misi, serta pelayanan pemerintah desa.
                </p>
            </div>

            @if ($profile)
                <div class="row g-5 align-items-center mb-5">
                    <div class="col-lg-6">
                        <img
                            src="{{ $profile->profile_image
                                ? asset('storage/' . $profile->profile_image)
                                : asset('assets/images/desa.jpg') }}"
                            alt="Foto {{ $profile->village_name }}"
                            class="img-fluid rounded-4 shadow-sm w-100"
                            style="max-height: 450px; object-fit: cover;"
                        >
                    </div>

                    <div class="col-lg-6">
                        <span class="badge text-bg-success mb-3">
                            Profil Desa
                        </span>

                        <h3 class="mb-3">
                            {{ $profile->village_name }}
                        </h3>

                        <p style="white-space: pre-line;">
                            {{ $profile->description
                                ?: 'Deskripsi desa belum tersedia.' }}
                        </p>
                    </div>
                </div>

                <div class="row g-4 mb-5">
                    <div class="col-lg-6">
                        <article class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <h3 class="mb-3">
                                    <i class="fa-solid fa-eye me-2"></i>
                                    Visi
                                </h3>

                                <p
                                    class="mb-0"
                                    style="white-space: pre-line;"
                                >
                                    {{ $profile->vision
                                        ?: 'Visi desa belum tersedia.' }}
                                </p>
                            </div>
                        </article>
                    </div>

                    <div class="col-lg-6">
                        <article class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <h3 class="mb-3">
                                    <i class="fa-solid fa-bullseye me-2"></i>
                                    Misi
                                </h3>

                                @php
                                    $missions = collect(
                                        preg_split(
                                            '/\r\n|\r|\n/',
                                            $profile->missions ?? ''
                                        )
                                    )
                                        ->map(
                                            fn ($mission) => trim($mission)
                                        )
                                        ->filter();
                                @endphp

                                @if ($missions->isNotEmpty())
                                    <ol class="mb-0">
                                        @foreach ($missions as $mission)
                                            <li class="mb-2">
                                                {{ $mission }}
                                            </li>
                                        @endforeach
                                    </ol>
                                @else
                                    <p class="mb-0">
                                        Misi desa belum tersedia.
                                    </p>
                                @endif
                            </div>
                        </article>
                    </div>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h3 class="mb-4">
                            Informasi Pelayanan
                        </h3>

                        <div class="row g-4">
                            <div class="col-md-6">
                                <h6>
                                    <i class="fa-solid fa-location-dot me-2"></i>
                                    Alamat
                                </h6>

                                <p class="mb-0">
                                    {{ $profile->address
                                        ?: 'Belum tersedia' }}
                                </p>
                            </div>

                            <div class="col-md-6">
                                <h6>
                                    <i class="fa-solid fa-clock me-2"></i>
                                    Jam Pelayanan
                                </h6>

                                <p class="mb-0">
                                    {{ $profile->service_hours
                                        ?: 'Belum tersedia' }}
                                </p>
                            </div>

                            <div class="col-md-6">
                                <h6>
                                    <i class="fa-solid fa-phone me-2"></i>
                                    Telepon
                                </h6>

                                <p class="mb-0">
                                    {{ $profile->phone
                                        ?: 'Belum tersedia' }}
                                </p>
                            </div>

                            <div class="col-md-6">
                                <h6>
                                    <i class="fa-solid fa-envelope me-2"></i>
                                    Email
                                </h6>

                                <p class="mb-0">
                                    {{ $profile->email
                                        ?: 'Belum tersedia' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-warning text-center">
                    Data profil desa belum tersedia. Silakan isi melalui
                    dashboard admin.
                </div>
            @endif
        </div>
    </section>
@endsection