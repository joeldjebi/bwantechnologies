@extends('layouts.app')

@section('title', 'Blog & Actualités')

@section('content')
<x-page-hero
    eyebrow="Blog & Actualités"
    title="Les dernières tendances, décryptées."
    lead="Restez informé des dernières tendances technologiques et de nos actualités."
/>

<section class="pb-20 md:pb-28">
    <div class="wrap">
        <nav aria-label="Filtrer par catégorie" class="-mx-5 flex gap-2 overflow-x-auto px-5 pb-2 md:mx-0 md:flex-wrap md:justify-center md:px-0" data-reveal>
            <a href="{{ route('blog.index') }}" class="{{ $selectedCategory ? 'pill' : 'pill-active' }}">Tous les articles</a>
            @foreach ($categories as $category)
                <a href="{{ route('blog.index', ['category' => $category->value]) }}" class="{{ $selectedCategory === $category ? 'pill-active' : 'pill' }}" @if ($selectedCategory === $category) aria-current="true" @endif>
                    {{ $category->label() }}
                    <span class="ml-1 opacity-50">{{ $categoryCounts[$category->value] ?? 0 }}</span>
                </a>
            @endforeach
        </nav>

        <div class="mt-12 grid gap-10 lg:grid-cols-[1fr_320px]">
            <div class="min-w-0">
                <div class="grid gap-5 md:grid-cols-2">
                    @forelse ($articles as $i => $article)
                        <x-article-card :article="$article" :delay="($i % 2) * 90" heading-tag="h2" />
                    @empty
                        <p class="tile p-12 text-center text-muted md:col-span-2">Aucun article dans cette catégorie pour le moment.</p>
                    @endforelse
                </div>
                <div class="mt-14">{{ $articles->links() }}</div>
            </div>

            <aside class="grid content-start gap-5 lg:sticky lg:top-24 lg:self-start">
                @include('blog.partials.recent-articles')
                <div class="tile-dark p-7">
                    <h2 class="text-[17px] font-semibold tracking-tight">Une question, un projet ?</h2>
                    <p class="mt-2 text-[15px] leading-[1.55] text-white/65">Nos équipes vous répondent et vous accompagnent dans votre transformation numérique.</p>
                    <a href="{{ route('contact') }}" class="btn btn-light btn-sm mt-6">Nous contacter</a>
                </div>
            </aside>
        </div>
    </div>
</section>

{{-- SUJETS --}}
<section class="bg-surface py-20 md:py-28">
    <div class="wrap">
        <x-section-heading eyebrow="Sujets populaires" title="Ce qui passionne notre communauté." />
        <div class="mt-14 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ([['Innovation Tech', 'Les dernières innovations technologiques en Afrique', 'sparkles', 'bg-sky/10 text-sky'], ['Développement', 'Conseils et bonnes pratiques en développement', 'code', 'bg-leaf/10 text-leaf'], ['Marché Local', 'Actualités du secteur IT en Côte d’Ivoire', 'trending', 'bg-sun/15 text-[#b8861a]'], ['Carrières', 'Conseils carrière et opportunités IT', 'briefcase', 'bg-clay/10 text-clay']] as $i => [$label, $text, $icon, $tone])
                <article class="card p-7" data-reveal style="--reveal-delay: {{ $i * 80 }}ms">
                    <div class="icon-badge {{ $tone }}"><x-icon :name="$icon" /></div>
                    <h3 class="mt-6 text-[19px] font-semibold tracking-tight">{{ $label }}</h3>
                    <p class="mt-2 text-[15px] leading-[1.55] text-muted">{{ $text }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endsection
