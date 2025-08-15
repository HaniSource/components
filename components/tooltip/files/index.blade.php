@props([
    'placement' => 'top',
    'variant' => 'default',
])

<div x-data="{
    show: false,
    placement: @js($placement),
    showTooltip() {
        this.show = true
    },
    hideTooltip() {
        this.show = false;
    }
}" {{ $attributes->merge(['class' => 'relative inline-block']) }}>
    @if ($variant === 'button')
        <button x-on:click="showTooltip()"
            tabindex="0" class="inline-block" x-ref="tooltipTrigger">
            {{ $trigger }}
        </button>
    @else
        <div x-on:mouseenter="showTooltip()" x-on:mouseleave="hideTooltip()" x-on:focus="showTooltip()" x-on:blur="hideTooltip()"
            tabindex="0" class="inline-block" x-ref="tooltipTrigger">
            {{ $trigger }}
        </div>
    @endif

    {{ $slot }}
</div>
