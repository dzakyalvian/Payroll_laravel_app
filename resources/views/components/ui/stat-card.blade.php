@props(['title', 'value', 'icon' => null])

<x-ui.card class="flex items-center gap-4 border border-border">
    @if($icon)
        <div class="p-3 bg-primary/10 text-primary rounded-lg">
            <x-ui.icon :name="$icon" class="w-6 h-6" />
        </div>
    @endif
    <div>
        <p class="text-xs font-semibold text-muted-foreground uppercase tracking-wider">{{ $title }}</p>
        <h3 class="text-2xl font-bold text-foreground mt-1">{{ $value }}</h3>
    </div>
</x-ui.card>
