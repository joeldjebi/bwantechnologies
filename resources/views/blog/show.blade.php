@extends('layouts.app')

@section('title', $article->title)
@section('description', $article->excerpt)

@section('content')
@php $articleUrl = route('blog.show', $article); @endphp

<article>
    <header class="wrap max-w-[820px] pt-16 pb-12 text-center md:pt-24 md:pb-16">
        <div class="hero-fade">
            <a href="{{ route('blog.index') }}" class="back-link">Blog</a>
            <p class="mt-8"><span class="chip-soft">{{ $article->category->label() }}</span></p>
            <h1 class="mt-5 text-[36px] leading-[1.08] font-semibold tracking-[-0.03em] text-balance md:text-[56px]">{{ $article->title }}</h1>
            <div class="mt-6 flex items-center justify-center gap-3 text-[15px] text-muted">
                <span class="flex h-8 w-8 items-center justify-center rounded-full bg-brand-soft text-[13px] font-semibold text-brand">{{ Str::upper(Str::substr($article->author_name, 0, 1)) }}</span>
                <span>{{ $article->author_name }}</span>
                <span aria-hidden="true">·</span>
                <time datetime="{{ $article->published_at->toDateString() }}">{{ $article->published_at->translatedFormat('j F Y') }}</time>
            </div>
        </div>
    </header>

    <div class="wrap max-w-[720px] pb-20 md:pb-28">
        <p class="text-[22px] leading-[1.5] font-medium tracking-tight text-ink" data-reveal>{{ $article->excerpt }}</p>
        <div class="divider my-10"></div>
        <div class="prose-apple" data-reveal>{!! nl2br(e($article->content)) !!}</div>

        @if (! empty($article->tags))
            <div class="mt-12 flex flex-wrap gap-2" aria-label="Mots-clés">
                @foreach ($article->tags as $tag)
                    <span class="chip-soft">#{{ $tag }}</span>
                @endforeach
            </div>
        @endif

        <div class="divider mt-12"></div>
        <div class="mt-8 flex flex-wrap items-center justify-between gap-4">
            <p class="text-[15px] font-semibold">Partager cet article</p>
            <div class="flex flex-wrap gap-2">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($articleUrl) }}" target="_blank" rel="noopener" class="pill">Facebook</a>
                <a href="https://twitter.com/intent/tweet?url={{ urlencode($articleUrl) }}&text={{ urlencode($article->title) }}" target="_blank" rel="noopener" class="pill">X (Twitter)</a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode($articleUrl) }}" target="_blank" rel="noopener" class="pill">LinkedIn</a>
                <button type="button" data-copy-link="{{ $articleUrl }}" class="pill inline-flex items-center gap-1.5">
                    <x-icon name="link" class="h-4 w-4" />
                    <span data-copy-label>Copier le lien</span>
                </button>
            </div>
        </div>
    </div>
</article>

@if ($relatedArticles->isNotEmpty())
    <section class="bg-surface py-20 md:py-28">
        <div class="wrap">
            <x-section-heading eyebrow="Articles similaires" title="À lire aussi." />
            <div class="mt-14 grid gap-5 md:grid-cols-3">
                @foreach ($relatedArticles as $i => $relatedArticle)
                    <x-article-card :article="$relatedArticle" :delay="$i * 90" />
                @endforeach
            </div>
            <div class="mt-10 text-center" data-reveal>
                <a href="{{ route('blog.index') }}" class="link-more">Voir tous les articles</a>
            </div>
        </div>
    </section>
@elseif ($recentArticles->where('id', '!=', $article->id)->isNotEmpty())
    <section class="bg-surface py-20 md:py-28">
        <div class="wrap">
            <x-section-heading eyebrow="Articles récents" title="À lire aussi." />
            <div class="mt-14 grid gap-5 md:grid-cols-3">
                @foreach ($recentArticles->where('id', '!=', $article->id)->take(3)->values() as $i => $recentArticle)
                    <x-article-card :article="$recentArticle" :delay="$i * 90" />
                @endforeach
            </div>
        </div>
    </section>
@endif

<section class="section">
    <div class="wrap">
        <div class="tile-dark px-8 py-16 text-center md:py-20" data-reveal>
            <h2 class="headline mx-auto max-w-2xl">Vous avez un projet en tête ?</h2>
            <p class="mx-auto mt-5 max-w-2xl text-[19px] leading-[1.5] text-white/65">Contactez-nous pour discuter de vos besoins technologiques et découvrir comment nous pouvons vous aider à concrétiser vos idées.</p>
            <div class="mt-10 flex flex-wrap items-center justify-center gap-x-6 gap-y-4">
                <a href="{{ route('contact') }}" class="btn btn-light">Nous contacter</a>
                <a href="{{ route('services') }}" class="link-more link-more-light">Nos services</a>
            </div>
        </div>
    </div>
</section>
@endsection
