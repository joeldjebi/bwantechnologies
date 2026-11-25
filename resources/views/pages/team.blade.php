@extends('layouts.app')

@section('title', 'Notre Équipe')

@section('content')
@php
    $leaders = [
        ['Janvier Kouakou', 'Fondateur & CEO', 'Expert en génie logiciel, spécialiste des solutions de billetterie et de contrôle d’accès.', ['Génie Logiciel', 'Billetterie', 'Contrôle d’Accès']],
        ['Marie Koné', 'Directrice Technique', 'Ingénieure en informatique spécialisée dans l’architecture de systèmes complexes et la gestion d’équipes de développement.', ['Architecture Logicielle', 'DevOps', 'Management Technique']],
        ['Kouassi N’Guessan', 'Chef de Projet Senior', 'Chef de projet expérimenté dans la gestion de projets technologiques complexes et l’accompagnement client.', ['Gestion de Projet', 'Agile', 'Relation Client']],
    ];
    $members = [
        ['Fatou Traoré', 'Développeuse Full Stack', 'Passionnée par les technologies web modernes et l’expérience utilisateur.'],
        ['Jean-Baptiste Yao', 'Développeur Mobile', 'Spécialiste du développement d’applications mobiles cross-platform.'],
        ['Aminata Diallo', 'Consultante IT', 'Accompagne les entreprises dans leur transformation numérique.'],
    ];
    $avatarTones = ['bg-sky/10 text-sky', 'bg-leaf/10 text-leaf', 'bg-sun/15 text-[#b8861a]', 'bg-clay/10 text-clay'];
@endphp

<x-page-hero
    eyebrow="Notre équipe"
    title="Les talents derrière chaque projet."
    lead="Rencontrez les talents qui font de BWAN TECHNOLOGIES un leader de l'innovation."
/>

{{-- FONDATEUR --}}
<section class="pb-20 md:pb-28">
    <div class="wrap">
        <div class="tile-dark grid items-center gap-10 p-9 md:grid-cols-[auto_1fr] md:gap-14 md:p-14" data-reveal>
            <div aria-hidden="true" class="pointer-events-none absolute -right-24 -bottom-24 h-80 w-80 rounded-full bg-[radial-gradient(closest-side,rgba(58,125,191,.45),transparent)] blur-2xl"></div>
            <div class="relative flex h-36 w-36 items-center justify-center rounded-full bg-gradient-to-br from-sky via-leaf to-sun text-[56px] font-semibold text-white md:h-44 md:w-44 md:text-[68px]">J</div>
            <div class="relative">
                <p class="eyebrow !text-[#8cc0f0]">Notre fondateur</p>
                <h2 class="headline mt-2">Janvier Kouakou</h2>
                <p class="mt-1 text-[17px] text-white/60">Fondateur & CEO · 10+ années d’expérience</p>
                <p class="mt-6 max-w-2xl text-[17px] leading-[1.65] text-white/80">Expert en génie logiciel avec plus de 10 ans d'expérience dans le développement de solutions de billetterie et de contrôle d'accès. Passionné par l'innovation technologique et le développement de l'Afrique.</p>
                <div class="mt-6 flex flex-wrap gap-2">
                    @foreach (['Génie Logiciel', 'Billetterie', 'Contrôle d’Accès', 'Management'] as $skill)
                        <span class="inline-flex rounded-full bg-white/10 px-3 py-1 text-[12px] font-medium">{{ $skill }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- DIRECTION --}}
<section class="bg-surface py-20 md:py-28">
    <div class="wrap">
        <x-section-heading eyebrow="Équipe dirigeante" title="Les leaders qui pilotent notre vision." />
        <div class="mt-14 grid gap-5 md:grid-cols-3">
            @foreach ($leaders as $i => [$name, $role, $bio, $skills])
                <article class="card flex flex-col p-8" data-reveal style="--reveal-delay: {{ $i * 90 }}ms">
                    <div class="flex h-16 w-16 items-center justify-center rounded-full text-[24px] font-semibold {{ $avatarTones[$i % 4] }}">{{ mb_substr($name, 0, 1) }}</div>
                    <h3 class="mt-6 text-[21px] font-semibold tracking-tight">{{ $name }}</h3>
                    <p class="text-[15px] text-brand">{{ $role }}</p>
                    <p class="mt-3 flex-1 text-[15px] leading-[1.55] text-muted">{{ $bio }}</p>
                    <div class="mt-6 flex flex-wrap gap-2">
                        @foreach ($skills as $skill)
                            <span class="chip-soft">{{ $skill }}</span>
                        @endforeach
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

{{-- ÉQUIPE --}}
<section class="section">
    <div class="wrap">
        <x-section-heading eyebrow="Nos talents" title="Ils transforment vos idées en solutions." />
        <div class="mt-14 grid gap-5 md:grid-cols-3">
            @foreach ($members as $i => [$name, $role, $bio])
                <article class="tile p-8 text-center" data-reveal style="--reveal-delay: {{ $i * 90 }}ms">
                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-white text-[28px] font-semibold shadow-sm {{ explode(' ', $avatarTones[($i + 1) % 4])[1] }}">{{ mb_substr($name, 0, 1) }}</div>
                    <h3 class="mt-6 text-[21px] font-semibold tracking-tight">{{ $name }}</h3>
                    <p class="text-[15px] text-muted">{{ $role }}</p>
                    <p class="mt-3 text-[15px] leading-[1.55] text-muted">{{ $bio }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>

{{-- CHIFFRES --}}
<section class="bg-night py-20 text-white md:py-28">
    <div class="wrap">
        <x-section-heading eyebrow="En chiffres" title="Une expertise collective." :dark="true" />
        <div class="mt-16 grid grid-cols-2 gap-x-6 gap-y-12 md:grid-cols-4">
            @foreach ([['7', 'Membres', 'Dans notre équipe'], ['5+', 'Départements', 'Développement, Design, Commercial'], ['10+', 'Technologies', 'Maîtrisées par l’équipe'], ['100%', 'Engagement', 'Dans chaque projet']] as $i => [$value, $label, $text])
                <div class="text-center" data-reveal style="--reveal-delay: {{ $i * 90 }}ms">
                    <p class="gradient-text-light text-[48px] leading-none font-semibold tracking-[-0.03em] md:text-[64px]">{{ $value }}</p>
                    <p class="mt-3 text-[17px] font-semibold">{{ $label }}</p>
                    <p class="text-[14px] text-white/55">{{ $text }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CULTURE --}}
<section class="section">
    <div class="wrap">
        <x-section-heading eyebrow="Culture d’équipe" title="Les valeurs qui nous unissent." />
        <div class="mt-14 grid gap-5 md:grid-cols-3">
            @foreach ([['Collaboration', 'Nous travaillons ensemble pour atteindre des objectifs communs.', 'users', 'bg-sky/10 text-sky'], ['Innovation', 'Nous encourageons la créativité et les nouvelles idées.', 'lightbulb', 'bg-sun/15 text-[#b8861a]'], ['Apprentissage', 'Nous investissons dans la formation et le développement.', 'book', 'bg-leaf/10 text-leaf']] as $i => [$label, $text, $icon, $tone])
                <article class="tile p-8" data-reveal style="--reveal-delay: {{ $i * 90 }}ms">
                    <div class="icon-badge {{ $tone }}"><x-icon :name="$icon" /></div>
                    <h3 class="mt-6 text-[21px] font-semibold tracking-tight">{{ $label }}</h3>
                    <p class="mt-2 text-[15px] leading-[1.55] text-muted">{{ $text }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="pb-20 md:pb-28">
    <div class="wrap">
        <div class="tile-dark px-8 py-16 text-center md:py-20" data-reveal>
            <h2 class="headline mx-auto max-w-2xl">Rejoignez notre équipe.</h2>
            <p class="mx-auto mt-5 max-w-2xl text-[19px] leading-[1.5] text-white/65">Vous êtes passionné par la technologie et souhaitez contribuer à l'innovation en Afrique ? Découvrez nos opportunités de carrière.</p>
            <div class="mt-10 flex flex-wrap items-center justify-center gap-x-6 gap-y-4">
                <a href="{{ route('jobs.index') }}" class="btn btn-light">Voir nos offres</a>
                <a href="{{ route('contact') }}" class="link-more link-more-light">Candidature spontanée</a>
            </div>
        </div>
    </div>
</section>
@endsection
