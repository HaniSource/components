---
name: 'nested-dropdown'
files:
    index: resources/views/components/dropdown/index.blade.php
    item: resources/views/components/dropdown/item.blade.php
    sub-items: resources/views/components/dropdown/sub-items.blade.php
    usage: resources/views/components/dropdown/usage.blade.php
---


## Documentation

### Overviewn

This *Dropdown* component is built using Alpine.js and provides a flexible way to implement dropdowns with full control over opening, closing, focus management, and positioning.

### Component Structure
The dropdown component is composed of two main files: 
1. **Main Container** (``dropdown/index.blade.php``): Serves as the main wrapper for the dropdown component. 
2. **Dropdown Item** (``dropdown/item.blade.php``): Manages individual items within the dropdown. 
2. **Dropdown Sub-Items** (``dropdown/sub-items.blade.php``): Manages individual items within the dropdown. 

#### Main Container 

The main container is the global structure for each dropdown instance. Below is the code for setting it up:

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

You may notice that a simple dropdown would require less code, but it would lack essential features like accessibility and closing the dropdown when clicking outside of it. For instance, a basic dropdown can be written like this:

```html
<div x-data="{ isShown: false }">
    <button x-on:click="isShown = ! isShown">Toggle</button> 
    <div x-show="isShown">Contents...</div>
</div>
```

However, this basic implementation does not address accessibility or closing functionality, which is why we use a more complex JavaScript structure.

##### explaining javascript 

The functions ``open()``, ``toggle()``, and ``close()`` handle basic dropdown actions: opening, closing, and toggling visibility. But to enhance functionality, we add two focus management functions: ``handleFocusInOut()`` and ``shouldCloseDropdown()``.

he goal here is to make sure the dropdown closes automatically if the user clicks or tabs out of it. To make that happen, we need a couple of functions, those are ``handleFocusInOut()`` and ``shouldCloseDropdown`` :

###### **`handleFocusInOut`**

This function keeps an eye on where the user’s focus is moving to decide if the dropdown should close. Here's how it works step-by-step:
1. **Get References:**
    We grab references to the dropdown ``panel`` and ``button`` elements. This is because we want to know where the user is focusing in relation to these two elements.
2. **Check Where Focus Moved:**
    We get ``target``, the element that triggered the focus change event. This is where the focus is currently, which might be inside or outside our dropdown.
3. **Stay Open if Focus is Inside:**
    We check if ``target`` is within the panel or button by using`` contains(target)``. If the focus is still somewhere inside these two elements, we don’t want to close the dropdown—so we just exit the function here.

4. **Identify Last Focused Element:**

If we’re still here, that means focus has moved outside the dropdown. So, we capture ``lastFocusedElement``, the current focused element (using ``document.activeElement``). This is the last known spot of focus, and we’ll use it to help figure out if the dropdown should close.

5. **Check if the Dropdown Should Close:**

Now, we call ``shouldCloseDropdown`` and pass it our ``button``, ``panel``, and ``lastFocusedElement``. If ``shouldCloseDropdown`` says it’s time to close, we call ``this.close(button)``. The ``button`` here tells the dropdown to focus back on the button once it closes, making for a smooth user experience.

###### **`handleFocusInOut`**
This helper function makes the final call on whether the dropdown should close based on where the focus has landed.
1. **Outside Both Button and Panel:**
    First, it checks that ``lastFocusedElement`` is not within the button or the panel. This is a signal that the user has clicked or tabbed somewhere outside the dropdown entirely.

2. **Checking Position in the DOM:**
    - Next, it compares ``lastFocusedElement`` to button using ``button.compareDocumentPosition(lastFocusedElement)``. This comparison uses a bitmask that tells us where the two elements sit in the DOM tree [see the docs of compareDocumentPosition() method ](https://developer.mozilla.org/en-US/docs/Web/API/Node/compareDocumentPosition).
    - Specifically, we’re looking for a ``DOCUMENT_POSITION_FOLLOWING`` result. This means the last focused element is “after” the button in the DOM’s structure. Essentially, if ``lastFocusedElement`` is after the button in the document, the user has likely left the dropdown, so we should close it.

    If both of these checks pass, ``shouldCloseDropdown`` returns ``true``, meaning it’s time to close the dropdown.

#### Dropdown Item

The Dropdown Item component is used to represent each item inside the dropdown. Each item can contain sub-items that display on hover or focus. This setup enhances functionality for dropdowns requiring hierarchical structures.


```html
@props([
    'closeOnClick' => true,
    'href'=>null,
    'iconable' => false
])
<div role="menuitem" tabindex="-1"
    {{ $attributes->merge([
        'class' => 'dropdown-item cursor-pointer hover:rounded px-2 py-0.5 dark:focus-within:bg-white/5 dark:hover:bg-white/5 hover:bg-white  dark:focus:bg-white/5 focus-within:bg-white hover:bg-white focus:bg-white',
    ]) }}
    x-data="{
        show: false,
        init() {
            $el.addEventListener('click', () => this.isClosedAfterClick())
        },
        isClosedAfterClick() {
            if (@js($closeOnClick)) {
                close();
            }
        }
    }" 
    x-ref="item"
    x-on:mouseenter="show = true" 
    x-on:mouseleave="show = false"
    x-on:keydown.enter.prevent="$el.click()">
    @if (filled($href))
        <a href="{{ $href }}" wire:navigate.hover>
            {{ $slot }}
        </a>
    @else
    <div class="flex items-center justify-between mr-0">
        {{ $slot }}
        @if($iconable)
            <svg class="size-5 text-gray-700 dark:text-gray-400 "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"></path>
            </svg>
        @endif
    </div>
    @endif
</div>
    
```
##### How About Props ?
1. **``closeOnClick``**: This boolean prop, which defaults to true, determines whether the dropdown should close when an item is clicked. If set to false, clicking the item will not close the dropdown.

**``href``**: If provided, this prop turns the dropdown item into a clickable link, allowing it to navigate to the specified URL. If left empty, the item behaves as a regular menu item.

It Initializes a small Alpine.js component within the dropdown item.

- This setup includes:

1. the ``show`` state is responsible for the sub-dropdown and it toggle once the mouse hover on the item

2. An *``init()``* function that sets up an event listener for clicks on the item, triggering the ``isClosedAfterClick`` function.

3. The *``isClosedAfterClick``* function checks if closeOnClick is true. If so, it calls the global ``close()`` function, closing the dropdown menu.

#### Sub Items 
The Sub-items part represents the nested dropdown menu for an item. below the code for setting it up

```html
@props([
    'position'=>'right-start'
])
<div 
    x-show="show"
    x-ref="subItems"
    x-anchor.{{ $position }}.offset.10 = "$refs.item"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 scale-95"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-75"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-95"
    x-on:click.away="close($refs.button)"
    x-bind:id="$id('dropdown-subitems')"
    style="display: none;"
    {{ $attributes->merge([
        'class'=>"absolute left-0 py-1 px-1 max-w-96 rounded-lg bg-white/5 border borde-white/5 shadow-md"
    ]) }}
>
    {{ $slot }}
</div>
```  

### Usage Example 
after you copy paste those two file, you can test the component with this basic example:

```html
<x-dropdown>
    <x-slot:button class="dark:bg-white/10 bg-white">
        frameworks
    </x-slot:button>
    <x-slot:items>
        <x-dropdown.item>
            Tailwind
        </x-dropdown.item>
        <x-dropdown.item>
            AlpineJs
        </x-dropdown.item>
        <x-dropdown.item>
            Laravel
        </x-dropdown.item>
        <x-dropdown.item iconable>
            livewire 
            <x-dropdown.sub-items>
                <x-dropdown.item>
                    Full SPA 
                </x-dropdown.item>
                <x-dropdown.item>
                    easy uploading 
                </x-dropdown.item>
                <x-dropdown.item>
                    lazy loading
                </x-dropdown.item>
                </x-dropdown.sub-item>
        </x-dropdown.item>
        <x-dropdown.item iconable>
            inertia 
            <x-dropdown.sub-items>
                <x-dropdown.item>
                    scroll management
                </x-dropdown.item>
                <x-dropdown.item>
                    shared data
                </x-dropdown.item>
                <x-dropdown.item>
                    ssr
                </x-dropdown.item>
            </x-dropdown.sub-item>
        </x-dropdown.item>
    </x-slot:items>
    </x-dropdown>
```