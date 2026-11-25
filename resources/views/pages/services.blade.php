@extends('layouts.app')

@section('title', 'Nos Services')

@section('content')
@php
    $domains = [
        [
            'id' => 'logiciels-metiers', 'icon' => 'code', 'title' => 'Logiciels métiers', 'tagline' => 'Conception sur-mesure pour gestion, finance, RH',
            'bg' => 'bg-[#f6e7bd]', 'fg' => 'text-[#8a6410]',
            'items' => [
                ['Solutions informatiques métier sur-mesure', 'Développement de logiciels adaptés à vos processus métier spécifiques pour optimiser votre productivité.'],
                ['Édition et création de logiciels innovants', 'Conception et développement de logiciels innovants répondant aux défis du marché africain.'],
                ['Sécurité électronique et monétique', 'Mise en place de systèmes de sécurité électronique et de solutions de paiement sécurisées.'],
            ],
        ],
        [
            'id' => 'plateformes-web', 'icon' => 'globe', 'title' => 'Plateformes web', 'tagline' => 'Solutions robustes, sécurisées et évolutives',
            'bg' => 'bg-[#d9eedb]', 'fg' => 'text-[#2f6e35]',
            'items' => [
                ['Plateformes robustes', 'Développement de sites web et applications web sécurisées et évolutives.'],
                ['Conseil, formation et accompagnement', 'Accompagnement personnalisé et formation de vos équipes aux nouvelles technologies.'],
            ],
        ],
        [
            'id' => 'applications-mobiles', 'icon' => 'mobile', 'title' => 'Applications mobiles', 'tagline' => 'Android & iOS avec une expérience utilisateur optimale',
            'bg' => 'bg-[#d8e6f5]', 'fg' => 'text-[#1f5592]',
            'items' => [
                ['Plateformes web et applications mobiles', 'Création de sites web modernes et d’applications mobiles performantes pour tous vos besoins.'],
                ['Apps mobiles', 'Applications Android et iOS avec une expérience utilisateur optimale.'],
            ],
        ],
        [
            'id' => 'evenements', 'icon' => 'ticket', 'title' => 'Événements culturels et sportifs', 'tagline' => 'Billetterie, contrôle d’accès, accréditation',
            'bg' => 'bg-[#f3d9ce]', 'fg' => 'text-[#93401f]',
            'items' => [
                ['Billetterie et contrôle d’accès', 'Solutions complètes de billetterie électronique et de contrôle d’accès pour événements.'],
                ['Solutions événements', 'Billetterie, contrôle d’accès et gestion d’événements culturels et sportifs.'],
            ],
        ],
        [
            'id' => 'equipements-tic', 'icon' => 'chip', 'title' => 'Distribution d’équipements TIC', 'tagline' => 'Bornes, terminaux, badges RFID',
            'bg' => 'bg-[#e4e4ea]', 'fg' => 'text-ink',
            'items' => [
                ['Intégration de réseaux et télécoms', 'Mise en place et maintenance de réseaux informatiques et solutions télécoms pour votre entreprise.'],
                ['Distribution d’équipements TIC', 'Fourniture d’équipements informatiques et télécoms de qualité pour vos projets.'],
                ['Équipements TIC', 'Distribution de bornes, terminaux et badges RFID de qualité.'],
            ],
        ],
    ];
    $process = [
        ['Analyse', 'Étude approfondie de vos besoins et définition des spécifications.'],
        ['Conception', 'Architecture technique et design de l’interface utilisateur.'],
        ['Développement', 'Implémentation avec les meilleures pratiques et technologies.'],
        ['Déploiement', 'Mise en production et accompagnement pour l’adoption.'],
    ];
    $technologies = [['PHP', 'Laravel'], ['JS', 'Vue.js'], ['PY', 'Python'], ['DB', 'MySQL'], ['AWS', 'Cloud'], ['Docker', 'Containers']];
@endphp

<x-page-hero
    eyebrow="Nos services"
    title="Des solutions complètes pour transformer votre entreprise."
    lead="Une gamme complète de services technologiques adaptés aux besoins spécifiques des entreprises africaines."
>
    <a href="{{ route('contact') }}" class="btn btn-primary">Demander un devis</a>
    <a href="{{ route('realisations.index') }}" class="link-more">Voir nos réalisations</a>
</x-page-hero>

{{-- Sommaire --}}
<nav aria-label="Domaines d’expertise" class="wrap -mt-4 mb-14 md:mb-20" data-reveal>
    <div class="-mx-5 flex gap-2 overflow-x-auto px-5 pb-2 md:mx-0 md:flex-wrap md:justify-center md:px-0">
        @foreach ($domains as $domain)
            <a href="#{{ $domain['id'] }}" class="pill">{{ $domain['title'] }}</a>
        @endforeach
    </div>
</nav>

{{-- DOMAINES --}}
<section class="pb-20 md:pb-28">
    <div class="wrap grid gap-5">
        @foreach ($domains as $index => $domain)
            <article id="{{ $domain['id'] }}" class="grid scroll-mt-24 overflow-hidden rounded-[28px] bg-surface md:grid-cols-[.85fr_1.15fr]" data-reveal>
                <div class="flex min-h-[220px] flex-col justify-between p-9 md:min-h-[320px] md:p-12 {{ $domain['bg'] }}">
                    <x-icon :name="$domain['icon']" class="h-10 w-10 {{ $domain['fg'] }}" />
                    <div class="mt-10">
                        <p class="text-[13px] font-medium {{ $domain['fg'] }} opacity-80">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }} · {{ $domain['tagline'] }}</p>
                        <h2 class="mt-1 text-[32px] leading-[1.05] font-semibold tracking-[-0.025em] text-ink md:text-[40px]">{{ $domain['title'] }}</h2>
                    </div>
                </div>
                <div class="flex flex-col justify-center p-9 md:p-12">
                    <ul class="grid gap-6">
                        @foreach ($domain['items'] as [$title, $text])
                            <li class="flex gap-4">
                                <span class="mt-1 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-brand text-white"><x-icon name="check" class="h-3.5 w-3.5" stroke-width="2.5" /></span>
                                <div>
                                    <h3 class="text-[19px] font-semibold tracking-tight">{{ $title }}</h3>
                                    <p class="mt-1 text-[15px] leading-[1.55] text-muted">{{ $text }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </article>
        @endforeach
    </div>
</section>

{{-- PROCESSUS --}}
<section class="bg-night py-20 text-white md:py-28">
    <div class="wrap">
        <x-section-heading eyebrow="Notre méthode" title="Un processus éprouvé, en quatre étapes." lead="Une méthodologie qui garantit la réussite de vos projets." :dark="true" />
        <ol class="mt-16 grid gap-px overflow-hidden rounded-[28px] bg-white/10 md:grid-cols-4">
            @foreach ($process as $i => [$step, $text])
                <li class="bg-night p-8" data-reveal style="--reveal-delay: {{ $i * 90 }}ms">
                    <p class="gradient-text-light text-[44px] leading-none font-semibold tracking-tight">0{{ $i + 1 }}</p>
                    <h3 class="mt-6 text-[21px] font-semibold tracking-tight">{{ $step }}</h3>
                    <p class="mt-2 text-[15px] leading-[1.55] text-white/60">{{ $text }}</p>
                </li>
            @endforeach
        </ol>
    </div>
</section>

{{-- TECHNOLOGIES --}}
<section class="section">
    <div class="wrap">
        <x-section-heading eyebrow="Technologies & outils" title="Les outils les plus performants." lead="Nous utilisons les technologies les plus récentes pour livrer des solutions durables." />
        <div class="mt-14 grid grid-cols-3 gap-px overflow-hidden rounded-[28px] bg-black/[.06] md:grid-cols-6" data-reveal>
            @foreach ($technologies as [$short, $name])
                <div class="flex flex-col items-center justify-center bg-white px-4 py-9">
                    <span class="text-[22px] font-semibold tracking-tight">{{ $short }}</span>
                    <span class="mt-1 text-[13px] text-muted">{{ $name }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="pb-20 md:pb-28">
    <div class="wrap">
        <div class="tile-dark px-8 py-16 text-center md:py-20" data-reveal>
            <h2 class="headline mx-auto max-w-2xl">Prêt à démarrer <span class="gradient-text-light">votre projet ?</span></h2>
            <p class="mx-auto mt-5 max-w-2xl text-[19px] leading-[1.5] text-white/65">Contactez-nous pour discuter de vos besoins et obtenir un devis personnalisé pour votre projet technologique.</p>
            <div class="mt-10 flex flex-wrap items-center justify-center gap-x-6 gap-y-4">
                <a href="{{ route('contact') }}" class="btn btn-light">Demander un devis</a>
                <a href="{{ route('realisations.index') }}" class="link-more link-more-light">Voir nos réalisations</a>
            </div>
        </div>
    </div>
</section>
@endsection
