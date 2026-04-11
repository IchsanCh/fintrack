{{--
    x-ui.input — Reusable input field component

    Props:
      name        (required) — input name & id
      label       (required) — label text
      type        = "text"   — input type
      value       = ""       — old value
      placeholder = ""
      required    = false
      autofocus   = false
      autocomplete = ""
      hasIcon     = false    — tambahkan padding kanan untuk icon slot
      errorField  = name     — nama field error di $errors (default = name)

    Slots:
      $icon       — optional: ikon di sisi kanan input (mis. toggle password)
      $hint       — optional: teks hint di bawah input
--}}
@props([
    'name',
    'label',
    'type' => 'text',
    'value' => '',
    'placeholder' => '',
    'required' => false,
    'autofocus' => false,
    'autocomplete' => '',
    'hasIcon' => false,
    'errorField' => null,
])

@php
    $field = $errorField ?? $name;
    $hasError = $errors->has($field);
    $inputClass =
        'w-full bg-white/[0.03] border rounded-lg px-4 py-3 text-sm text-base-content
                   placeholder:text-base-content/60 outline-none transition-all duration-200
                   focus:bg-primary/5 focus:border-primary/80
                   focus:shadow-[0_0_0_3px_oklch(56%_0.235_280_/_0.15)]' .
        ($hasIcon ? ' pr-11' : '') .
        ($hasError ? ' border-error/50' : ' border-primary/40');
@endphp

<div class="flex flex-col gap-1.5">
    {{-- Label --}}
    <label for="{{ $name }}"
        class="text-[11px] font-semibold uppercase tracking-widest text-base-content/80 font-mono">
        {{ $label }}
    </label>

    {{-- Input wrapper --}}
    <div class="relative">
        <input id="{{ $name }}" type="{{ $type }}" name="{{ $name }}"
            value="{{ old($name, $value) }}" placeholder="{{ $placeholder }}" {{ $required ? 'required' : '' }}
            {{ $autofocus ? 'autofocus' : '' }}
            @if ($autocomplete) autocomplete="{{ $autocomplete }}" @endif class="{{ $inputClass }}" />

        {{-- Right-side icon slot --}}
        @if ($hasIcon && isset($icon))
            <div class="absolute right-3 top-1/2 -translate-y-1/2 flex items-center">
                {{ $icon }}
            </div>
        @endif
    </div>

    {{-- Hint slot --}}
    @if (isset($hint))
        <div class="text-xs text-base-content/35">{{ $hint }}</div>
    @endif

    {{-- Error message --}}
    @error($field)
        <p class="text-xs text-error flex items-center gap-1 mt-0.5">
            <svg class="w-3 h-3 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10" />
                <line x1="12" y1="8" x2="12" y2="12" />
                <line x1="12" y1="16" x2="12.01" y2="16" />
            </svg>
            {{ $message }}
        </p>
    @enderror
</div>
