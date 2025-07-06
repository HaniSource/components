
{{-- dropdown/item.blade.php --}}
@props([
    'disabled' => false,
    'icon' => null,
    'iconAfter' => null, 
    'iconVariant' => 'mini',
    'shortcut' => null,
    'variant' => 'soft'
])

@php

$variantClasses = match($variant) {
    'soft' => 'hover:bg-gray-50 focus:bg-gray-50 dark:hover:bg-gray-800/50 dark:focus:bg-gray-800/50',
    'danger' => 'hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-400/20 dark:hover:text-red-400 focus:text-red-600 focus:bg-red-50 dark:focus:bg-red-400/20 dark:focus:text-red-400'
};

$iconClasses = [
    'inline-flex shrink-0 mr-2',
    match($variant){
        'soft' => '',
        'danger' => 'hover:text-red-500 dark:hover:text-red-400 focus:text-red-500 dark:focus:text-red-400'
    }
];

$classes = [
    'grid grid-cols-subgrid col-span-2', // used to add a right gap to all item if there is at leat an item has an icon 
    'w-full px-3 py-1.5 text-sm transition-colors duration-200 text-start',
    'text-gray-800 dark:text-white text-gray-800 dark:text-white', // text colors
    'rounded-[calc(var(--dropdown-radius)-var(--dropdown-padding))] ', // adjust the rounding based on outer dropdown rounding
    'opacity-50 cursor-not-allowed text-gray-500 dark:text-gray-400' => $disabled,
    $variantClasses .' '.' cursor-pointer' => !$disabled
];

@endphp

<x-ui.button.abstract as="div" :attributes="$attributes->class(Arr::toCssClasses($classes))->merge(['disabled' => $disabled, 'tabindex' => $disabled ? '-1' : '0'])" data-slot="dropdown-item">
    @if(filled($icon))
        <x-ui.icon :name="$icon" :variant="$iconVariant" :attributes="$attributes->class(Arr::toCssClasses($iconClasses))"  data-slot="right-icon"/>
    @endif

    @if($slot->isNotEmpty())
        <span class="col-start-2">
            {{ $slot }}
        </span>
    @endif

    @if(filled($iconAfter))
        <x-ui.icon :name="$iconAfter" :variant="$iconVariant" :attributes="$attributes->class(Arr::toCssClasses($iconClasses))" data-slot="left-icon"/>
    @endif
</x-ui.button.abstract>