@props([
    'label' => '',
    'required' => false,
    'error' => '',
    'direction' => 'vertical',
    'disabled' => false,
    'variant' => 'default',
    'labelClass' => '',
    'indicator' => true,
    'name' => '',
])

@php
    $componentId = $id ?? 'radio-group-' . uniqid();

    $labelClasses = ['text-gray-800 dark:text-gray-300 font-semibold mb-4 inline-block', $labelClass];

    $variantClass = [
        'space-y-2' => $direction === 'vertical',
        'flex gap-4 items-stretch' => $direction === 'horizontal',
        'bg-neutral-300 dark:bg-neutral-900 rounded w-fit py-1 px-2' => $variant === 'segmented',
        'p-1' => $variant === 'cards',
    ];

@endphp

<div {{ $attributes->merge(['class' => 'w-full text-start']) }} >
    @if ($label)
        <label id="{{ $componentId }}-label" @class($labelClasses)>{{ $label }}</label>
    @endif

    <div role="radiogroup" {{ $attributes->class(Arr::toCssClasses($variantClass)) }}
        @if ($label) aria-labelledby="{{ $componentId }}-label" @endif>
        {{ $slot }}
    </div>

    @if ($error && filled($error))
        <p
            class="text-gray-200 bg-red-500 relative w-fit after:content-[''] after:w-1 after:h-full after:bg-white after:absolute after:left-0 after:top-0  text-sm mt-4 px-4 py-0.5">
            {{ $error }}</p>
    @endif
</div>
