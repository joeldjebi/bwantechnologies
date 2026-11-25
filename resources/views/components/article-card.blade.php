@props(['article', 'delay' => 0, 'headingTag' => 'h3'])

<article class="card group flex flex-col" data-reveal style="--reveal-delay: {{ $delay }}ms">
    <a href="{{ route('blog.show', $article) }}" class="flex flex-1 flex-col p-7">
        <div class="flex items-center justify-between gap-3">
            <span class="chip-soft">{{ $article->category->label() }}</span>
            <span class="meta">{{ $article->published_at->translatedFormat('j M Y') }}</span>
        </div>
        <{{ $headingTag }} class="mt-6 text-[21px] leading-tight font-semibold tracking-tight group-hover:text-brand">{{ $article->title }}</{{ $headingTag }}>
        <p class="mt-3 flex-1 text-[15px] leading-[1.55] text-muted">{{ $article->excerpt }}</p>
        <span class="link-more mt-6 text-[15px]">Lire l’article</span>
    </a>
</article>
