{{--
    x-ui.alert — Reusable alert/flash component

    Props:
      type    = "info" | "success" | "warning" | "error"
      title   = ""   — optional bold title above message
      dismiss = false — tampilkan tombol close (x)

    Slot: default — isi pesan
--}}
@props([
    'type' => 'info',
    'title' => '',
    'dismiss' => false,
])

@php
    $styles = [
        'info' => ['bg' => 'bg-info/8', 'border' => 'border-info/20', 'text' => 'text-info', 'icon' => 'info'],
        'success' => [
            'bg' => 'bg-success/8',
            'border' => 'border-success/20',
            'text' => 'text-success',
            'icon' => 'check',
        ],
        'warning' => [
            'bg' => 'bg-warning/8',
            'border' => 'border-warning/20',
            'text' => 'text-warning',
            'icon' => 'warn',
        ],
        'error' => ['bg' => 'bg-error/8', 'border' => 'border-error/20', 'text' => 'text-error', 'icon' => 'error'],
    ];
    $s = $styles[$type] ?? $styles['info'];
@endphp

<div role="alert"
    class="{{ $s['bg'] }} {{ $s['border'] }} {{ $s['text'] }} border rounded-lg px-4 py-3 flex gap-3 items-start text-sm"
    @if ($dismiss) x-data="{ show: true }" x-show="show" @endif>
    {{-- Icon --}}
    <span class="mt-0.5 shrink-0">
        @if ($s['icon'] === 'check')
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12" />
            </svg>
        @elseif($s['icon'] === 'warn')
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />
                <line x1="12" y1="9" x2="12" y2="13" />
                <line x1="12" y1="17" x2="12.01" y2="17" />
            </svg>
        @else
            {{-- info & error both use circle-i --}}
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10" />
                <line x1="12" y1="8" x2="12" y2="12" />
                <line x1="12" y1="16" x2="12.01" y2="16" />
            </svg>
        @endif
    </span>

    {{-- Content --}}
    <div class="flex-1 min-w-0">
        @if ($title)
            <p class="font-semibold mb-0.5">{{ $title }}</p>
        @endif
        {{ $slot }}
    </div>

    {{-- Dismiss button --}}
    @if ($dismiss)
        <button @click="show = false" class="shrink-0 opacity-50 hover:opacity-100 transition-opacity ml-1"
            aria-label="Tutup">
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18" />
                <line x1="6" y1="6" x2="18" y2="18" />
            </svg>
        </button>
    @endif
</div>
