@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination" class="flex items-center justify-center gap-2">
        @if ($paginator->onFirstPage())
            <span class="flex h-10 w-10 items-center justify-center rounded-full text-xl text-black/20" aria-hidden="true">&lsaquo;</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="flex h-10 w-10 items-center justify-center rounded-full text-xl text-ink transition hover:bg-surface" aria-label="Page précédente">&lsaquo;</a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="px-2 text-[15px] text-subtle">{{ $element }}</span>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span aria-current="page" class="flex h-10 min-w-10 items-center justify-center rounded-full bg-ink px-3 text-[15px] font-medium text-white">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="flex h-10 min-w-10 items-center justify-center rounded-full px-3 text-[15px] text-ink transition hover:bg-surface" aria-label="Page {{ $page }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="flex h-10 w-10 items-center justify-center rounded-full text-xl text-ink transition hover:bg-surface" aria-label="Page suivante">&rsaquo;</a>
        @else
            <span class="flex h-10 w-10 items-center justify-center rounded-full text-xl text-black/20" aria-hidden="true">&rsaquo;</span>
        @endif
    </nav>
@endif
