---
name: 'special tabs'
files:
    index: resources/views/components/tabs/index.blade.php
    item: resources/views/components/tabs/item.blade.php
    panel: resources/views/components/tabs/panel.blade.php
---

## Documentation 

this a special tabs for us because it's the tabs used to show you the documention and the source code for each component in our website.

since tabs are not a complex component so the documentation for this blade component is going to be easy.

##### Key Features

- **State Management** : controls wich tabs is active
- **Dynamic Activation** : Automatically activates the first tab on page load.
- **Keyboard Navigation** : Supports arrow keys, Home, and End for accessibility.
- **Accessibility** : roper ARIA attributes and tabindex for keyboard navigation.
- and more
### Component Structure

1. Main Container (``tabs/index.blade.php``) 
2. Tab Item (``tabs/item.blade.php``) 
3. Tab Panel (``tabs/panel.blade.php``) 

#### Main Container (``tabs/index.blade.php``)

This is the backbone of the Tabs Component, managing the state and orchestrating the interaction between Tab Items and Tab Panels.

```html
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
```

#### Explanation
- ``activeId``:resposible for tracking theb currently active tab 
- ``init()``: Activates the first tab upon component initialization. 
- ``activate(id)``: Sets the active tab.
- ``isActive(id)``:check if a tab is active.
- ``getTabIndex(el,parent)``: Determines the tab's index within the list  

the ul dom element has tablist refs and is responsible for the navigation between tab's element it use alpinejs built-in event listeners you can learn more about them [here](https://alpinejs.dev/essentials/events) in our case we get rid of the scroll bar due to beauty view.

### Tab Item

Represents an individual tab that users can click or navigate to via keyboard to display its corresponding panel. 

```html
    @props([
    'activeClasses'=>'bg-white/5'
])
<li>
    <button
        type="button"
        x-bind:id="$id('tab', getTabIndex($el.parentElement, $refs.tablist))"
        x-on:click="activate($el.id)"
        x-on:focus="activate($el.id)"
        x-bind:tabindex="isActive($el.id) ? 0 : -1"
        x-bind:aria-selected="isActive($el.id)"
        x-bind:class="isActive($el.id) 
            ? @js($activeClasses) 
            : 'border-b-transparent'"
        {{ $attributes->merge(['class'=>'inline-flex items-center px-5 rounded-t-md ']) }}
        role="tab"
    >
        {{ $slot }}
    </button>
</li>
```
