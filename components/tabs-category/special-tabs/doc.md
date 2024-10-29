---
name: 'fluxtor tabs'
files:
    index: resources/views/components/tabs/index.blade.php
    item: resources/views/components/tabs/item.blade.php
    panel: resources/views/components/tabs/panel.blade.php
    usage: resources/views/components/tabs/usage.blade.php
---

## Documentation 

The *Fluxtor Tabs* component is a custom tab system that powers the documentation and code display for each component on our website. Designed with simplicity in mind, it includes essential features for accessibility and usability.

##### Key Features

- **State Management** : Manages the active tab state.
- **Dynamic Activation** : Automatically activates the first tab upon page load.
- **Keyboard Navigation** : Supports navigation via arrow keys, Home, and End for enhanced accessibility.
- **Accessibility** : Proper ARIA attributes and tabindex handling ensure optimal accessibility.
- **Customizable** : Easily adjustable appearance with props and classes.

### Component Structure
This Tabs component consists of three main parts:
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

### Tab Item (``tabs/item.blade.php``) 

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
as wee saw is the part that responsible for selecting or deselecting a tab within tabs.
the ``activeClasses`` prop is responsible for binding css classes based on the tab state 
the ``x-bind:id`` bind the id of `tab` index and ensure the isolation of tabs when there is more than one tabs component in the same page    

### Tab Panel (``tabs/panel.blade.php``) 

Displays the content associated with a specific tab. Only the active tab's panel is visible.

```html
<section
    x-show="isActive($id('tab', getTabIndex($el, $el.parentElement)))"
    x-bind:aria-labelledby="$id('tab', getTabIndex($el, $el.parentElement))"
    role="tabpanel"
    class="px-2"
>
    {{ $slot }}
</section>
```

## Example usage 

```html
    <x-tabs class="py-4">
    <x-slot:items>
        @foreach (['Reads the Docs', 'get the Code'] as $tabItem)
            <x-tabs.item class="py-2.5 font-semibold text-slate-400"
                activeClasses="bg-white/[0.03]  border-t border-l border-r    border-white/10 border-b border-b-[#02031C]/80 !z-30">
                {{ str()->title($tabItem) }}
            </x-tabs.item>
        @endforeach
    </x-slot:items>

    <x-slot:panels
        x-bind:class="{
            'rounded-tl-lg': !isActive($refs.tablist.firstElementChild.firstElementChild.id),
            'rounded-tr-lg rounded-bl-lg rounded-br-lg border bg-white/[0.03] border-white/10 text-gray-400': true
        }">
        <x-tabs.panel>

            <div class="mx-auto max-w-3xl px-2">
                <div
                    class="prose max-w-none dark:prose-invert prose-pre:bg-white/5 dark:prose-code:rounded dark:prose-code:bg-white/20">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem culpa aspernatur vel fugit
                    magni tenetur sapiente reiciendis eveniet. Deleniti, esse! Rem a nihil sequi numquam quaerat culpa
                    repudiandae molestiae mollitia nemo accusamus, veritatis ex, magnam architecto inventore harum vel
                    voluptas illum autem qui cumque sed animi totam aspernatur! Provident nesciunt recusandae,
                    consequatur perspiciatis unde culpa maxime illum numquam at rem vero adipisci in saepe tempore fuga
                    aliquid reiciendis nisi vel pariatur nam corrupti nihil, molestiae nemo. Aliquid, quidem! Ipsa
                    ducimus officia quia cum placeat quae accusantium nobis commodi repudiandae sed. Perferendis minus
                    repellendus qui iure velit sequi nulla quidem nostrum!
                </div>
            </div>

        </x-tabs.panel>
        <x-tabs.panel>
            Lorem2 ipsum dolor sit amet, consectetur adipisicing elit. Ut vel doloribus repellat nemo cumque et rerum
            omnis, autem culpa repellendus, illo consequuntur nostrum? Dolore eaque obcaecati maiores eius repudiandae
            nobis, nam perferendis laboriosam, officia amet quo, doloremque ab reprehenderit! Quia error, fugit sunt,
            sapiente, qui libero minima harum adipisci laudantium ad blanditiis quaerat animi beatae consectetur.
            Voluptatem iste esse cumque, aperiam quos repellat harum. Vel veniam id blanditiis animi exercitationem quia
            delectus ducimus esse illo laborum, reprehenderit quos quo eius repudiandae illum aperiam corporis?
            Mollitia, rerum reiciendis optio molestias dolorum aut autem quae voluptatibus. Fuga architecto atque
            molestiae quia velit?
        </x-tabs.panel>
    </x-slot:panels>
</x-tabs>
```
## Notes
 - Customize ``activeClasses`` for distinct styles on active tabs.
