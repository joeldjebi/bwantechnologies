@php
    $navItems = [
        ['label' => 'À propos', 'route' => 'about', 'active' => 'about'],
        ['label' => 'Services', 'route' => 'services', 'active' => 'services'],
        ['label' => 'Réalisations', 'route' => 'realisations.index', 'active' => 'realisations.*'],
        ['label' => 'Équipe', 'route' => 'team', 'active' => 'team'],
        ['label' => 'Blog', 'route' => 'blog.index', 'active' => 'blog.*'],
        ['label' => 'Emplois', 'route' => 'jobs.index', 'active' => 'jobs.*'],
        ['label' => 'Contact', 'route' => 'contact', 'active' => 'contact'],
    ];
@endphp

<header data-header class="sticky top-0 z-50 bg-white/75 backdrop-blur-xl backdrop-saturate-[1.8] transition-shadow duration-300">
    <nav class="wrap-wide flex h-14 items-center justify-between gap-6 md:h-16" aria-label="Navigation principale">
        <a href="{{ route('home') }}" class="flex shrink-0 items-center" aria-label="Accueil BWAN TECHNOLOGIES">
            <img src="{{ asset('assets/images/bwan_logo.png') }}" alt="BWAN TECHNOLOGIES" class="h-10 w-auto md:h-12">
        </a>

        <div class="hidden items-center gap-7 lg:flex">
            @foreach ($navItems as $item)
                @php $isActive = request()->routeIs($item['active']); @endphp
                <a
                    href="{{ route($item['route']) }}"
                    @class([
                        'relative text-[14px] transition-colors duration-200',
                        'font-medium text-ink' => $isActive,
                        'text-ink/70 hover:text-ink' => ! $isActive,
                    ])
                    @if ($isActive) aria-current="page" @endif
                >
                    {{ $item['label'] }}
                    @if ($isActive)
                        <span class="brand-bar absolute inset-x-0 -bottom-[21px] mx-auto h-[2px] w-6 rounded-full"></span>
                    @endif
                </a>
            @endforeach
        </div>

        <div class="flex items-center gap-2">
            <a href="{{ route('contact') }}" class="btn btn-primary btn-sm hidden lg:inline-flex">Demander un devis</a>
            <button
                type="button"
                data-menu-button
                class="group relative -mr-2 flex h-11 w-11 items-center justify-center lg:hidden"
                aria-controls="menu-mobile"
                aria-expanded="false"
                aria-label="Menu"
            >
                <span class="absolute h-[1.5px] w-[18px] -translate-y-[4px] rounded-full bg-ink transition duration-300 group-[.is-open]:translate-y-0 group-[.is-open]:rotate-45"></span>
                <span class="absolute h-[1.5px] w-[18px] translate-y-[4px] rounded-full bg-ink transition duration-300 group-[.is-open]:translate-y-0 group-[.is-open]:-rotate-45"></span>
            </button>
        </div>
    </nav>

    <div id="menu-mobile" data-mobile-menu hidden class="fixed inset-x-0 top-14 bottom-0 overflow-y-auto bg-white lg:hidden">
        <div class="wrap pt-6 pb-16">
            <a href="{{ route('home') }}" @class(['block py-2 text-[28px] font-semibold tracking-tight', 'text-brand' => request()->routeIs('home')])>Accueil</a>
            @foreach ($navItems as $item)
                <a href="{{ route($item['route']) }}" @class(['block py-2 text-[28px] font-semibold tracking-tight', 'text-brand' => request()->routeIs($item['active'])])>{{ $item['label'] }}</a>
            @endforeach
            <a href="{{ route('contact') }}" class="btn btn-primary mt-10 w-full">Demander un devis</a>
        </div>
    </div>
</header>
