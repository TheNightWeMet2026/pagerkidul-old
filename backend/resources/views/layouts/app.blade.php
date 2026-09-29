<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Desa Pagerkidul')
    </title>

    <meta
        name="description"
        content="@yield('meta_description', 'Website resmi Desa Pagerkidul.')"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="{{ asset('assets/css/style.css') }}"
    >

    @stack('styles')
</head>

<body>

@include('partials.navbar')

<main>
    @yield('content')
</main>

@include('partials.footer')

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>

<script src="{{ asset('assets/js/script.js') }}"></script>

@stack('scripts')

</body>
</html>