{{--
    x-ui.card — Reusable card/container component

    Props:
      padding  = "md"   — "none" | "sm" | "md" | "lg"
      glow     = true   — tampilkan orb glow dekoratif
      grid     = true   — tampilkan subtle grid overlay
      class    = ""     — extra Tailwind classes
--}}
@props([
    'padding' => 'md',
    'glow' => true,
    'grid' => true,
])

@php
    $padMap = [
        'none' => '',
        'sm' => 'p-6',
        'md' => 'p-8 md:p-10',
        'lg' => 'p-10 md:p-14',
    ];
    $pad = $padMap[$padding] ?? $padMap['md'];
@endphp

<div
    {{ $attributes->merge([
        'class' => 'relative overflow-hidden rounded-2xl bg-base-200 border border-primary/10 ' . $pad,
    ]) }}>
    {{-- Decorative grid --}}
    @if ($grid)
        <div class="ft-grid-overlay absolute inset-0 pointer-events-none"></div>
    @endif

    {{-- Glow orb bottom-right --}}
    @if ($glow)
        <div class="ft-orb ft-orb-primary w-64 h-64 -bottom-20 -right-16 pointer-events-none"></div>
        <div class="ft-orb ft-orb-accent  w-40 h-40  top-6    -left-12 pointer-events-none"></div>
    @endif

    {{-- Content --}}
    <div class="relative z-10">
        {{ $slot }}
    </div>
</div>
