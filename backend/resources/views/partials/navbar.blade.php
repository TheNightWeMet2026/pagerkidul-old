<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img
                src="{{ asset('assets/images/logo-pacitan.jpg') }}"
                alt="Logo Desa Pagerkidul"
            >

            <span>
                {{ $profile?->village_name ?? 'Desa Pagerkidul' }}
            </span>
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarMenu"
            aria-controls="navbarMenu"
            aria-expanded="false"
            aria-label="Buka navigasi"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div
            class="collapse navbar-collapse"
            id="navbarMenu"
        >
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                        href="{{ route('home') }}"
                    >
                        Beranda
                    </a>
                </li>

                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('profile.*') ? 'active' : '' }}"
                        href="{{ route('profile.index') }}"
                    >
                        Profil Desa
                    </a>
                </li>

                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('officials.*') ? 'active' : '' }}"
                        href="{{ route('officials.index') }}"
                    >
                        Perangkat Desa
                    </a>
                </li>

                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('statistics.*') ? 'active' : '' }}"
                        href="{{ route('statistics.index') }}"
                    >
                        Data Desa 
                    </a>
                </li>

                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('potentials.*') ? 'active' : '' }}"
                        href="{{ route('potentials.index') }}"
                    >
                        Potensi Desa
                    </a>
                </li>

                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('umkms.*') ? 'active' : '' }}"
                        href="{{ route('umkms.index') }}"
                    >
                        UMKM Desa
                    </a>
                </li>
            </ul>

            <a
                class="btn btn-login ms-lg-4"
                href="{{ url('/admin') }}"
            >
                Login Admin
            </a>
        </div>
    </div>
</nav>