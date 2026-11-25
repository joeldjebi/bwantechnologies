@extends('layouts.app')

@section('title', $jobOffer->title)
@section('description', Str::limit($jobOffer->description, 155))

@section('content')
@php $applyUrl = 'mailto:infos@bwantechnologies.com?subject='.rawurlencode('Candidature : '.$jobOffer->title); @endphp

<section class="wrap pt-12 pb-20 md:pt-20 md:pb-28">
    <a href="{{ route('jobs.index') }}" class="back-link">Toutes les offres</a>

    <div class="mt-10 grid gap-12 lg:grid-cols-[1fr_360px] lg:gap-16">
        <article class="hero-fade min-w-0">
            <p class="eyebrow">{{ $jobOffer->department->label() }}</p>
            <h1 class="mt-2 text-[36px] leading-[1.08] font-semibold tracking-[-0.03em] text-balance md:text-[56px]">{{ $jobOffer->title }}</h1>
            <div class="mt-6 flex flex-wrap gap-2">
                <span class="chip-soft gap-1.5"><x-icon name="briefcase" class="h-4 w-4" /> {{ $jobOffer->contract_type->label() }}</span>
                <span class="chip-soft gap-1.5"><x-icon name="pin" class="h-4 w-4" /> {{ $jobOffer->location }}</span>
            </div>

            <div class="divider mt-10"></div>

            <h2 class="title mt-10">Description du poste</h2>
            <div class="prose-apple mt-5">{!! nl2br(e($jobOffer->description)) !!}</div>

            @if ($jobOffer->requirements)
                <h2 class="title mt-12">Profil recherché</h2>
                <div class="prose-apple mt-5">{!! nl2br(e($jobOffer->requirements)) !!}</div>
            @endif

            @if (! empty($jobOffer->skills))
                <h2 class="title mt-12">Compétences</h2>
                <div class="mt-5 flex flex-wrap gap-2">
                    @foreach ($jobOffer->skills as $skill)
                        <span class="chip-soft">{{ $skill }}</span>
                    @endforeach
                </div>
            @endif
        </article>

        <aside class="lg:sticky lg:top-24 lg:self-start">
            <div class="tile p-8">
                <h2 class="text-[19px] font-semibold tracking-tight">Détails de l'offre</h2>
                <dl class="mt-6 grid gap-5">
                    <div><dt class="meta">Type de contrat</dt><dd class="mt-0.5 text-[17px]">{{ $jobOffer->contract_type->label() }}</dd></div>
                    <div><dt class="meta">Département</dt><dd class="mt-0.5 text-[17px]">{{ $jobOffer->department->label() }}</dd></div>
                    <div><dt class="meta">Lieu</dt><dd class="mt-0.5 text-[17px]">{{ $jobOffer->location }}</dd></div>
                    @if ($jobOffer->salary)
                        <div><dt class="meta">Salaire</dt><dd class="mt-0.5 text-[17px]">{{ $jobOffer->salary }}</dd></div>
                    @endif
                </dl>
                <a href="{{ $applyUrl }}" class="btn btn-primary mt-8 w-full">Postuler</a>
                <p class="mt-3 text-center text-[13px] text-muted">Envoyez votre CV à infos@bwantechnologies.com</p>
            </div>
        </aside>
    </div>
</section>
@endsection
