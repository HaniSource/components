@aware([
    'icon' => '',
    'iconTrailing' => 'chevron-up-down',
    'disabled' => false,
    'clearable' => false,
    'triggerClass' => '',
])

@php
    $triggerWrapperClasses = [
        'relative grid items-center justify-center grid-cols-[40px_1fr_30px_30px]',
        '[&>[data-slot=icon]+[data-slot=select-control]]:pl-8',
        '[&:has([data-slot=select-control]+[data-slot=icon])>[data-slot=select-control]]:pr-8',
        '[&:has([data-slot=select-control]+[data-slot=icon]+[data-slot=select-clear])>[data-slot=select-control]]:pr-16]',
        '[&_[data-slot=icon]]:opacity-40 [&_[data-slot=icon]]:cursor-auto' => $disabled,
        'cursor-pointer',
    ];

    $triggerClasses = [
        'border dark:bg-white/10 dark:border-white/20 border-gray-300 dark:text-gray-300 rounded-(--round) px-3 py-2 text-start w-full',
        'col-span-4 col-start-1 row-start-1',
        'disabled:opacity-60 disabled:cursor-auto',
        $triggerClass,
    ];
@endphp

<div x-ref="selectTrigger" data-slot="trigger" @class($triggerWrapperClasses)>
    @if (filled($icon))
        <x-ui.icon name="{{ $icon }}"
            class="col-span-1 col-start-1 row-start-1 text-black dark:text-white z-10 pl-1.5" />
    @endif

    <button @disabled($disabled) x-on:click="toggle" data-slot="select-control" @class($triggerClasses)
        x-text="label"></button>



    @if (filled($iconTrailing))
        <x-ui.icon name="{{ $iconTrailing }}" @class([
            'col-span-1 row-start-1',
            'col-start-4' => !$clearable,
            'col-start-3' => $clearable,
        ]) />
    @endif

    @if ($clearable)
        <button data-slot="autocomplete-clear" x-on:click="clear"
            class='col-span-1 row-start-1 col-start-4 cursor-pointer'><x-ui.icon name="trash" /></button>
    @endif

</div>
