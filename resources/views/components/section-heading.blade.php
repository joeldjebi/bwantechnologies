@props([
    'eyebrow' => null,
    'title',
    'lead' => null,
    'dark' => false,
])

<div {{ $attributes->class(['text-center']) }} data-reveal>
    <div class="mx-auto max-w-3xl">
        @if ($eyebrow)
            <p @class(['eyebrow', '!text-[#8cc0f0]' => $dark])>{{ $eyebrow }}</p>
        @endif
        <h2 class="headline mt-2">{{ $title }}</h2>
        @if ($lead)
            <p @class(['lead mt-5', '!text-white/65' => $dark])>{{ $lead }}</p>
        @endif
    </div>
</div>
