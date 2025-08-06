@props([
    'align' => 'right',
    'label' => '',
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'description' => null,
    'disabled' => false,
    'maxWidth' => 'max-w-md',
    'checked' => false,
    'size' => 'md', // sm, md, lg
])

@php
    $id = $name ?? Str::uuid();

    $sizeConfig = match ($size) {
        'sm' => [
            'switch' => 'h-4 w-7',
            'thumb' => 'size-3',
            'activeTranslate' => 'translate-x-3',
        ],
        'lg' => [
            'switch' => 'h-8 w-14',
            'thumb' => 'size-7',
            'activeTranslate' => 'translate-x-6',
        ],

        default => [
            'switch' => 'h-6 w-11',
            'thumb' => 'size-5',
            'activeTranslate' => 'translate-x-5',
        ],
    };

    $wrapperClasses = ['w-fit', $maxWidth];

    $containerClasses = [
        'flex items-center gap-x-2',
        match ($align) {
            'left' => 'flex-row',
            default => 'flex-row-reverse',
        },
    ];

    $switchClasses = [
        'relative inline-flex flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none disabled:cursor-not-allowed disabled:opacity-50',
        $sizeConfig['switch'],
    ];

    $thumbClasses = [
        'pointer-events-none inline-block transform  rounded-full shadow ring-0 transition duration-200 ease-in-out',
        $sizeConfig['thumb']
    ];

@endphp

<div {{ $attributes->class(Arr::toCssClasses($wrapperClasses)) }} x-data="{ checked: @js($checked) }">
    <div class="">
        <!-- Switch -->
        <div class="{{ Arr::toCssClasses($containerClasses) }}">
            <div class="flex-shrink-0 pt-0.5">
                <button 
                    type="button" 
                    class="{{ Arr::toCssClasses($switchClasses) }}"
                    :class="checked ? 'bg-neutral-800 dark:bg-white' : 'bg-neutral-300 dark:bg-neutral-900'"
                    @click="checked = !checked" @disabled($disabled) :aria-checked="checked" role="switch"
                    aria-labelledby="{{ $id }}-label">
                    <span
                        :class="checked ? '{{ $sizeConfig['activeTranslate'] }} bg-white dark:bg-neutral-950' :
                            'translate-x-[0.05rem] bg-white'"
                        class="{{ Arr::toCssClasses($thumbClasses) }}"></span>
                </button>

                @if ($name)
                    <input type="hidden" name="{{ $name }}" :value="checked ? '1' : '0'">
                @endif
            </div>
            
            <label id="{{ $id }}-label"
                class="block flex-1 text-sm font-medium text-black dark:text-white cursor-pointer select-none"
                @if (!$disabled) @click="checked = !checked" @endif>
                {{ $label }}
            </label>
        </div>


        @if ($description)
            <p class="text-sm text-gray-500 mt-1">
                {{ $description }}
            </p>
        @endif
    </div>
</div>
