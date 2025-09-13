@aware([
    'name' => null,
    'type' => 'text',
    'placeholder' => 'Search...',
    'variant' => 'default',
    'disabled' => false,
    'readonly' => false,
    'invalid' => false,
    'icon' => '',
    'iconAfter' => '',
    'clearable' => false,
    'inputClasses' => '',
])

<div 
    @class([
        'relative grid items-center justify-center grid-cols-[40px_1fr_30px_30px]',
        '[&:has([data-slot=icon]+[data-slot=autocomplete-control])>[data-slot=autocomplete-control]]:pl-8',
        '[&:has([data-slot=autocomplete-control]+[data-slot=icon])>[data-slot=autocomplete-control]]:pr-8',
        '[&:has([data-slot=autocomplete-control]+[data-slot=icon]+[data-slot=autocomplete-clear])>[data-slot=autocomplete-control]]:pr-16]',
        '[&_[data-slot=icon]]:dark:!text-neutral-400 [&_[data-slot=icon]]:!text-neutral-700'=>!$invalid,
        '[&_[data-slot=icon]]:dark:!text-red-400 [&_[data-slot=icon]]:!text-red-600'=>$invalid,
    ])
>

    @if (filled($icon))
        <x-ui.icon 
            :name="$icon" 
            class="col-span-2 col-start-1 row-start-1 z-10 m-1.5 !size-[1.15rem]" 
        />
    @endif
    
    <input
        x-ref="autocompleteControl"  
        data-slot="autocomplete-control"
        x-model="search"

        x-on:click="open = true"
        x-on:keydown.escape="open = false"
        x-on:keydown.up.prevent="handleKeydown($event)"
        x-on:keydown.down.prevent="handleKeydown($event)"
        x-on:keydown.enter.prevent="handleKeydown($event)"
        x-bind:aria-activedescendant="activeIndex !== null ? 'option-' + activeIndex : null"
        x-on:focus="handleFocus()"
        x-on:input.stop="handleInput()"
        
        type="{{ $type }}"
        placeholder="{{ $placeholder }}"
        id="{{ $name }}"
        name="{{ $name }}"
        
        {{ $attributes->class([
            'col-span-4 col-start-1 row-start-1',
            'dark:bg-neutral-900 bg-white dark:text-gray-100 dark:placeholder:text-gray-300 rounded-box focus:ring-offset-0 focus:ring-0 focus:outline-0 text-gray-800 dark:selection:bg-white! dark:selection:text-gray-700 w-full', 
            'focus:ring-2 focus:ring-offset-0 focus:outline-none',
            'border-black/10 focus:border-black/15 focus:ring-neutral-900/15 dark:border-white/15 dark:focus:border-white/20 dark:focus:ring-neutral-100/15' => !$invalid,
            'border-red-600/30 border-2 invalid:text-red-600 focus:border-red-600/30 focus:ring-red-600/20 dark:border-red-400/30 dark:focus:border-red-400/30 dark:focus:ring-red-400/20' => $invalid,
            'disabled:opacity-60',
            $inputClasses,
        ]) }}

        @disabled($disabled)
        @readonly($readonly)
    >
    
    @if (filled($iconAfter))
        <x-ui.icon 
            :name="$iconAfter"
            class="
                col-span-1 row-start-1 
                [&:has(+[data-slot=autocomplete-clear])]:col-start-3 
                [&:not(:has(+[data-slot=autocomplete-clear]))]:col-start-4 
                !size-[1.15rem]
            "
        />
    @endif

    @if ($clearable)
        <button 
            data-slot="autocomplete-clear" 
            x-on:click="clear"
            class='col-span-1 row-start-1 col-start-4 cursor-pointer'
        >
            <x-ui.icon name="x-mark" class="!size-[1.15rem]"/> 
        </button>
    @endif
</div>