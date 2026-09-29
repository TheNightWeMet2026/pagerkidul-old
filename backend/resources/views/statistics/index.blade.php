@extends('layouts.app')

@section('title', 'Statistik Desa Pagerkidul')

@section(
    'meta_description',
    'Informasi statistik penduduk Desa Pagerkidul berdasarkan jenis kelamin, pendidikan, pekerjaan, dan kelompok umur.'
)

@section('content')
    <section style="padding-top: 140px; padding-bottom: 80px;">
        <div class="container">
            <div class="section-title text-center mb-5">
                <span>Data Kependudukan</span>

                <h2>Statistik Desa Pagerkidul</h2>

                <p>
                    Informasi statistik masyarakat berdasarkan jenis kelamin,
                    pendidikan, pekerjaan, dan kelompok umur.
                </p>
            </div>

            @php
                $groupTitles = [
                    'gender' => 'Jenis Kelamin',
                    'education' => 'Pendidikan',
                    'occupation' => 'Pekerjaan',
                    'age' => 'Kelompok Umur',
                ];

                $groupIcons = [
                    'gender' => 'fa-venus-mars',
                    'education' => 'fa-graduation-cap',
                    'occupation' => 'fa-briefcase',
                    'age' => 'fa-users',
                ];
            @endphp

            @foreach ($groupTitles as $groupKey => $groupTitle)
                @php
                    $items = $statistics->get($groupKey, collect());
                    $total = $items->sum('value');
                @endphp

                @if ($items->isNotEmpty())
                    <section class="mb-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="me-3">
                                <i
                                    class="fa-solid {{ $groupIcons[$groupKey] }} fa-2x"
                                ></i>
                            </div>

                            <div>
                                <h3 class="mb-1">
                                    {{ $groupTitle }}
                                </h3>

                                <p class="text-muted mb-0">
                                    Total:
                                    {{ number_format($total, 0, ',', '.') }}
                                    jiwa
                                </p>
                            </div>
                        </div>

                        <div class="row g-4">
                            @foreach ($items as $item)
                                @php
                                    $percentage = $total > 0
                                        ? round(($item->value / $total) * 100, 1)
                                        : 0;
                                @endphp

                                <div class="col-lg-3 col-md-6">
                                    <article class="card border-0 shadow-sm h-100">
                                        <div class="card-body p-4">
                                            <h5 class="card-title">
                                                {{ $item->label }}
                                            </h5>

                                            <h2 class="fw-bold mb-2">
                                                {{ number_format(
                                                    $item->value,
                                                    0,
                                                    ',',
                                                    '.'
                                                ) }}
                                            </h2>

                                            <p class="text-muted mb-3">
                                                {{ $percentage }}%
                                                dari total kelompok
                                            </p>

                                            <div
                                                class="progress"
                                                role="progressbar"
                                                aria-label="{{ $item->label }}"
                                                aria-valuenow="{{ $percentage }}"
                                                aria-valuemin="0"
                                                aria-valuemax="100"
                                            >
                                                <div
                                                    class="progress-bar"
                                                    style="width: {{ $percentage }}%"
                                                >
                                                    {{ $percentage }}%
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endif
            @endforeach

            @if ($statistics->flatten()->isEmpty())
                <div class="alert alert-light text-center">
                    Data statistik desa belum tersedia.
                </div>
            @endif
        </div>
    </section>
@endsection