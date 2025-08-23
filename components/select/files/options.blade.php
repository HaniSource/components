@aware([
    'searchable' => false,
])

@props([
    'checkIcon' => 'check'
])



<div 
    x-show="open"
    x-transition x-anchor.offset.5="$refs.selectTrigger"
    x-on:click.away="open = false"
    x-on:keydown.escape="open = false"
    style="display: none;"
    class="bg-white dark:bg-neutral-900 backdrop-blur-2xl z-50 rounded-(--round) p-(--padding) border border-black/10 dark:border-white/10 w-full">
    @if ($searchable)
        <input 
            x-model="search"
            x-on:input.stop="isTyping = true"
            x-on:keydown.down.prevent.stop="$focus.focus($focus.within($refs.selectOptions).getFirst())"
            type="text"
            placeholder="search..."
            class="px-2 py-1 placeholder:text-gray-700 dark:placeholder:text-gray-200 w-full rounded-[calc(var(--round)-var(--padding))] bg-white dark:bg-neutral-900 focus:ring-2 focus:ring-offset-0 focus:outline-none border-black/10 focus:border-black/15 focus:ring-neutral-900/15 dark:border-white/15 dark:focus:border-white/20 dark:focus:ring-neutral-100/15"
        >
    @endif
    
    <ul 
        x-trap="open && !@js($searchable)"
        x-on:keydown.down.prevent.stop="$focus.wrap().next()"
        x-on:keydown.up.prevent.stop="$focus.wrap().prev()"
        x-on:keydown.enter.stop="select($el.getAttribute('value'))"
        x-ref="selectOptions"
        @class([
            "grid grid-cols-[auto_auto_1fr] gap-y-1",
        ])
    >
        {{ $slot }}
    </ul>
</div>
