---
name: 'dropdown'
files:
    index: resources/views/components/dropdown/index.blade.php
    item: resources/views/components/dropdown/item.blade.php
    usage: resources/views/components/dropdown/usage.blade.php
---


## Documentation

### Overviewn
This *Dropdown* component is built using Alpine.js and provides a flexible way to implement dropdowns with full control over opening, closing, focus management, and positioning.

### Component Structure
The dropdown component is composed of two main files: 
1. Main Container (``dropdown/index.blade.php``) 
2. Dropdown Item (``dropdown/item.blade.php``) 

#### Main Container 

the global container for every dropdown component you want to use, this is the code 

```html
@props(['position' => 'bottom-center'])

<div {{ $attributes->merge(['class'=>'flex justify-center']) }}>
    <div
        x-data="{
            open: false,
            isOpen(){
                return this.open;
            },
            toggle() {
                if (this.open) {
                    return this.close()
                }

                this.$refs.button.focus()

                this.open = true
            },
            close(focusAfter) {
                if (! this.open) return

                this.open = false

                focusAfter && focusAfter.focus()
            },
            handleFocusInOut(event) {
                const panel = this.$refs.panel
                const button = this.$refs.button
                const target = event.target

                // If the panel or the button  contains the focused element, do nothing
                if (panel.contains(target)||button.contains(target)) return;

                // If the focus is outside both the panel and button, check DOM order
                const lastFocusedElement = document.activeElement

                if (this.shouldCloseDropdown(button,panel,lastFocusedElement)) this.close(button);
            },
            shouldCloseDropdown(button, panel, lastFocusedElement) {
                return (!button.contains(lastFocusedElement) && !panel.contains(lastFocusedElement)) &&
                    (lastFocusedElement && (button.compareDocumentPosition(lastFocusedElement) & Node.DOCUMENT_POSITION_FOLLOWING));
            }
        }"
        x-on:keydown.escape.prevent.stop="close($refs.button)"
        x-on:focusin.window="handleFocusInOut($event)"
        x-id="['dropdown-button']"
        class="relative"
    >
        <button
                x-ref="button"
                x-on:keydown.tab.prevent.stop="$focus.focus($focus.within($refs.panel).getFirst())"
                x-on:keydown.down.prevent.stop="$focus.focus($focus.within($refs.panel).getFirst())"
                x-on:keydown.space.stop.prevent="toggle()"
                x-on:keydown.enter.stop.prevent="toggle()"
                x-on:keyup.space.stop.prevent
                x-on:click="toggle()"
                x-bind:aria-expanded="open"
                x-bind:aria-controls="$id('dropdown-button')"
                type="button"
                {{ $button->attributes->merge(['class'=>'flex items-center px-2 py-1 rounded-md']) }}
            >
            {{ $button }}
        </button>
        <!-- Panel -->
        <div 
            x-show="open"
            x-ref="panel"
            x-anchor.{{ $position }}.offset.10="$refs.button"
            x-on:keydown.down.prevent.stop="$focus.next()"
            x-on:keydown.up.prevent.stop="$focus.prev()"
            x-on:keydown.home.prevent.stop="$focus.first()"
            x-on:keydown.page-up.prevent.stop="$focus.first()"
            x-on:keydown.end.prevent.stop="$focus.last()"
            x-on:keydown.page-down.prevent.stop="$focus.last()"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            x-on:click.away="close($refs.button)"
            x-bind:id="$id('dropdown-button')"
            style="display: none;"
            {{ $items->attributes->merge(['class'=>'absolute left-0 z-10 py-3 px-1 max-w-96  rounded-md shadow-md px-2 py-3  backdrop-blur-xl border border-white/15']) }}
        >
            {{ $items }}
        </div>
        
    </div>
</div>
```
this component accepts the position of the panel as a props according to the alpinejs's anchor [plugin](https://alpinejs.dev/plugins/anchor#positioning) 

secondly you may notice that not you need to write a lot of js like what do we have here you may be able to do that but you well get basic and poor dropdown like this one 

```html
<div x-data="{ isShown: false }">
    <button x-on:click="isShown = ! isShown">Toggle</button> 
    <div x-show="isShown">Contents...</div>
</div>
```

but wait we is accesibilty? how about clicking outsite the dropdown to close the drop down? se for that why we have a mid a mid-complex javascript 

##### explaining javascript : 

for the `close()` function is the resposible for the closing dropdown it has a optional params responsible the 