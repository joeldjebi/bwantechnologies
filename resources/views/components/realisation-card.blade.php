@props(['realisation', 'delay' => 0])

@php
    $tones = [
        'logiciel-metier' => 'from-[#e9f1fa] to-[#d7e6f6] text-sky',
        'plateforme-web' => 'from-[#eaf5eb] to-[#d6ecd8] text-leaf',
        'application-mobile' => 'from-[#fbf3df] to-[#f6e6bd] text-[#b8861a]',
        'solution-billetterie' => 'from-[#f8ebe5] to-[#f1d6cb] text-clay',
        'systeme-controle-acces' => 'from-[#ececf0] to-[#dcdce2] text-ink',
        'integration-reseau' => 'from-[#e9f1fa] to-[#eaf5eb] text-sky',
    ];
@endphp

<a href="{{ route('realisations.show', $realisation) }}" class="card group flex flex-col" data-reveal style="--reveal-delay: {{ $delay }}ms">
    <div class="relative flex aspect-[16/10] items-center justify-center bg-gradient-to-br {{ $tones[$realisation->type->value] ?? $tones['logiciel-metier'] }}">
        <x-icon :path="$realisation->type->iconPath()" name="custom" class="h-14 w-14 transition duration-700 group-hover:scale-110" />
        <span class="chip absolute top-4 left-4">{{ $realisation->type->label() }}</span>
    </div>
    <div class="flex flex-1 flex-col p-7">
        <p class="meta">{{ $realisation->client }}</p>
        <h3 class="mt-1 text-[21px] leading-tight font-semibold tracking-tight">{{ $realisation->title }}</h3>
        <p class="mt-3 flex-1 text-[15px] leading-[1.55] text-muted">{{ Str::limit($realisation->description, 120) }}</p>
        <span class="link-more mt-5 text-[15px]">Voir le projet</span>
    </div>
</a>
