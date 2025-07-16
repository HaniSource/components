@props([
    'value' => '',
    'label' => null,
    'checkIcon' => 'check',
    'checkIconClass' => '',
    'icon' => '',
    'iconClass' => '',
])

@php
    $value ??= $slot;
@endphp


<li class="contents col-span-full" x-show="isItemShow(@js($value))">
    <button x-on:mouseenter="$el.focus()" x-bind:value="@js($value)" variant="none" x-on:click="select(@js($value))"
        :class="{
            'bg-gray-100 dark:bg-white/5 [&>[data-slot=icon]]:opacity-100': isSelected(@js($value))
        }"
        class=" focus:dark:bg-white/10 px-3 py-1  rounded-[calc(var(--round)-var(--padding))] col-span-full grid grid-cols-subgrid w-full gap-x-2">
        <x-ui.icon name="{{ $checkIcon }}" @class([
            'text-black dark:text-white z-10 pl-1.5 opacity-0',
            $checkIconClass,
        ]) />
        @if (filled($icon))
            <x-ui.icon name="{{ $icon }}" @class(['text-black dark:text-white z-10 pl-1.5', $iconClass]) />
        @endif
        <span data-slot="select-option-content" class="col-start-3 text-start">{{ $value }}</span>
    </button>
</li>
