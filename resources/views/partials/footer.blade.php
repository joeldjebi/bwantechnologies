@php
    $footerColumns = [
        'Services' => [
            ['Logiciels métiers', route('services').'#logiciels-metiers'],
            ['Plateformes web', route('services').'#plateformes-web'],
            ['Applications mobiles', route('services').'#applications-mobiles'],
            ['Solutions événements', route('services').'#evenements'],
            ['Équipements TIC', route('services').'#equipements-tic'],
        ],
        'Entreprise' => [
            ['À propos', route('about')],
            ['Réalisations', route('realisations.index')],
            ['Équipe', route('team')],
            ['Blog', route('blog.index')],
            ['Offres d’emploi', route('jobs.index')],
        ],
    ];
@endphp

<footer class="bg-surface text-[12px] leading-[1.6] text-muted">
    <div class="brand-bar h-1 w-full"></div>
    <div class="wrap-wide pt-14 pb-10">
        <div class="grid gap-10 md:grid-cols-[1.4fr_1fr_1fr_1.3fr]">
            <div>
                <img src="{{ asset('assets/images/bwan_logo.png') }}" alt="BWAN TECHNOLOGIES" class="h-12 w-auto">
                <p class="mt-4 max-w-xs text-[13px]">Entreprise ivoirienne spécialisée dans l'informatique, les réseaux, les télécoms et l'intégration de solutions technologiques.</p>
                <p class="mt-3 text-[13px] font-medium text-ink">La culture du résultat.</p>
            </div>

            @foreach ($footerColumns as $heading => $links)
                <div>
                    <p class="text-[12px] font-semibold text-ink">{{ $heading }}</p>
                    <ul class="mt-3 grid gap-2">
                        @foreach ($links as [$label, $url])
                            <li><a href="{{ $url }}" class="transition-colors hover:text-ink hover:underline">{{ $label }}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endforeach

            <div>
                <p class="text-[12px] font-semibold text-ink">Contact</p>
                <ul class="mt-3 grid gap-2">
                    <li>Cocody Angré 9ème tranche, Abidjan</li>
                    <li><a href="mailto:infos@bwantechnologies.com" class="hover:text-ink hover:underline">infos@bwantechnologies.com</a></li>
                    <li>Fixe : <a href="tel:+2252733712914" class="hover:text-ink hover:underline">+225 27 33 712 914</a></li>
                    <li>Mobile : <a href="tel:+2250778780606" class="hover:text-ink hover:underline">+225 07 78 78 06 06</a></li>
                </ul>
            </div>
        </div>

        <div class="mt-12 flex flex-col gap-2 border-t border-black/10 pt-6 md:flex-row md:items-center md:justify-between">
            <p>Copyright © {{ now()->year }} BWAN TECHNOLOGIES. Tous droits réservés.</p>
            <p>Abidjan, Côte d’Ivoire</p>
        </div>
    </div>
</footer>
