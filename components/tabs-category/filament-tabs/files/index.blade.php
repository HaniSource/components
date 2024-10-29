<div
    x-data="{
        activeId: null,
        init() {
            // Set the first available tab on the page on page load.
            this.$nextTick(() => this.activate(this.$id('tab', 1)))
        },  
        activate(id) {
            this.activeId = id
        },
        isActive(id) {
            return this.activeId === id
        },
        getTabIndex(el, parent) {
            return Array.from(parent.children).indexOf(el) + 1
        }
    }"

    x-id="['tab']"
    {{ $attributes->merge(['class'=>'mx-auto dark:text-white']) }}
>
    <!-- Tab List -->
    <ul
        x-ref="tablist"
        x-on:keydown.right.prevent.stop="$focus.wrap().next()"
        x-on:keydown.home.prevent.stop="$focus.first()"
        x-on:keydown.page-up.prevent.stop="$focus.first()"
        x-on:keydown.left.prevent.stop="$focus.wrap().prev()"
        x-on:keydown.end.prevent.stop="$focus.last()"
        x-on:keydown.page-down.prevent.stop="$focus.last()"
        role="tablist"
       {{ $items->attributes->merge(['class'=>'flex items-center overflow-x-auto scroll-smooth scrollbar-hidden'])}}
        >
        {{ $items }}
    </ul>

    <div 
        role="tabpanels"
        {{ $panels->attributes }}
        >
        {{ $panels }}
    </div>
</div>

<style>
.scrollbar-hidden::-webkit-scrollbar {
    display: none; /* Safari and Chrome */
}

.scrollbar-hidden {
    -ms-overflow-style: none; /* IE and Edge */
    scrollbar-width: none; /* Firefox */
}
</style>