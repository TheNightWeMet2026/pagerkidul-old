<footer class="footer py-4">
    <div class="container">
        <div class="row g-4 align-items-start">
            <div class="col-lg-5">
                <div class="footer-brand d-flex align-items-center gap-3 mb-3">
                    <img
                        class="footer-logo"
                        src="{{ asset('assets/images/logo-pacitan.jpg') }}"
                        alt="Logo Desa Pagerkidul"
                    >

                    <h4 class="mb-0">
                        {{ $profile?->village_name ?? 'Desa Pagerkidul' }}
                    </h4>
                </div>

                <p class="mb-0">
                    Website resmi desa sebagai media informasi, pelayanan publik,
                    transparansi pemerintahan, dan promosi potensi desa.
                </p>
            </div>

            <div class="col-lg-3">
                <h5 class="mb-3">Menu</h5>

                <ul class="footer-menu">
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="{{ route('profile.index') }}">Profil Desa</a></li>
                    <li><a href="{{ route('officials.index') }}">Perangkat Desa</a></li>
                    <li><a href="{{ route('statistics.index') }}">Data Desa</a></li>
                    <li><a href="{{ route('potentials.index') }}">Potensi Desa</a></li>
                    <li><a href="{{ route('umkms.index') }}">UMKM Desa</a></li>
                </ul>
            </div>

            <div class="col-lg-4">
                <h5 class="mb-3">Kontak</h5>

                <ul class="footer-contact">
                    <li>
                        <i class="fa-solid fa-location-dot me-2"></i>
                        {{ $profile?->address ?: 'Pacitan, Jawa Timur' }}
                    </li>

                    <li>
                        <i class="fa-solid fa-envelope me-2"></i>
                        {{ $profile?->email ?: 'Belum tersedia' }}
                    </li>

                    <li>
                        <i class="fa-solid fa-phone me-2"></i>
                        {{ $profile?->phone ?: 'Belum tersedia' }}
                    </li>
                </ul>

                <div class="footer-social mt-3">
                    <a href="#" target="_blank" aria-label="Instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    <a href="#" target="_blank" aria-label="YouTube">
                        <i class="fa-brands fa-youtube"></i>
                    </a>

                    <a href="#" target="_blank" aria-label="Facebook">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                </div>
            </div>
        </div>

        <hr class="my-3">

        <div class="copyright text-center">
            © {{ date('Y') }}
            {{ $profile?->village_name ?? 'Desa Pagerkidul' }}.
            All Rights Reserved.
        </div>
    </div>
</footer>