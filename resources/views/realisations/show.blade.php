@extends('layouts.app')

@section('title', $realisation->title)
@section('description', Str::limit($realisation->description, 155))

@section('content')
<x-page-hero :eyebrow="$realisation->type->label()" :title="$realisation->title">
    <x-slot:back>
        <a href="{{ route('realisations.index') }}" class="back-link">Toutes les réalisations</a>
    </x-slot:back>
    <span class="chip-soft gap-2"><x-icon name="briefcase" class="h-4 w-4" /> {{ $realisation->client }}</span>
    <span class="chip-soft gap-2"><x-icon name="calendar" class="h-4 w-4" /> {{ ucfirst($realisation->completed_at->translatedFormat('F Y')) }}</span>
</x-page-hero>

<section class="pb-20 md:pb-28">
    <div class="wrap grid gap-12 lg:grid-cols-[1fr_340px] lg:gap-16">
        <div class="min-w-0">
            <div data-reveal>
                <h2 class="title">À propos du projet</h2>
                <div class="prose-apple mt-5">{!! nl2br(e($realisation->description)) !!}</div>
            </div>

            @if (! empty($realisation->features))
                <div class="mt-14" data-reveal>
                    <h2 class="title">Fonctionnalités</h2>
                    <ul class="mt-6 grid gap-x-8 sm:grid-cols-2">
                        @foreach ($realisation->features as $feature)
                            <li class="flex items-start gap-3 border-t border-black/[.08] py-4 text-[17px]">
                                <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-brand text-white"><x-icon name="check" class="h-3 w-3" stroke-width="2.5" /></span>
                                {{ $feature }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (! empty($realisation->technologies))
                <div class="mt-14" data-reveal>
                    <h2 class="title">Technologies utilisées</h2>
                    <div class="mt-6 flex flex-wrap gap-2">
                        @foreach ($realisation->technologies as $technology)
                            <span class="chip-soft">{{ $technology }}</span>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        <aside class="lg:sticky lg:top-24 lg:self-start" data-reveal style="--reveal-delay: 120ms">
            <div class="tile p-8">
                <h2 class="text-[19px] font-semibold tracking-tight">Détails du projet</h2>
                <dl class="mt-6 grid gap-5">
                    <div><dt class="meta">Client</dt><dd class="mt-0.5 text-[17px]">{{ $realisation->client }}</dd></div>
                    <div><dt class="meta">Type</dt><dd class="mt-0.5 text-[17px]">{{ $realisation->type->label() }}</dd></div>
                    <div><dt class="meta">Date de réalisation</dt><dd class="mt-0.5 text-[17px]">{{ ucfirst($realisation->completed_at->translatedFormat('F Y')) }}</dd></div>
                    @if ($realisation->duration)
                        <div><dt class="meta">Durée</dt><dd class="mt-0.5 text-[17px]">{{ $realisation->duration }}</dd></div>
                    @endif
                    @if ($realisation->budget)
                        <div><dt class="meta">Budget</dt><dd class="mt-0.5 text-[17px]">{{ $realisation->budget }}</dd></div>
                    @endif
                </dl>
                <a href="{{ route('contact') }}" class="btn btn-primary mt-8 w-full">Demander un projet similaire</a>
            </div>
        </aside>
    </div>
</section>

@if ($relatedRealisations->isNotEmpty())
    <section class="bg-surface py-20 md:py-28">
        <div class="wrap">
            <x-section-heading eyebrow="Projets similaires" title="Dans la même catégorie." />
            <div class="mt-14 grid gap-5 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($relatedRealisations as $i => $related)
                    <x-realisation-card :realisation="$related" :delay="$i * 90" />
                @endforeach
            </div>
            <div class="mt-12 text-center" data-reveal>
                <a href="{{ route('realisations.index') }}" class="link-more">Voir tous nos projets</a>
            </div>
        </div>
    </section>
@endif

<section class="section">
    <div class="wrap">
        <div class="tile-dark px-8 py-16 text-center md:py-20" data-reveal>
            <h2 class="headline mx-auto max-w-2xl">Vous avez un projet similaire ?</h2>
            <p class="mx-auto mt-5 max-w-2xl text-[19px] leading-[1.5] text-white/65">Contactez-nous pour discuter de vos besoins et découvrir comment nous pouvons vous aider à réaliser votre projet.</p>
            <div class="mt-10 flex flex-wrap items-center justify-center gap-x-6 gap-y-4">
                <a href="{{ route('contact') }}" class="btn btn-light">Demander un devis</a>
                <a href="{{ route('realisations.index') }}" class="link-more link-more-light">Voir nos autres projets</a>
            </div>
        </div>
    </div>
</section>
@endsection
