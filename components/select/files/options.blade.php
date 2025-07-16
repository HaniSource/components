@aware([
    'searchable' => false,
])



<div x-show="open" x-anchor="$refs.selectTrigger" x-on:click.away="open = false" style="display: none;"
    x-on:keydown.escape="open = false"
    
    class="bg-white dark:bg-white/10 backdrop-blur-2xl z-50 rounded-(--round) p-(--padding) border border-gray-200 dark:border-white/40  w-full">
    @if ($searchable)
        <input x-model="search" x-on:input.stop="isTyping = true" type="text" x-on:keydown.down.prevent.stop="$focus.focus($focus.within($refs.selectOptions).getFirst())" placeholder="search..."
            class="px-2 mb-1.5 py-1 placeholder:text-gray-700 dark:placeholder:text-gray-200 w-full rounded-[calc(var(--round)-var(--padding))] dark:bg-white/10 border-gray-200 border dark:border-white/20 focus:ring-0">
    @endif
    <ul x-trap="open && !@js($searchable)" x-on:keydown.down.prevent.stop="$focus.wrap().next()" x-on:keydown.up.prevent.stop="$focus.wrap().prev()" x-on:keydown.enter.prev.stop="select($el.getAttribute('value'))"  x-ref="selectOptions" class="grid grid-cols-[auto_auto_1fr] gap-y-1">
        {{ $slot }}
    </ul>
</div>
