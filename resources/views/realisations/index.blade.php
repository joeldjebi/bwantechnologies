@extends('layouts.app')

@section('title', 'Nos Réalisations')

@section('content')
@php
    $testimonials = [
        ['BWAN TECHNOLOGIES a transformé notre gestion hôtelière avec un système sur-mesure qui a considérablement amélioré notre efficacité opérationnelle.', 'Dr. Koffi Assi', 'Directeur Général, Hôtel Ivoire'],
        ['La plateforme e-commerce développée par BWAN TECHNOLOGIES nous a permis d’augmenter nos ventes de 150% en seulement 6 mois.', 'Mme. Aminata Coulibaly', 'Directrice Marketing, AfriMarket CI'],
        ['Le système de billetterie électronique a révolutionné la gestion de notre festival. Plus de files d’attente et une meilleure expérience pour nos visiteurs.', 'M. Jean-Baptiste Kouamé', 'Organisateur, Festival des Arts de Grand-Bassam'],
        ['La plateforme de gestion scolaire a simplifié nos processus administratifs et amélioré la communication avec les parents.', 'Dr. Fatou Traoré', 'Proviseur, Lycée Moderne d’Abidjan'],
    ];
@endphp

<x-page-hero
    eyebrow="Réalisations"
    title="Des projets qui témoignent de notre expertise."
    lead="Découvrez les projets qui témoignent de notre expertise et de notre engagement."
/>

<section class="pb-20 md:pb-28">
    <div class="wrap">
        {{-- Filtres --}}
        <nav aria-label="Filtrer par type de projet" class="-mx-5 flex gap-2 overflow-x-auto px-5 pb-2 md:mx-0 md:flex-wrap md:justify-center md:px-0" data-reveal>
            <a href="{{ route('realisations.index') }}" class="{{ $selectedType ? 'pill' : 'pill-active' }}">Tous les projets</a>
            @foreach ($types as $type)
                <a href="{{ route('realisations.index', ['type' => $type->value]) }}" class="{{ $selectedType === $type ? 'pill-active' : 'pill' }}" @if ($selectedType === $type) aria-current="true" @endif>{{ $type->label() }}</a>
            @endforeach
        </nav>

        <div class="mt-12 grid gap-5 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($realisations as $i => $realisation)
                <x-realisation-card :realisation="$realisation" :delay="($i % 3) * 90" />
            @empty
                <p class="tile p-12 text-center text-muted md:col-span-2 lg:col-span-3">Aucun projet ne correspond à ce filtre.</p>
            @endforelse
        </div>

        <div class="mt-14">{{ $realisations->links() }}</div>
    </div>
</section>

{{-- CHIFFRES --}}
<section class="bg-night py-20 text-white md:py-28">
    <div class="wrap">
        <x-section-heading eyebrow="En chiffres" title="Nos projets, en quelques nombres." :dark="true" />
        <div class="mt-16 grid grid-cols-2 gap-x-6 gap-y-12 md:grid-cols-4">
            @foreach ([['150+', 'Projets réalisés avec succès'], ['98%', 'Clients satisfaits'], ['50+', 'Entreprises accompagnées'], ['24/7', 'Assistance technique']] as $i => [$value, $label])
                <div class="text-center" data-reveal style="--reveal-delay: {{ $i * 90 }}ms">
                    <p class="gradient-text-light text-[48px] leading-none font-semibold tracking-[-0.03em] md:text-[64px]">{{ $value }}</p>
                    <p class="mt-3 text-[15px] text-white/60 md:text-[17px]">{{ $label }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- TÉMOIGNAGES --}}
<section class="section">
    <div class="wrap">
        <x-section-heading eyebrow="Témoignages" title="Ce que disent nos clients." lead="La satisfaction de nos clients est notre plus grande récompense." />
        <div class="mt-14 grid gap-5 md:grid-cols-2">
            @foreach ($testimonials as $i => [$quote, $name, $role])
                <figure class="tile flex flex-col p-8 md:p-10" data-reveal style="--reveal-delay: {{ ($i % 2) * 90 }}ms">
                    <p class="text-[13px] tracking-[0.2em] text-sun" aria-label="Avis client">★★★★★</p>
                    <blockquote class="mt-5 flex-1 text-[19px] leading-[1.55]">« {{ $quote }} »</blockquote>
                    <figcaption class="mt-8">
                        <span class="block text-[15px] font-semibold">{{ $name }}</span>
                        <span class="block text-[13px] text-muted">{{ $role }}</span>
                    </figcaption>
                </figure>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="pb-20 md:pb-28">
    <div class="wrap">
        <div class="tile-dark px-8 py-16 text-center md:py-20" data-reveal>
            <h2 class="headline mx-auto max-w-2xl">Prêt à réaliser <span class="gradient-text-light">votre projet ?</span></h2>
            <p class="mx-auto mt-5 max-w-2xl text-[19px] leading-[1.5] text-white/65">Contactez-nous pour discuter de votre projet et découvrir comment nous pouvons vous accompagner dans sa réalisation.</p>
            <div class="mt-10 flex flex-wrap items-center justify-center gap-x-6 gap-y-4">
                <a href="{{ route('contact') }}" class="btn btn-light">Demander un devis</a>
                <a href="{{ route('services') }}" class="link-more link-more-light">Nos services</a>
            </div>
        </div>
    </div>
</section>
@endsection
