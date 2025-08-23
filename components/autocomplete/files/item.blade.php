@props([
    'value' => null,
])

@php
    $value ??= $slot->__toString();
@endphp

<li 
    x-show="itemShouldShow(@js($value))"
    data-slot="autocomplete-item"
>
    <button 
        x-on:mouseenter="$el.focus()"
        x-on:click="select(@js($value))"
        x-bind:value="@js($value)"
        x-bind:class="{ 
            'dark:bg-white/5 bg-neutral-100': isSelected(@js($value)),
            'hover:dark:bg-white/5 hover:bg-neutral-50': !isSelected(@js($value))
        }"
        class="dark:focus:bg-white/5 focus:bg-neutral-800/5 w-full px-3 py-0.5 text-start rounded-[calc(var(--autocomplete-round)-var(--autocomplete-padding))] transition-colors focus:outline-none"
        tabindex="0"
    >
        {{ $slot }}
    </button>
</li>