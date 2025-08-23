@props([
    'label' => '',
    'name' => $attributes->whereStartsWith('wire:model')->first() ?? $attributes->whereStartsWith('x-model')->first(),
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
    'inputClasses' => '',
])

<div x-data="{
    open: false,
    search: '',
    state: null,
    isTyping: false,
    readonly: @js($readonly),
    items: [],

    select(item) {
        if(this.readonly) return;
        this.open = false;
        this.state = item;
        this.search = item;
        this.isTyping = false;
    },
    
    init() {
        this.$nextTick(() => {
            // Extract items from the autocomplete-item elements
            this.items = Array.from($el.querySelectorAll('[data-slot=\'autocomplete-item\'] button')).map(el => el.textContent.trim());
            
            // Get initial state from x-model or wire:model
            const modelValue = this.$root._x_model?.get();
            if (modelValue) {
                this.state = modelValue;
                this.search = modelValue;
            }
        })

        this.$watch('state', (value) => {
            // Sync with Alpine state
            this.$root?._x_model?.set(value);

            // Sync with Livewire state
            let wireModel = this?.$root.getAttributeNames().find(n => n.startsWith('wire:model'))

            if(this.$wire && wireModel){
                let prop = this.$root.getAttribute(wireModel)
                this.$wire.set(prop, value, wireModel?.includes('.live'));
            }
        });
    },

    handleInput() {
        this.isTyping = true;
        this.open = true;
    },
    
    handleFocus() {
        this.open = true;
        this.isTyping = false;
    },
    
    clear() {
        this.open = false;
        this.isTyping = false;
        this.state = null;
        this.search = '';
    },
    handleClickAway(e) {
        // Check if clicking on the input control, if so we don't need to close the dropdown
        if (e.target.hasAttribute('data-slot') && e.target.getAttribute('data-slot') === 'autocomplete-control') {
            return; 
        }
        
        this.open = false;
    },
    itemShouldShow(item) {
        const searchTerm = this.search || '';
        if (!this.isTyping || !searchTerm.trim()) {
            return true;
        }
        return item.toLowerCase().includes(searchTerm.toLowerCase());
    },
    
    get hasVisibleItems() {
        if (!this.isTyping || !this.search.trim()) {
            return this.items.length > 0;
        }
        return this.items.some(item => item.toLowerCase().includes(this.search.toLowerCase()));
    },
    
    get shouldShowDropdown() {
        return this.open && this.items.length > 0;
    },
    
    isSelected(item) {
        return item === this.state;
    }
}" 
{{ $attributes }}
class="relative text-start [--autocomplete-round:--spacing(2)] [--autocomplete-padding:--spacing(1)]"
>

    @if ($label)
        <label for="{{ $name }}" class="mb-2 inline-block">{{ $label }}</label>
    @endif

    <div 
        @class([
            'relative grid items-center justify-center grid-cols-[40px_1fr_30px_30px]',
            '[&:has([data-slot=icon]+[data-slot=autocomplete-control])>[data-slot=autocomplete-control]]:pl-8',
            '[&:has([data-slot=autocomplete-control]+[data-slot=icon])>[data-slot=autocomplete-control]]:pr-8',
            '[&:has([data-slot=autocomplete-control]+[data-slot=icon]+[data-slot=autocomplete-clear])>[data-slot=autocomplete-control]]:pr-16]',
            '[&_[data-slot=icon]]:dark:!text-neutral-400 [&_[data-slot=icon]]:!text-neutral-700'=>!$invalid,
            '[&_[data-slot=icon]]:dark:!text-red-400 [&_[data-slot=icon]]:!text-red-600'=>$invalid,
            'pb-2' => $description,
        ])
    >

        @if (filled($icon))
            <x-ui.icon 
                name="{{ $icon }}" 
                class="col-span-2 col-start-1 row-start-1 z-10 m-1.5" 
            />
        @endif
        
        <input
            x-ref="autocompleteControl"  
            data-slot="autocomplete-control"
            x-model="search"
            x-on:click="open = true"
            x-on:keydown.escape="open = false"
            x-on:focus="handleFocus()"
            x-on:input.stop="handleInput()"
            type="{{ $type }}"
            placeholder="{{ $placeholder }}"
            x-on:keydown.down.prevent.stop="$focus.focus($focus.within($refs.autocompleteOptions).getFirst())"
            autocomplete="off" 
            id="{{ $name }}"
            name="{{ $name }}"
            @disabled($disabled)
            @readonly($readonly)
            @class([
                'col-span-4 col-start-1 row-start-1',
                'dark:bg-neutral-900 bg-white dark:text-gray-100 dark:placeholder:text-gray-300 rounded-(--autocomplete-round) focus:ring-offset-0 focus:ring-0 focus:outline-0 text-gray-800 dark:selection:bg-white! dark:selection:text-gray-700 w-full', 
                'focus:ring-2 focus:ring-offset-0 focus:outline-none',
                'border-black/10 focus:border-black/15 focus:ring-neutral-900/15 dark:border-white/15 dark:focus:border-white/20 dark:focus:ring-neutral-100/15' => !$invalid,
                'border-red-600/30 border-2 focus:border-red-600/30 focus:ring-red-600/20 dark:border-red-400/30 dark:focus:border-red-400/30 dark:focus:ring-red-400/20' => $invalid,
                'disabled:opacity-60',
                $inputClasses,
            ])
        >
        
        @if (filled($iconTrailing))
            <x-ui.icon name="{{ $iconTrailing }}" @class([
                'col-span-1 row-start-1',
                'col-start-4' => !$clearable,
                'col-start-3' => $clearable,
            ]) />
        @endif

        @if ($clearable)
            <button 
                data-slot="autocomplete-clear" 
                x-on:click="clear"
                class='col-span-1 row-start-1 col-start-4 cursor-pointer'
            >
                <x-ui.icon name="x-mark"/>
            </button>
        @endif

        <!-- Dropdown List -->
        <div 
            x-show="shouldShowDropdown" 
            x-anchor.offset.3="$refs.autocompleteControl" 
            x-on:click.away="handleClickAway($event)"  
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform scale-95"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-95" 
            x-ref="dropdown"
            style="display: none" 
            class="absolute top-full z-50 w-full mt-1 bg-white dark:bg-neutral-900 backdrop-blur-xl border dark:border-white/10 border-black/10 rounded-(--autocomplete-round) shadow-lg max-h-60 overflow-auto p-(--autocomplete-padding)"
        >
            <ul 
                x-ref="autocompleteOptions" 
                class="flex flex-col gap-y-1"
                x-on:keydown.enter.stop="select($focus.focused().getAttribute('x-bind:value') ? JSON.parse($focus.focused().getAttribute('x-bind:value')) : $focus.focused().textContent.trim())"
                x-on:keydown.up.prevent.stop="$focus.wrap().prev()"
                x-on:keydown.down.prevent.stop="$focus.wrap().next()"
            >
                {{ $slot }}
                
                <!-- No results fallback -->
                <li 
                    x-show="!hasVisibleItems" 
                    class="px-3 py-2 text-center text-neutral-500 dark:text-neutral-400"
                >
                    No results found
                </li>
            </ul>
        </div>
    </div>

    @if ($description)
        <p data-slot="autocomplete-description" class="pl-2">{{ $description }}</p>
    @endif

</div>