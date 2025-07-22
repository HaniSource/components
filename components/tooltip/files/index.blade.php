@props([
    'placement' => 'top',
    'variant' => 'default',
])

<div x-data="{
    show: false,
    placement: '{{ $placement }}',
    showTooltip() {
        this.show = true
    },
    hideTooltip() {
        this.show = false;
    }
}" {{ $attributes->merge(['class' => 'relative inline-block']) }}>
    @if ($variant === 'button')
        <button @click="showTooltip()"
            tabindex="0" class="inline-block" x-ref="tooltipTrigger">
            {{ $trigger }}
        </button>
    @else
        <div @mouseenter="showTooltip()" @mouseleave="hideTooltip()" @focus="showTooltip()" @blur="hideTooltip()"
            tabindex="0" class="inline-block" x-ref="tooltipTrigger">
            {{ $trigger }}
        </div>
    @endif

    {{ $slot }}
</div>
