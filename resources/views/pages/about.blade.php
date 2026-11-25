@extends('layouts.app')

@section('title', 'À propos')

@section('content')
@php
    $values = [
        ['Innovation', 'Nous développons des solutions technologiques innovantes pour répondre aux défis du marché africain.', 'lightbulb', 'bg-sun/15 text-[#b8861a]'],
        ['Qualité', 'Nous nous engageons à fournir des produits et services de haute qualité qui dépassent les attentes.', 'badge', 'bg-leaf/10 text-leaf'],
        ['Engagement client', 'La satisfaction de nos clients est au cœur de notre approche et de notre culture d’entreprise.', 'heart', 'bg-clay/10 text-clay'],
        ['Professionnalisme', 'Nous maintenons les plus hauts standards professionnels dans tous nos projets et interactions.', 'briefcase', 'bg-sky/10 text-sky'],
        ['Développement local', 'Nous contribuons activement au développement technologique de la Côte d’Ivoire et de l’Afrique.', 'globe', 'bg-leaf/10 text-leaf'],
    ];
    $milestones = [
        ['2021', 'Création de BWAN TECHNOLOGIES', 'Fondation de l’entreprise à Grand-Bassam avec une vision claire de l’innovation technologique.'],
        ['2021', 'Premiers projets de billetterie', 'Développement de solutions de billetterie pour des événements culturels et sportifs.'],
        ['2022', 'Expansion des services', 'Élargissement de l’offre avec le développement d’applications mobiles et de plateformes web.'],
        ['2023', 'Partenariats stratégiques', 'Établissement de partenariats avec des entreprises leaders du secteur TIC en Afrique.'],
        ['2024', 'Innovation continue', 'Lancement de nouvelles solutions de sécurité électronique et de systèmes de contrôle d’accès.'],
    ];
    $leaders = [
        ['Janvier Kouakou', 'Fondateur & CEO', 'Expert en génie logiciel, spécialiste des solutions de billetterie et de contrôle d’accès.'],
        ['Marie Koné', 'Directrice Technique', 'Ingénieure en informatique spécialisée dans l’architecture de systèmes complexes.'],
        ['Kouassi N’Guessan', 'Chef de Projet Senior', 'Gestion de projets technologiques complexes et accompagnement client.'],
    ];
@endphp

<x-page-hero
    eyebrow="À propos"
    title="Innover depuis Abidjan, pour l’Afrique."
    lead="Une entreprise ivoirienne dédiée à l'innovation technologique et au développement local."
/>

{{-- HISTOIRE + MISSION --}}
<section class="pb-20 md:pb-28">
    <div class="wrap grid items-center gap-12 lg:grid-cols-[1.1fr_.9fr] lg:gap-16">
        <div data-reveal>
            <p class="eyebrow">Notre histoire</p>
            <h2 class="headline mt-2">Née d’une vision : la technologie au service du terrain.</h2>
            <div class="mt-6 grid gap-4 text-[17px] leading-[1.65] text-muted">
                <p>Créée en janvier 2021 à Abidjan, BWAN TECHNOLOGIES est née de la vision d'un expert en génie logiciel passionné par l'innovation technologique et le développement de l'Afrique.</p>
                <p>Depuis sa création, notre entreprise s'est spécialisée dans la conception de solutions technologiques sur-mesure, répondant aux besoins spécifiques des entreprises ivoiriennes et africaines.</p>
                <p>Notre expertise couvre un large éventail de domaines : logiciels métiers, plateformes web, applications mobiles, solutions de billetterie, systèmes de contrôle d'accès, et distribution d'équipements TIC.</p>
            </div>
        </div>
        <div class="grid gap-4" data-reveal style="--reveal-delay: 120ms">
            <div class="tile-dark p-9">
                <div aria-hidden="true" class="pointer-events-none absolute -top-16 -right-16 h-56 w-56 rounded-full bg-[radial-gradient(closest-side,rgba(58,125,191,.45),transparent)] blur-2xl"></div>
                <p class="relative text-[13px] font-medium text-white/50">Notre mission</p>
                <p class="relative mt-3 text-[21px] leading-[1.4] font-semibold tracking-tight">Accompagner les entreprises africaines dans leur transformation numérique en développant des solutions technologiques innovantes, fiables et adaptées à leurs besoins spécifiques.</p>
            </div>
            <div class="tile p-9">
                <p class="meta">Notre vision</p>
                <p class="mt-3 text-[19px] leading-[1.45] font-semibold tracking-tight">Devenir le leader de l'innovation technologique en Côte d'Ivoire et un acteur clé du développement numérique en Afrique de l'Ouest.</p>
            </div>
        </div>
    </div>
</section>

{{-- VALEURS --}}
<section class="bg-surface py-20 md:py-28">
    <div class="wrap">
        <x-section-heading eyebrow="Nos valeurs" title="Ce qui guide chacune de nos actions." lead="Les valeurs qui guident notre action et définissent notre culture d'entreprise." />
        <div class="mt-14 grid gap-4 sm:grid-cols-2 lg:grid-cols-6">
            @foreach ($values as $i => [$label, $text, $icon, $tone])
                <article @class(['card p-8', 'lg:col-span-2' => $i < 3, 'lg:col-span-3' => $i >= 3]) data-reveal style="--reveal-delay: {{ ($i % 3) * 90 }}ms">
                    <div class="icon-badge {{ $tone }}"><x-icon :name="$icon" /></div>
                    <h3 class="mt-6 text-[21px] font-semibold tracking-tight">{{ $label }}</h3>
                    <p class="mt-2 text-[15px] leading-[1.55] text-muted">{{ $text }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>

{{-- FONDATEUR --}}
<section class="section">
    <div class="wrap">
        <div class="tile grid items-center gap-10 p-9 md:grid-cols-[auto_1fr] md:gap-14 md:p-14" data-reveal>
            <div class="flex h-36 w-36 items-center justify-center rounded-full bg-gradient-to-br from-sky via-leaf to-sun text-[56px] font-semibold text-white shadow-[0_20px_40px_-12px_rgba(58,125,191,.45)] md:h-44 md:w-44 md:text-[68px]">J</div>
            <div>
                <p class="eyebrow">Notre fondateur</p>
                <h2 class="headline mt-2">Janvier Kouakou</h2>
                <p class="mt-1 text-[17px] text-muted">Fondateur & CEO</p>
                <p class="mt-6 max-w-2xl text-[17px] leading-[1.65] text-ink/80">Expert en génie logiciel avec plus de 10 ans d'expérience dans le développement de solutions de billetterie et de contrôle d'accès. Passionné par l'innovation technologique et le développement de l'Afrique.</p>
                <div class="mt-6 flex flex-wrap gap-2">
                    @foreach (['Génie Logiciel', 'Billetterie', 'Contrôle d’Accès', 'Management'] as $skill)
                        <span class="chip bg-white ring-1 ring-black/[.06]">{{ $skill }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ÉVOLUTION --}}
<section class="bg-surface py-20 md:py-28">
    <div class="wrap">
        <x-section-heading eyebrow="Notre évolution" title="Les étapes clés depuis 2021." />
        <ol class="relative mx-auto mt-16 max-w-3xl">
            <span aria-hidden="true" class="absolute top-2 bottom-2 left-[7px] w-px bg-black/10"></span>
            @foreach ($milestones as [$year, $title, $text])
                <li class="relative pb-12 pl-12 last:pb-0" data-reveal>
                    <span aria-hidden="true" class="absolute top-1.5 left-0 h-[15px] w-[15px] rounded-full border-[3px] border-surface bg-brand"></span>
                    <p class="gradient-text inline-block text-[15px] font-semibold">{{ $year }}</p>
                    <h3 class="mt-1 text-[24px] leading-tight font-semibold tracking-tight">{{ $title }}</h3>
                    <p class="mt-2 text-[17px] leading-[1.6] text-muted">{{ $text }}</p>
                </li>
            @endforeach
        </ol>
    </div>
</section>

{{-- DIRECTION --}}
<section class="section">
    <div class="wrap">
        <x-section-heading eyebrow="Équipe dirigeante" title="Les leaders qui pilotent notre croissance." />
        <div class="mt-14 grid gap-5 md:grid-cols-3">
            @foreach ($leaders as $i => [$name, $role, $bio])
                <article class="card p-8 text-center" data-reveal style="--reveal-delay: {{ $i * 90 }}ms">
                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-brand-soft text-[28px] font-semibold text-brand">{{ mb_substr($name, 0, 1) }}</div>
                    <h3 class="mt-6 text-[21px] font-semibold tracking-tight">{{ $name }}</h3>
                    <p class="text-[15px] text-brand">{{ $role }}</p>
                    <p class="mt-3 text-[15px] leading-[1.55] text-muted">{{ $bio }}</p>
                </article>
            @endforeach
        </div>
        <div class="mt-10 text-center" data-reveal>
            <a href="{{ route('team') }}" class="link-more">Voir toute l’équipe</a>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="pb-20 md:pb-28">
    <div class="wrap">
        <div class="tile-dark px-8 py-16 text-center md:py-20" data-reveal>
            <h2 class="headline mx-auto max-w-2xl">Rejoignez-nous dans notre mission.</h2>
            <p class="mx-auto mt-5 max-w-2xl text-[19px] leading-[1.5] text-white/65">Découvrez comment BWAN TECHNOLOGIES peut vous accompagner dans votre transformation numérique et contribuer au développement technologique de l'Afrique.</p>
            <div class="mt-10 flex flex-wrap items-center justify-center gap-x-6 gap-y-4">
                <a href="{{ route('contact') }}" class="btn btn-light">Nous contacter</a>
                <a href="{{ route('services') }}" class="link-more link-more-light">Nos services</a>
            </div>
        </div>
    </div>
</section>
@endsection
