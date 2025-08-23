@aware([
    'checkIcon' => 'check',
    'checkIconClass' => '',
    'searchable' => false
])

@props([
    'value' => '',
    'label' => null,
    'icon' => '',
    'iconClass' => '',
])

@php
    $value ??= $slot;
@endphp


<li 
    x-show="isItemShow(@js($value))"
    data-slot="option"
    x-on:mouseenter="$el.focus()"
    x-bind:value="@js($value)"
    type="button"
    variant="none"
    x-on:click="select(@js($value))"
    x-on:keydown.enter.stop="select(@js($value))"
    :class="{
        'bg-neutral-200 dark:bg-neutral-800 [&>[data-slot=icon]]:opacity-100': isSelected(@js($value))
    }"
    tabindex="0"
    @class([
        "focus:bg-neutral-100 focus:dark:bg-neutral-700 px-3 py-1 rounded-[calc(var(--round)-var(--padding))] col-span-full grid grid-cols-subgrid w-full gap-x-2",
        '[&:first-child]:mt-2' => $searchable
    ])
>

    <x-ui.icon 
        :name="$checkIcon"
        @class([
            'text-black dark:text-white z-10 pl-1.5 opacity-0',
            $checkIconClass,
        ]) 
    />
    @if (filled($icon))
        <x-ui.icon name="{{ $icon }}" @class(['text-black dark:text-white z-10 pl-1.5', $iconClass]) />
    @endif
    <span data-slot="select-option-content" class="col-start-3 text-start text-black dark:text-white">{{ $value }}</span>
</li>
