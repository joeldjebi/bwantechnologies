@if ($recentArticles->isNotEmpty())
    <div class="tile p-7">
        <h2 class="text-[17px] font-semibold tracking-tight">Articles récents</h2>
        <ul class="mt-4">
            @foreach ($recentArticles as $recentArticle)
                <li class="border-t border-black/[.06] py-4 first:border-0 first:pt-1">
                    <a href="{{ route('blog.show', $recentArticle) }}" class="group block">
                        <p class="text-[15px] leading-snug font-medium group-hover:text-brand">{{ Str::limit($recentArticle->title, 60) }}</p>
                        <p class="meta mt-1">{{ $recentArticle->published_at->translatedFormat('j M Y') }} · {{ $recentArticle->category->label() }}</p>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endif
