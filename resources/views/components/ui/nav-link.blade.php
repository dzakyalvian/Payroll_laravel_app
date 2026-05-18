@props(['active', 'icon' => null])

@php
$classes = ($active ?? false)
            ? 'flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/10 text-primary font-medium transition-colors'
            : 'flex items-center gap-3 px-3 py-2 rounded-lg text-muted-foreground hover:bg-secondary hover:text-foreground font-medium transition-colors';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    @if($icon)
        <x-ui.icon :name="$icon" class="w-5 h-5 {{ ($active ?? false) ? 'text-primary' : 'text-muted-foreground group-hover:text-foreground' }}" />
    @endif
    <span>{{ $slot }}</span>
</a>
