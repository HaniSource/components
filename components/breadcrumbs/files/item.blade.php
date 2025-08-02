@props([
    'separator' => null,
    'iconVariant' => 'mini',
    'icon' => null,
    'href' => null,
])

@php
    $classes = ['group/breadcrumbs flex items-center'];

    $linkClasses = [
        'text-black dark:text-white'
    ];

    $staticTextClasses = [
        'dark:text-gray-300'
    ];

    $separatorClasses = ['group-last/breadcrumbs:hidden'];

    $iconClasses = [];
@endphp

<div class="{{ Arr::toCssClasses($classes) }}">
    @if ($href)
        <a href="{{ $href }}" {{ $attributes->class(Arr::toCssClasses($linkClasses)) }}>
            @if ($icon)
                <x-ui.icon name="{{ $icon }}" variant="{{ $iconVariant }}"
                    class="{{ Arr::toCssClasses($iconClasses) }}" />
            @endif
            {{ $slot }}
        </a>
    @else
        <div {{ $attributes->class(Arr::toCssClasses($staticTextClasses)) }}>
            @if ($icon)
                <x-ui.icon name="{{ $icon }}" variant="{{ $iconVariant }}"
                    class="{{ Arr::toCssClasses($iconClasses) }}" />
            @endif
            {{ $slot }}
        </div>
    @endif

    @if ($separator == null)
        <x-ui.icon name="chevron-right" variant="mini" @class(collect($separatorClasses)->add('rtl:hidden')->join(' ')) />
        <x-ui.icon name="chevron-left" variant="mini" @class(collect($separatorClasses)->add('hidden rtl:inline')->join(' ')) />
    @elseif (!is_string($separator))
        {{ $separator }}
    @elseif ($separator === 'slash')
        <x-ui.icon name="slash" variant="mini"
            @class(collect($separatorClasses)->add('rtl:-scale-x-100')->join(' ')) />
    @else
        <x-ui.icon :name="$separator" variant="mini" class="{{ Arr::toCssClasses($separatorClasses) }}" />
    @endif
</div>
