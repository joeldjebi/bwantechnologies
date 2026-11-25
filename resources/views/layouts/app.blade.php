<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#ffffff">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('description', "BWAN TECHNOLOGIES est une entreprise ivoirienne spécialisée dans l'informatique, les réseaux, les télécoms et l'intégration de solutions technologiques.")">
    <meta name="keywords" content="BWAN TECHNOLOGIES, informatique, réseaux, télécoms, développement logiciel, billetterie, contrôle d'accès, Côte d'Ivoire, Abidjan, Cocody">
    <meta name="author" content="BWAN TECHNOLOGIES">

    {{-- yieldContent() returns the section already escaped by Blade, so it must not be escaped twice. --}}
    <title>{!! View::hasSection('title') ? View::yieldContent('title').' - BWAN TECHNOLOGIES' : 'BWAN TECHNOLOGIES - La culture du résultat' !!}</title>
    <meta property="og:site_name" content="BWAN TECHNOLOGIES">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{!! View::hasSection('title') ? View::yieldContent('title').' - BWAN TECHNOLOGIES' : 'BWAN TECHNOLOGIES - La culture du résultat' !!}">
    <meta property="og:image" content="{{ asset('assets/images/bwan_logo.png') }}">

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <script>document.documentElement.classList.add('js')</script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="min-h-screen">
    <a href="#contenu" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-[60] focus:rounded-full focus:bg-white focus:px-4 focus:py-2 focus:shadow-lg">Aller au contenu</a>

    @include('partials.nav')

    <main id="contenu">
        @yield('content')
    </main>

    @include('partials.footer')

    @stack('scripts')
</body>
</html>
