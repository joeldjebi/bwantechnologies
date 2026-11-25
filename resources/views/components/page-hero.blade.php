@props([
    'eyebrow' => null,
    'title',
    'lead' => null,
    'align' => 'center',
])

@php $centered = $align === 'center'; @endphp

<section class="relative overflow-hidden bg-white">
    <div aria-hidden="true" class="pointer-events-none absolute inset-x-0 -top-40 mx-auto h-[420px] max-w-4xl rounded-full bg-[radial-gradient(closest-side,rgba(58,125,191,.10),transparent)] blur-2xl"></div>
    <div @class(['wrap relative pt-16 pb-14 md:pt-28 md:pb-20', 'text-center' => $centered])>
        <div class="hero-fade">
            @isset($back)
                <div @class(['mb-8', 'flex justify-center' => $centered])>{{ $back }}</div>
            @endisset
            @if ($eyebrow)
                <p class="eyebrow">{{ $eyebrow }}</p>
            @endif
            <h1 @class(['display mt-3 max-w-4xl', 'mx-auto' => $centered])>{{ $title }}</h1>
            @if ($lead)
                <p @class(['lead mt-6 max-w-2xl', 'mx-auto' => $centered])>{{ $lead }}</p>
            @endif
            @if (trim($slot))
                <div @class(['mt-10 flex flex-wrap items-center gap-x-6 gap-y-4', 'justify-center' => $centered])>{{ $slot }}</div>
            @endif
        </div>
    </div>
</section>
