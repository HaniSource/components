---
name: 'filament tabs'
files:
    index: resources/views/components/tabs/index.blade.php
    item: resources/views/components/tabs/item.blade.php
    panel: resources/views/components/tabs/panel.blade.php
    usage: resources/views/components/tabs/usage.blade.php
---

## Documentation 

The **Toggle** component provides a customizable switch that users can easily toggle on or off.

##### Key Features

### Component Structure
This Toggle component consists of one main parts:
1. Main Container (``toggle/index.blade.php``) 

#### Main Container (``tabs/index.blade.php``)

This is the backbone of the Tabs Component, managing the state and orchestrating the interaction between Tab Items and Tab Panels.

```html
@props([
    'toggledClasses' => null,
    'notToggledClasses' => null, 
])
<div
    x-data="{ 
        value: false,
        toggle() {
            this.value = !this.value;
        },
        isToggled(){
            return this.value === true;
        },
        handleClick(){
            btn = this.$refs.btn;
            btn.click();
            btn.focus();
        }
    }"
    x-modelable="value"
    {{ $attributes->merge(['class'=>'flex items-center justify-center']) }}
    x-id="['toggle-label']"
    >
        @if (filled($label))
            <label
                x-on:click="handleClick()"
                x-bind:id="$id('toggle-label')"
                {{ $label->attributes->merge(['class'=>'text-gray-900 dark:text-gray-100 font-semibold']) }}
            >
                {{ $label }}
            </label>

        @endif
        <button
            x-ref="btn"
            x-on:click="toggle()"
            type="button"
            role="switch"
            x-bind:aria-checked="value"
            x-bind:aria-labelledby="$id('toggle-label')"
            x-bind:class="{
                '{{ $toggledClasses }}':isToggled(),
                '{{ $notToggledClasses }}':!isToggled(),
            }"
            class="relative ml-4 inline-flex w-14 rounded-full py-1 transition"
        >
            <span
                x-bind:class="value ? 'translate-x-7' : 'translate-x-1'"
                class="bg-gray-200 h-6 w-6 rounded-full flex items-center justify-center transition duration-300 shadow-md"
                aria-hidden="true"
            ></span>
        </button>
</div>
```

##### Component Props 
- ``$toggledClasses``: CSS classes applied when the toggle is in the "on" state.
- ``$notToggledClasses``: CSS classes applied when the toggle is in the "off" state.

the ul dom element has tablist refs and is responsible for the navigation between tab's element it use alpinejs built-in event listeners you can learn more about them [here](https://alpinejs.dev/essentials/events) in our case we get rid of the scroll bar due to beauty view.

## Example usage 

```html
<div>
    <x-components::toggle 
        wire:model="isSelected"
        notToggledClasses="dark:bg-white/15 bg-white"
        toggledClasses="bg-green-500"
        toggledIconColor="text-green-500"
    >
        <x-slot:label>
            can be visible
        </x-slot:label>
    </x-components::toggle>
</div> 
```
