@aware([
    'placement' => 'top'
])

<div
    x-show="show"
    @click.away="show=false"
    x-anchor.{{ $placement }}="$refs.tooltipTrigger"
    style="display: none"
    class="absolute whitespace-nowrap min-h-8 z-50 px-2 py-1 text-sm dark:bg-white/10 dark:backdrop-blur-lg dark:text-white rounded shadow-lg pointer-events-none"
    {{ $attributes }}
>
    {{ $slot }}
</div>