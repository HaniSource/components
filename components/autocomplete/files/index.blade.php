@props([
    'label' => '',
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'type' => 'text',
    'description' => '',
    'placeholder' => 'Search...',
    'variant' => 'default',
    'disabled' => false,
    'readonly' => false,
    'invalid' => false,
    'icon' => '',
    'iconTrailing' => '',
    'clearable' => false,
    'classInput' => '',
])

<div x-data="{
    open: false,
    search: '',
    selected: @if ($name) @entangle($name) @else '' @endif,
    isTyping: false,

    select(item) {
        if(@js($readonly)) return;
        this.open = false;
        this.search = this.selected = item;
        this.isTyping = false;
    },
    init() {
        this.items = Array.from($el.querySelectorAll('[data-slot=\'autocomplete-item\']')).map(el => el.textContent.trim());
        this.search = this.selected || '';
    },
    handleInput() {
        this.isTyping = true;
    },
    handleFocus() {
        this.open = true;
        this.isTyping = false;
    },
    clear() {
        this.open = false;
        this.isTyping = false;
        this.selected = this.search = '';
    },
    itemShouldShow(item) {
        return item.toLowerCase().includes(this.search.toLowerCase()) || !this.isTyping;
    },
    isSelected(item) {
        return item === this.selected;
    }
}" 
    class="relative text-start [--autocomplete-round:--spacing(2)] [--autocomplete-padding:--spacing(1)]">

    @if ($label)
        <label  class="mb-2 inline-block">{{ $label }}</label>
    @endif

    <div @class([
        'relative grid items-center justify-center grid-cols-[40px_1fr_30px_30px]',
        '[&>[data-slot=icon]+[data-slot=autocomplete-control]]:pl-8',
        '[&:has([data-slot=autocomplete-control]+[data-slot=icon])>[data-slot=autocomplete-control]]:pr-8',
        '[&:has([data-slot=autocomplete-control]+[data-slot=icon]+[data-slot=autocomplete-clear])>[data-slot=autocomplete-control]]:pr-16]',
        'pb-2' => $description,
    ])>

        @if (filled($icon))
            <x-ui.icon name="{{ $icon }}" class="col-span-1 col-start-1 row-start-1 text-black dark:text-white z-10 pl-1.5" />
        @endif
        <input x-ref='autocompleteControl'  data-slot="autocomplete-control" @disabled($disabled) @readonly($readonly)
            x-model="search"  x-on:focus="handleFocus()" x-on:input.stop="handleInput()"
            x-on:keydown.escape="open = false" type="{{ $type }}" placeholder="{{ $placeholder }}"
            x-on:keydown.down.prevent.stop="$focus.focus($focus.within($refs.autocompleteOptions).getFirst())"
            autocomplete="off" @class([
                ' dark:bg-neutral-900 bg-white dark:text-gray-100 dark:placeholder:text-gray-300 border rounded-(--autocomplete-round) dark:border-white/10 border-black/10 dark:focus:border-white/40 focus:ring-offset-0 focus:ring-0 focus:outline-0 text-gray-800 dark:selection:bg-white! dark:selection:text-gray-700 w-full col-span-4 col-start-1 row-start-1 shadow',
                'disabled:opacity-60',
                'dark:border-red-400! dark:shadow-red-400 text-red-400! placeholder:text-red-400!' => $invalid,
                $classInput,
            ])>



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

        <!-- Dropdown List -->
        <div x-show="open" x-anchor.offset.3="$refs.autocompleteControl" x-on:click.away="open = isTyping === false"  style="display: none" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform scale-95"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-95" x-ref="dropdown"
            class="absolute top-full z-50  w-full mt-1 bg-white dark:bg-neutral-900 backdrop-blur-xl border dark:border-white/10 border-black/10 rounded-(--autocomplete-round) shadow-lg max-h-60 overflow-auto p-(--autocomplete-padding)">
            <ul x-ref="autocompleteOptions" 
            class="flex flex-col gap-y-1"
                x-on:keydown.enter.stop="select($el.getAttribute('value'))"
                x-on:keydown.up.prevent.stop="$focus.wrap().prev()"
                x-on:keydown.down.prevent.stop="$focus.wrap().next()">
                {{$slot}}
            </ul>
        </div>
    </div>

    @if ($description)
        <p data-slot="autocomplete-description" class="pl-2">{{ $description }}</p>
    @endif



</div>
