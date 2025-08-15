@props([
    'value' => null,
])

@php
    $value ??= $slot->__toString();
@endphp

<li x-show="itemShouldShow(@js($value))"  data-slot="autocomplete-item">
    <button x-on:mouseenter="$el.focus()" x-bind:value="@js($value)" x-on:click="select(@js($value))"
        :class="{ 'dark:bg-white/5': isSelected(@js($value)) }"
        class="dark:focus:bg-white/15 w-full px-3 py-0.5 text-start rounded-[calc(var(--autocomplete-round)-var(--autocomplete-padding))]">{{ $slot }}</button>
</li>
