---
name: 'Faqs accordion'
files:
    index: resources/views/components/accordion/index.blade.php
    item: resources/views/components/accordion/item.blade.php
    usage: resources/views/components/accordion/usage.blade.php
---


## Documentation

### Overviewn

This *Faqs Accordion* component is designed to present a series of items that can be expanded or collapsed, allowing users to view content in a compact manner.

### Component Structure
The accordion component is composed of two main files: 

1. **Main Container** (``accordion/index.blade.php``): Serves as the main wrapper for the accordion component. 
2. **Accordion Item** (``accordion/item.blade.php``): Manages individual items within the accordion. 

#### Accordion Container 

The container is the outer wrapper for the entire accordion component. It sets up the Alpine.js ``active`` state, which helps manage which item is open at any given time.

```html
<div 
    x-data="{ active: null }" 
    {{ $attributes->merge([
        'class'=>"w-full min-h-fit space-y-4 rounded-xl pb-4"
    ]) }}
>
    {{ $slot }}
</div>
```

#### Accordion  Item

Each accordion  item component represents an individual expandable item within the accordion. This component uses Alpine.js to manage its own expand/collapse behavior based on the active state from the container.

```html
<div 
    role="region" 
    x-data="{
        id: $id('accordion'),
        toggle() {
            this.isVisible = !this.isVisible;
        },
        get isVisible() {
            return this.active === this.id
        },
        set isVisible(value) {
            this.active = value ? this.id : null
        },
    }"
    {{ $attributes->merge([
        'class' => 'rounded-lg dark:text-gray-400 text-gray-800 ',
    ]) }}>
    <h2>
        <button
            {{ $question->attributes->merge(['class' => 'flex w-full items-center justify-between px-6 py-4 text-xl font-bold']) }}
            x-on:click="toggle()" x-bind:aria-expanded="isVisible">
            <span >{{ $question }}</span>
            <span class="ml-4" aria-hidden="true" x-show="isVisible">&minus;</span>
            <span class="ml-4" aria-hidden="true" x-show="!isVisible">&plus;</span>
        </button>
    </h2>

    <div style="display: none" x-show="isVisible" x-collapse>
        <div 
            {{ $response->attributes->merge(['class' => 'px-6 pb-4 pt-2']) }}
        >
            {{ $response }}
        </div>
    </div>
</div>
```
So, the JavaScript here is managing whether each accordion item is open or closed. When we set up x-data, we’re creating an isolated scope for each item, which is super helpful because each item controls its own open and close behavior without interfering with others.

**Here's the breakdown**:

1. ``id: $id('accordion')``: This line is really just creating a unique ID for each item. The`` $id('accordion')`` generates a unique identifier each time, which is crucial because our accordion logic depends on each item knowing who it is. Think of it as giving each item its own “name tag.”

2. ``toggle()``: This is a function that we run whenever the user clicks on the accordion item. What ``toggle()`` does is flip the visibility of the item. So, if the item is closed, ``toggle()`` opens it, and if it’s open, ``toggle()`` closes it.

3. ``get isVisible()``: Here’s where it gets interesting. We use a getter called isVisible to determine whether the item should be shown or hidden. Every item is essentially asking, “Am I the active one?” It checks by comparing its unique ``id`` (remember the name tag we set) to the ``active`` ID on the parent accordion. If they match, ``isVisible`` will return ``true``, meaning the item should be displayed.`

4. ``set isVisible(value)``: The setter for isVisible is equally important. When we set ``isVisible`` to ``true``, this setter assigns the current item’s id to ``active``, marking it as the open one. If we set ``isVisible`` to ``false``, it clears ``active``, effectively closing the item. This setter is what lets us control opening and closing by clicking each item.

In simple terms, when you click an item, ``toggle()`` runs, which changes ``isVisible`` by updating ``active`` in the parent accordion. Then, only the item with the matching ``id`` stays open.

That’s the core idea! 

### Usage Example 

```html
<x-accordion>
    <x-accordion.item class="dark:bg-white/5 bg-white  shadow">
        <x-slot:question>
            # Question 1 
        </x-slot>
        <x-slot:response>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, eaque delectus libero atque magnam repellendus iure voluptatum odio eius laudantium officiis repudiandae beatae quasi maxime commodi placeat quia deserunt qui 
        </x-slot>
    </x-accordion.item>
    <x-accordion.item class="dark:bg-white/5 bg-white  shadow">
        <x-slot:question>
            # Question 2 
        </x-slot>
        <x-slot:response>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, eaque delectus libero atque magnam repellendus iure voluptatum odio eius laudantium officiis repudiandae beatae quasi maxime commodi placeat quia deserunt qui 
        </x-slot>
    </x-accordion.item>
</x-accordion>
```