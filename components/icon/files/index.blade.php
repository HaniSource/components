@props([
    'name' => null,
    'variant' => null,
])

@php
    // Detect icon set
    $isPhosphorSet = str($name)->startsWith(['ps:', 'phosphor:']);
    $isHeroiconsSet = ! $isPhosphorSet;

    // Normalize icon name safely
    $iconName = $isPhosphorSet
        ? str($name)->after(':')
        : $name;


    // Resolve component name
    $componentName = match (true) {
        $isPhosphorSet => match ($variant) {
            'thin', 'light', 'fill', 'regular', 'duotone', 'bold' => "phosphor.icons::{$variant}.{$iconName}",
            default => "phosphor.icons::regular.{$iconName}",
        },
        $isHeroiconsSet => match ($variant) {
            'solid', 'outline' => "heroicons::{$variant}.{$iconName}",
            'mini', 'micro' => "heroicons::{$variant}.solid.{$iconName}",
            default => "heroicons::outline.{$iconName}",
        },
    };

    /* PHOSPHOR ICONS AREN'T STYLED WE size-6 AS A FALLBACK */
    if ($isPhosphorSet && ! str($attributes->get('class'))->contains(['size-', 'w-', 'h-'])) {
        $attributes = $attributes->class('size-6');
    }
@endphp

<x-dynamic-component :component="$componentName"
    {{ $attributes->class([
        'text-neutral-800' => !preg_match('/\b(?<!dark:)text-[\w-]+/', $attributes->get('class')),
        'dark:text-neutral-200' => !preg_match('/\bdark:text-[\w-]+/', $attributes->get('class')),
    ]) }}
    data-slot="icon" />
