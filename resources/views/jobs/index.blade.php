@extends('layouts.app')

@section('title', "Offres d'emploi")

@section('content')
@php
    $perks = [
        ['Innovation', 'Travaillez sur des projets innovants qui transforment l’Afrique.', 'sparkles', 'bg-sky/10 text-sky'],
        ['Équipe dynamique', 'Rejoignez une équipe passionnée et collaborative.', 'users', 'bg-leaf/10 text-leaf'],
        ['Formation continue', 'Développez vos compétences avec nos programmes de formation.', 'book', 'bg-sun/15 text-[#b8861a]'],
        ['Impact local', 'Contribuez au développement technologique de la Côte d’Ivoire.', 'globe', 'bg-clay/10 text-clay'],
        ['Rémunération attractive', 'Salaire compétitif et avantages sociaux.', 'cash', 'bg-sky/10 text-sky'],
        ['Équilibre vie pro', 'Horaires flexibles et télétravail possible.', 'clock', 'bg-leaf/10 text-leaf'],
    ];
@endphp

<x-page-hero
    eyebrow="Carrières"
    title="Rejoignez notre équipe."
    lead="Contribuez à l'innovation technologique en Côte d'Ivoire et en Afrique."
>
    <a href="#offres" class="btn btn-primary">Voir les offres</a>
    <a href="{{ route('contact') }}" class="link-more">Candidature spontanée</a>
</x-page-hero>

<section id="offres" class="scroll-mt-20 bg-surface py-20 md:py-28">
    <div class="wrap max-w-[960px]">
        <x-section-heading eyebrow="Opportunités" title="Nos offres d’emploi." lead="Découvrez les opportunités de carrière chez BWAN TECHNOLOGIES." />

        <form method="GET" action="{{ route('jobs.index') }}#offres" class="mt-12 grid gap-3 rounded-[24px] bg-white p-3 shadow-[0_1px_2px_rgba(0,0,0,.04)] md:grid-cols-[1fr_1fr_auto]" data-reveal>
            <div>
                <label for="contract_type" class="sr-only">Type de contrat</label>
                <select id="contract_type" name="contract_type" class="field bg-surface !ring-0">
                    <option value="">Tous les contrats</option>
                    @foreach ($contractTypes as $contractType)
                        <option value="{{ $contractType->value }}" @selected($selectedContractType === $contractType)>{{ $contractType->label() }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="department" class="sr-only">Département</label>
                <select id="department" name="department" class="field bg-surface !ring-0">
                    <option value="">Tous les départements</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->value }}" @selected($selectedDepartment === $department)>{{ $department->label() }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Filtrer</button>
        </form>

        <div class="mt-8 overflow-hidden rounded-[28px] bg-white" data-reveal>
            @forelse ($jobOffers as $jobOffer)
                <a href="{{ route('jobs.show', $jobOffer) }}" class="group flex items-center justify-between gap-6 border-b border-black/[.06] px-7 py-7 transition-colors last:border-0 hover:bg-surface/60 md:px-10">
                    <div class="min-w-0">
                        <p class="meta">{{ $jobOffer->department->label() }}</p>
                        <h3 class="mt-1 text-[19px] leading-snug font-semibold tracking-tight md:text-[21px]">{{ $jobOffer->title }}</h3>
                        <p class="mt-2 line-clamp-2 text-[15px] leading-[1.55] text-muted">{{ Str::limit($jobOffer->description, 160) }}</p>
                        <div class="mt-4 flex flex-wrap gap-2">
                            <span class="chip-soft">{{ $jobOffer->contract_type->label() }}</span>
                            <span class="chip-soft">{{ $jobOffer->location }}</span>
                            @if ($jobOffer->salary)
                                <span class="chip-soft">{{ $jobOffer->salary }}</span>
                            @endif
                            @foreach (array_slice($jobOffer->skills ?? [], 0, 3) as $skill)
                                <span class="inline-flex items-center rounded-full px-3 py-1.5 text-[13px] text-muted ring-1 ring-black/[.08]">{{ $skill }}</span>
                            @endforeach
                            @if (count($jobOffer->skills ?? []) > 3)
                                <span class="inline-flex items-center px-1 py-1.5 text-[13px] text-subtle">+{{ count($jobOffer->skills) - 3 }} autres</span>
                            @endif
                        </div>
                    </div>
                    <span class="hidden shrink-0 text-[15px] text-brand md:inline-flex">Voir l'offre <span aria-hidden="true" class="ml-1 transition duration-300 group-hover:translate-x-1">&rsaquo;</span></span>
                    <span aria-hidden="true" class="text-2xl text-subtle md:hidden">&rsaquo;</span>
                </a>
            @empty
                <p class="p-12 text-center text-muted">Aucune offre ne correspond à ces critères pour le moment.</p>
            @endforelse
        </div>

        <div class="mt-12">{{ $jobOffers->links() }}</div>
    </div>
</section>

{{-- AVANTAGES --}}
<section class="section">
    <div class="wrap">
        <x-section-heading eyebrow="Pourquoi nous rejoindre" title="Un cadre pour grandir et avoir de l’impact." lead="Découvrez les avantages de faire partie de l'équipe BWAN TECHNOLOGIES." />
        <div class="mt-14 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($perks as $i => [$label, $text, $icon, $tone])
                <article class="tile p-8" data-reveal style="--reveal-delay: {{ ($i % 3) * 90 }}ms">
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
            <h2 class="headline mx-auto max-w-2xl">Vous ne trouvez pas votre poste idéal ?</h2>
            <p class="mx-auto mt-5 max-w-2xl text-[19px] leading-[1.5] text-white/65">Envoyez-nous votre candidature spontanée. Nous sommes toujours à la recherche de talents passionnés par la technologie.</p>
            <div class="mt-10 flex flex-wrap items-center justify-center gap-x-6 gap-y-4">
                <a href="{{ route('contact') }}" class="btn btn-light">Candidature spontanée</a>
                <a href="{{ route('about') }}" class="link-more link-more-light">En savoir plus sur nous</a>
            </div>
        </div>
    </div>
</section>
@endsection
