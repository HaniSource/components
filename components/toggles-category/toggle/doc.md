---
name: 'filament tabs'
files:
    index: resources/views/components/toggles/index.blade.php
    usage: resources/views/components/toggles/usage.blade.php
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

- The component’s interactivity relies on javascript, with state management and key functions to handle toggle behavior. Here’s a breakdown of each function and its purpose:

- ``value``: A boolean property that tracks the toggle's state (``true`` for "on" and ``false`` for "off"), and it reflect the value ``wire:model`` using ``x-modelable`` see
[alpine.js docs](https://alpinejs.dev/directives/modelable) and [livewire docs](https://livewire.laravel.com/docs/forms#custom-form-controls)for ``x-modelable``

- ``toggle()``: Toggles the value state by reversing its boolean state, switching the component from "on" to "off" or vice versa. The component’s appearance adjusts accordingly based on CSS classes defined in ``toggledClasses`` and ``notToggledClasses``.

- ``isToggled()``: Checks if ``value`` is ``true``, returning ``true`` if the toggle is "on" and ``false`` otherwise. This function is used to dynamically bind classes for each toggle state.

- ``handleClick()``: Simulates a button click by calling ``click()`` and ``focus()`` on the ``btn`` reference. This is especially useful when users click the label, triggering the toggle without directly interacting with the button.

The component also uses ``x-id`` for generating a unique label ID, enabling accessible connections between the toggle button and its label.

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
