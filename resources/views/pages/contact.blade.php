@extends('layouts.app')

@section('title', 'Contact')

@section('content')
@php
    $faqs = [
        ['Quels sont vos délais de développement ?', "Les délais varient selon la complexité du projet. Pour une application web simple, comptez 2-4 semaines. Pour des projets plus complexes, nous établissons un planning détaillé lors de la phase d'analyse."],
        ['Proposez-vous un support après livraison ?', 'Oui, nous offrons un support technique complet après la livraison de votre projet, incluant maintenance, mises à jour et assistance utilisateur.'],
        ["Travaillez-vous avec des entreprises à l'international ?", "Bien que nous soyons basés en Côte d'Ivoire, nous travaillons avec des clients dans toute l'Afrique de l'Ouest et sommes ouverts aux collaborations internationales."],
        ['Comment se déroule un projet type ?', 'Notre processus suit 4 étapes : analyse des besoins, conception et architecture, développement et tests, puis déploiement et formation. Chaque étape inclut des validations avec le client.'],
    ];
    $fieldClass = fn (string $name) => $errors->has($name) ? 'field field-error' : 'field';
@endphp

<x-page-hero
    eyebrow="Contact"
    title="Parlons de votre projet."
    lead="Discutons de votre projet et découvrons comment nous pouvons vous accompagner."
/>

<section class="pb-20 md:pb-28">
    <div class="wrap grid gap-5 lg:grid-cols-[1.2fr_.8fr]">
        {{-- FORMULAIRE --}}
        <div class="card p-8 md:p-12" data-reveal>
            <p class="eyebrow">Message</p>
            <h2 class="title mt-1">Envoyez-nous un message.</h2>
            <p class="mt-2 text-[15px] text-muted">Remplissez le formulaire ci-dessous et nous vous répondrons dans les plus brefs délais.</p>

            @if (session('status'))
                <div role="status" class="mt-6 flex items-center gap-3 rounded-2xl bg-[#eaf5eb] px-5 py-4 text-[15px] text-[#2f6e35]">
                    <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-leaf text-white"><x-icon name="check" class="h-3.5 w-3.5" stroke-width="2.5" /></span>
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST" class="mt-8 grid gap-4 md:grid-cols-2" novalidate>
                @csrf
                <div>
                    <label for="name" class="field-label">Nom complet *</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" class="{{ $fieldClass('name') }}">
                    @error('name')<p class="mt-1.5 text-[13px] text-[#d92d20]">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="email" class="field-label">Email *</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" class="{{ $fieldClass('email') }}">
                    @error('email')<p class="mt-1.5 text-[13px] text-[#d92d20]">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="phone" class="field-label">Téléphone</label>
                    <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" autocomplete="tel" class="{{ $fieldClass('phone') }}">
                    @error('phone')<p class="mt-1.5 text-[13px] text-[#d92d20]">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="company" class="field-label">Entreprise</label>
                    <input type="text" id="company" name="company" value="{{ old('company') }}" autocomplete="organization" class="{{ $fieldClass('company') }}">
                    @error('company')<p class="mt-1.5 text-[13px] text-[#d92d20]">{{ $message }}</p>@enderror
                </div>
                <div class="md:col-span-2">
                    <label for="subject" class="field-label">Sujet *</label>
                    <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required class="{{ $fieldClass('subject') }}">
                    @error('subject')<p class="mt-1.5 text-[13px] text-[#d92d20]">{{ $message }}</p>@enderror
                </div>
                <div class="md:col-span-2">
                    <label for="message" class="field-label">Message *</label>
                    <textarea id="message" name="message" rows="6" required class="{{ $fieldClass('message') }} resize-none">{{ old('message') }}</textarea>
                    @error('message')<p class="mt-1.5 text-[13px] text-[#d92d20]">{{ $message }}</p>@enderror
                </div>
                <div class="md:col-span-2">
                    <button type="submit" class="btn btn-primary w-full md:w-auto">Envoyer le message</button>
                </div>
            </form>
        </div>

        {{-- COORDONNÉES --}}
        <aside class="grid content-start gap-5">
            <div class="tile p-8 md:p-10" data-reveal style="--reveal-delay: 90ms">
                <h2 class="title">Nos coordonnées</h2>
                <p class="mt-2 text-[15px] text-muted">N'hésitez pas à nous contacter par téléphone, email ou à nous rendre visite dans nos bureaux.</p>
                <ul class="mt-8 grid gap-7">
                    <li class="flex gap-4">
                        <span class="icon-badge bg-white text-sky shadow-sm"><x-icon name="pin" /></span>
                        <div>
                            <h3 class="meta">Adresse</h3>
                            <p class="mt-1 text-[17px] leading-[1.45]">Cocody Angré 9ème tranche<br>Abidjan, Côte d'Ivoire</p>
                        </div>
                    </li>
                    <li class="flex gap-4">
                        <span class="icon-badge bg-white text-leaf shadow-sm"><x-icon name="phone" /></span>
                        <div>
                            <h3 class="meta">Téléphone</h3>
                            <p class="mt-1 text-[17px]"><a href="tel:+2252733712914" class="hover:text-brand">+225 27 33 712 914</a> <span class="text-[13px] text-subtle">(Fixe)</span></p>
                            <p class="text-[17px]"><a href="tel:+2250778780606" class="hover:text-brand">+225 07 78 78 06 06</a> <span class="text-[13px] text-subtle">(Mobile)</span></p>
                        </div>
                    </li>
                    <li class="flex gap-4">
                        <span class="icon-badge bg-white text-[#b8861a] shadow-sm"><x-icon name="mail" /></span>
                        <div>
                            <h3 class="meta">Email</h3>
                            <p class="mt-1 text-[17px]"><a href="mailto:infos@bwantechnologies.com" class="hover:text-brand">infos@bwantechnologies.com</a></p>
                        </div>
                    </li>
                    <li class="flex gap-4">
                        <span class="icon-badge bg-white text-clay shadow-sm"><x-icon name="clock" /></span>
                        <div>
                            <h3 class="meta">Horaires d'ouverture</h3>
                            <p class="mt-1 text-[15px] leading-[1.6]">Lundi - Vendredi : 8h00 - 18h00<br>Samedi : 9h00 - 13h00<br>Dimanche : Fermé</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="aspect-[4/3] overflow-hidden rounded-[28px] bg-surface" data-reveal style="--reveal-delay: 150ms">
                <iframe
                    title="Localisation de BWAN TECHNOLOGIES à Cocody Angré, Abidjan"
                    class="h-full w-full"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    src="https://www.google.com/maps?q=Cocody+Angr%C3%A9+9%C3%A8me+tranche,+Abidjan&output=embed"
                ></iframe>
            </div>
        </aside>
    </div>
</section>

{{-- FAQ --}}
<section class="bg-surface py-20 md:py-28">
    <div class="wrap max-w-[880px]">
        <x-section-heading eyebrow="Questions fréquentes" title="Les réponses à vos questions." />
        <div class="mt-12 overflow-hidden rounded-[28px] bg-white" data-reveal>
            @foreach ($faqs as $i => [$question, $answer])
                <details class="group border-b border-black/[.06] last:border-0" @if ($i === 0) open @endif>
                    <summary class="flex cursor-pointer list-none items-center justify-between gap-6 px-7 py-6 text-[19px] font-semibold tracking-tight md:px-10 [&::-webkit-details-marker]:hidden">
                        <h3>{{ $question }}</h3>
                        <span aria-hidden="true" class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-surface text-[20px] leading-none text-muted transition duration-300 group-open:rotate-45">+</span>
                    </summary>
                    <p class="px-7 pb-7 text-[17px] leading-[1.6] text-muted md:px-10">{{ $answer }}</p>
                </details>
            @endforeach
        </div>
    </div>
</section>
@endsection
