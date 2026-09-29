@extends('layouts.app')

@section('title', 'Potensi Desa Pagerkidul')

@section(
    'meta_description',
    'Informasi potensi unggulan Desa Pagerkidul yang dapat dikembangkan untuk meningkatkan kesejahteraan masyarakat.'
)

@section('content')
    <section style="padding-top: 140px; padding-bottom: 80px;">
        <div class="container">
            <div class="section-title text-center mb-5">
                <span>Potensi Unggulan</span>

                <h2>Potensi Desa Pagerkidul</h2>

                <p>
                    Berbagai potensi desa yang dapat dikembangkan untuk
                    meningkatkan kesejahteraan masyarakat.
                </p>
            </div>

            <div class="row g-4">
                @forelse ($potentials as $potential)
                    <div class="col-lg-4 col-md-6">
                        <article class="card h-100 border-0 shadow-sm">
                            <img
                                src="{{ $potential->image
                                    ? asset('storage/' . $potential->image)
                                    : asset('assets/images/desa.jpg') }}"
                                class="card-img-top"
                                alt="Gambar {{ $potential->title }}"
                                style="height: 240px; object-fit: cover;"
                            >

                            <div class="card-body">
                                <span class="badge text-bg-success mb-3">
                                    {{ ucfirst($potential->category) }}
                                </span>

                                <h4 class="card-title">
                                    {{ $potential->title }}
                                </h4>

                                <p class="card-text">
                                    {{ $potential->description }}
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
        </div>
    </section>
@endsection