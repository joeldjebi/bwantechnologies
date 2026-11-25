@extends('layouts.app')

@section('content')
@php
    $services = [
        ['Conception de solutions informatiques métier sur-mesure', 'Développement de logiciels adaptés à vos processus métier spécifiques pour optimiser votre productivité.', 'code', 'sky'],
        ['Intégration de réseaux et télécoms', 'Mise en place et maintenance de réseaux informatiques et solutions télécoms pour votre entreprise.', 'wifi', 'leaf'],
        ['Édition et création de logiciels innovants', 'Conception et développement de logiciels innovants répondant aux défis du marché africain.', 'sparkles', 'sun'],
        ['Plateformes web et applications mobiles', 'Création de sites web modernes et d’applications mobiles performantes pour tous vos besoins.', 'mobile', 'clay'],
        ['Distribution d’équipements TIC', 'Fourniture d’équipements informatiques et télécoms de qualité pour vos projets.', 'chip', 'sky'],
        ['Billetterie et contrôle d’accès', 'Solutions complètes de billetterie électronique et de contrôle d’accès pour événements.', 'ticket', 'leaf'],
        ['Sécurité électronique et monétique', 'Mise en place de systèmes de sécurité électronique et de solutions de paiement sécurisées.', 'shield', 'sun'],
        ['Conseil, formation et accompagnement', 'Accompagnement personnalisé et formation de vos équipes aux nouvelles technologies.', 'lightbulb', 'clay'],
    ];
    $toneClasses = [
        'sky' => 'bg-sky/10 text-sky',
        'leaf' => 'bg-leaf/10 text-leaf',
        'sun' => 'bg-sun/15 text-[#b8861a]',
        'clay' => 'bg-clay/10 text-clay',
    ];
    $testimonials = [
        ['BWAN TECHNOLOGIES a transformé notre gestion hôtelière avec un système sur-mesure qui a considérablement amélioré notre efficacité opérationnelle.', 'Dr. Koffi Assi', 'Directeur Général, Hôtel Ivoire'],
        ['La plateforme e-commerce développée par BWAN TECHNOLOGIES nous a permis d’augmenter nos ventes de 150% en seulement 6 mois.', 'Mme. Aminata Coulibaly', 'Directrice Marketing, AfriMarket CI'],
        ['Le système de billetterie électronique a révolutionné la gestion de notre festival. Plus de files d’attente et une meilleure expérience pour nos visiteurs.', 'M. Jean-Baptiste Kouamé', 'Organisateur, Festival des Arts de Grand-Bassam'],
    ];
@endphp

{{-- HERO --}}
<section class="relative overflow-hidden bg-white">
    <div aria-hidden="true" class="pointer-events-none absolute inset-x-0 -top-48 mx-auto h-[560px] max-w-5xl rounded-full bg-[radial-gradient(closest-side,rgba(58,125,191,.12),transparent)] blur-3xl"></div>
    <div class="wrap relative pt-16 text-center md:pt-28">
        <div class="hero-fade">
            <p class="eyebrow">Informatique · Réseaux · Télécoms</p>
            <h1 class="display mx-auto mt-3 max-w-4xl">La culture du <span class="gradient-text">résultat.</span></h1>
            <p class="lead mx-auto mt-6 max-w-2xl">BWAN TECHNOLOGIES est une entreprise ivoirienne spécialisée dans l'informatique, les réseaux, les télécoms et l'intégration de solutions technologiques.</p>
            <div class="mt-10 flex flex-wrap items-center justify-center gap-x-6 gap-y-4">
                <a href="{{ route('contact') }}" class="btn btn-primary">Demander un devis</a>
                <a href="{{ route('services') }}" class="link-more">Découvrir nos services</a>
            </div>
        </div>
    </div>

    {{-- Mosaïque aux couleurs du logo --}}
    <div class="wrap relative mt-14 md:mt-20" data-reveal>
        <div class="grid grid-cols-2 gap-3 md:grid-cols-[1fr_1.35fr] md:grid-rows-[1fr_1fr] md:gap-4">
            <a href="{{ route('services') }}#logiciels-metiers" class="group relative flex min-h-[170px] flex-col justify-between overflow-hidden rounded-[28px] bg-[#f6e7bd] p-6 md:min-h-[230px] md:p-8">
                <x-icon name="code" class="h-9 w-9 text-[#8a6410]" />
                <div>
                    <p class="text-[13px] font-medium text-[#8a6410]/80">Sur-mesure</p>
                    <p class="text-[20px] leading-tight font-semibold tracking-tight text-[#4a3606] md:text-[26px]">Logiciels métiers</p>
                </div>
            </a>
            <a href="{{ route('services') }}#plateformes-web" class="group relative flex min-h-[170px] flex-col justify-between overflow-hidden rounded-[28px] bg-[#d9eedb] p-6 md:min-h-[230px] md:p-8">
                <x-icon name="globe" class="h-9 w-9 text-[#2f6e35]" />
                <div>
                    <p class="text-[13px] font-medium text-[#2f6e35]/80">Robustes et évolutives</p>
                    <p class="text-[20px] leading-tight font-semibold tracking-tight text-[#173a1b] md:text-[26px]">Plateformes web</p>
                </div>
            </a>
            <a href="{{ route('services') }}#applications-mobiles" class="group relative flex min-h-[170px] flex-col justify-between overflow-hidden rounded-[28px] bg-[#d8e6f5] p-6 md:min-h-[230px] md:p-8">
                <x-icon name="mobile" class="h-9 w-9 text-[#1f5592]" />
                <div>
                    <p class="text-[13px] font-medium text-[#1f5592]/80">Android & iOS</p>
                    <p class="text-[20px] leading-tight font-semibold tracking-tight text-[#0e2c4f] md:text-[26px]">Applications mobiles</p>
                </div>
            </a>
            <a href="{{ route('services') }}#evenements" class="group relative flex min-h-[170px] flex-col justify-between overflow-hidden rounded-[28px] bg-[#f3d9ce] p-6 md:min-h-[230px] md:p-8">
                <x-icon name="ticket" class="h-9 w-9 text-[#93401f]" />
                <div>
                    <p class="text-[13px] font-medium text-[#93401f]/80">Billetterie & contrôle d’accès</p>
                    <p class="text-[20px] leading-tight font-semibold tracking-tight text-[#4d1d0b] md:text-[26px]">Solutions événements</p>
                </div>
            </a>
        </div>

        <dl class="mt-4 grid grid-cols-2 gap-px overflow-hidden rounded-[28px] bg-black/[.06] md:grid-cols-4">
            @foreach ([['150+', 'Projets réalisés'], ['98%', 'Clients satisfaits'], ['3+', 'Années d’expérience'], ['12+', 'Membres d’équipe']] as [$value, $label])
                <div class="bg-surface px-6 py-7 text-center">
                    <dt class="sr-only">{{ $label }}</dt>
                    <dd class="text-[32px] leading-none font-semibold tracking-[-0.03em] md:text-[40px]">{{ $value }}</dd>
                    <dd class="mt-2 text-[14px] text-muted">{{ $label }}</dd>
                </div>
            @endforeach
        </dl>
    </div>
</section>

{{-- MANIFESTE --}}
<section class="section">
    <div class="wrap">
        <p class="mx-auto max-w-4xl text-center text-[28px] leading-[1.2] font-semibold tracking-[-0.02em] md:text-[44px]" data-reveal>
            Des logiciels métiers, des plateformes web et des applications mobiles,
            <span class="text-subtle">conçus à Abidjan pour les entreprises africaines.</span>
        </p>
    </div>
</section>

{{-- SERVICES --}}
<section class="pb-20 md:pb-28">
    <div class="wrap">
        <x-section-heading eyebrow="Nos services" title="Une expertise complète, de l’idée au déploiement." lead="Une gamme de services technologiques conçus pour répondre aux besoins de votre entreprise." />

        <div class="mt-14 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($services as $i => [$title, $text, $icon, $tone])
                <article class="tile flex flex-col p-7" data-reveal style="--reveal-delay: {{ ($i % 4) * 80 }}ms">
                    <div class="icon-badge {{ $toneClasses[$tone] }}"><x-icon :name="$icon" /></div>
                    <h3 class="mt-6 text-[19px] leading-snug font-semibold tracking-tight">{{ $title }}</h3>
                    <p class="mt-2 text-[15px] leading-[1.55] text-muted">{{ $text }}</p>
                </article>
            @endforeach
        </div>

        <div class="mt-10 text-center" data-reveal>
            <a href="{{ route('services') }}" class="link-more">Voir tous nos services</a>
        </div>
    </div>
</section>

{{-- À PROPOS + VALEURS --}}
<section class="bg-surface py-20 md:py-28">
    <div class="wrap grid items-center gap-12 lg:grid-cols-[1.1fr_.9fr] lg:gap-16">
        <div data-reveal>
            <p class="eyebrow">À propos</p>
            <h2 class="headline mt-2">Un acteur clé de l’innovation en Côte d’Ivoire.</h2>
            <p class="lead mt-6">Créée en janvier 2021 à Abidjan, BWAN TECHNOLOGIES s'est rapidement imposée comme un acteur clé de l'innovation technologique en Côte d'Ivoire.</p>
            <p class="mt-4 text-[17px] leading-[1.6] text-muted">Sous la direction de Janvier Kouakou, expert en génie logiciel, billetterie et contrôle d'accès, notre entreprise développe des solutions sur-mesure qui transforment la façon dont les entreprises africaines utilisent la technologie.</p>
            <div class="mt-8 flex flex-wrap items-center gap-x-6 gap-y-4">
                <a href="{{ route('about') }}" class="btn btn-primary">En savoir plus</a>
                <a href="{{ route('team') }}" class="link-more">Notre équipe</a>
            </div>
        </div>

        <div class="tile-dark p-9 md:p-11" data-reveal style="--reveal-delay: 120ms">
            <div aria-hidden="true" class="pointer-events-none absolute -right-20 -bottom-20 h-72 w-72 rounded-full bg-[radial-gradient(closest-side,rgba(58,125,191,.45),transparent)] blur-2xl"></div>
            <p class="relative text-[13px] font-medium text-white/50">Nos valeurs</p>
            <ul class="relative mt-6 grid gap-6">
                @foreach ([['Innovation', 'Solutions technologiques de pointe', 'lightbulb', 'text-[#f5d47e]'], ['Qualité', 'Excellence dans chaque projet', 'badge', 'text-[#a6dfab]'], ['Engagement client', 'Satisfaction garantie', 'heart', 'text-[#f0a688]']] as [$label, $text, $icon, $color])
                    <li class="flex items-start gap-4">
                        <span class="icon-badge bg-white/10 {{ $color }}"><x-icon :name="$icon" /></span>
                        <div>
                            <p class="text-[19px] font-semibold tracking-tight">{{ $label }}</p>
                            <p class="text-[15px] text-white/60">{{ $text }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>

{{-- RÉALISATIONS --}}
<section class="section">
    <div class="wrap">
        <x-section-heading eyebrow="Réalisations" title="Des projets qui parlent d’eux-mêmes." lead="Quelques-uns de nos projets récents, qui témoignent de notre expertise et de notre engagement." />

        <div class="mt-14 grid gap-5 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($latestRealisations as $i => $realisation)
                <x-realisation-card :realisation="$realisation" :delay="($i % 3) * 90" />
            @empty
                <p class="tile p-12 text-center text-muted md:col-span-2 lg:col-span-3">Nos réalisations seront publiées prochainement.</p>
            @endforelse
        </div>

        <div class="mt-12 text-center" data-reveal>
            <a href="{{ route('realisations.index') }}" class="btn btn-secondary">Voir toutes nos réalisations</a>
        </div>
    </div>
</section>

{{-- TÉMOIGNAGES --}}
<section class="bg-surface py-20 md:py-28">
    <div class="wrap">
        <x-section-heading eyebrow="Témoignages" title="Ce que disent nos clients." />
        <div class="mt-14 grid gap-5 md:grid-cols-3">
            @foreach ($testimonials as $i => [$quote, $name, $role])
                <figure class="card flex flex-col p-8" data-reveal style="--reveal-delay: {{ $i * 90 }}ms">
                    <p class="text-[13px] tracking-[0.2em] text-sun" aria-label="5 étoiles sur 5">★★★★★</p>
                    <blockquote class="mt-5 flex-1 text-[17px] leading-[1.6] text-ink">« {{ $quote }} »</blockquote>
                    <figcaption class="mt-8 flex items-center gap-3">
                        <span class="flex h-10 w-10 items-center justify-center rounded-full bg-brand-soft text-[15px] font-semibold text-brand">{{ mb_substr(preg_replace('/^(Dr\.|Mme\.|M\.)\s*/', '', $name), 0, 1) }}</span>
                        <span>
                            <span class="block text-[15px] font-semibold">{{ $name }}</span>
                            <span class="block text-[13px] text-muted">{{ $role }}</span>
                        </span>
                    </figcaption>
                </figure>
            @endforeach
        </div>
    </div>
</section>

{{-- BLOG --}}
<section class="section">
    <div class="wrap">
        <x-section-heading eyebrow="Actualités & Blog" title="Les dernières tendances, décryptées." lead="Restez informé des dernières tendances technologiques et de nos actualités." />

        <div class="mt-14 grid gap-5 md:grid-cols-3">
            @forelse ($latestArticles as $i => $article)
                <x-article-card :article="$article" :delay="$i * 90" />
            @empty
                <p class="tile p-12 text-center text-muted md:col-span-3">Aucun article pour le moment.</p>
            @endforelse
        </div>

        <div class="mt-10 text-center" data-reveal>
            <a href="{{ route('blog.index') }}" class="link-more">Voir tous les articles</a>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="pb-20 md:pb-28">
    <div class="wrap">
        <div class="tile-dark px-8 py-16 text-center md:py-24" data-reveal>
            <div aria-hidden="true" class="pointer-events-none absolute inset-x-0 -bottom-40 mx-auto h-80 max-w-3xl rounded-full bg-[radial-gradient(closest-side,rgba(58,125,191,.4),transparent)] blur-2xl"></div>
            <h2 class="headline relative mx-auto max-w-3xl">Prêt à transformer <span class="gradient-text-light">votre entreprise ?</span></h2>
            <p class="relative mx-auto mt-5 max-w-2xl text-[19px] leading-[1.5] text-white/65">Contactez-nous dès aujourd'hui pour discuter de vos besoins technologiques et découvrir comment nous pouvons vous aider à atteindre vos objectifs.</p>
            <div class="relative mt-10 flex flex-wrap items-center justify-center gap-x-6 gap-y-4">
                <a href="{{ route('contact') }}" class="btn btn-light">Nous contacter</a>
                <a href="{{ route('jobs.index') }}" class="link-more link-more-light">Rejoindre notre équipe</a>
            </div>
        </div>
    </div>
</section>
@endsection
