---
name: 'Autosizing Textarea Component'
files:
    index: resources/views/components/inputs/textarea.blade.php
    app: resources/views/js/app.js
---


## Documentation

### Overview

This component automatically adjusts its height to fit the content as you type, providing a smooth and user-friendly experience without the need for manual resizing. It uses Alpine.js for handling reactivity and auto-resizing.

### Component Structure :

1. Textarea file (``inputs/textarea.blade.php``)

```html
@props([
    'rows' => null,
    'name' => null  
])

@php
    $initialHeight = (($rows ?? 10) * 1.5) + 0.75;
@endphp
    <textarea
        x-data="{
        initialHeight: @js($initialHeight) + 'rem',
        height: @js($initialHeight) + 'rem',
        name:@js($name),
        contents: window.Alpine.$persist('').as(this.name + '-value'),

        init() {
            this.setInitialHeight();
            this.resize();
            this.initResizeObserver();
        },
        setInitialHeight() {
            this.$el.style.height = this.initialHeight;
        },
        resize() {
            this.$el.style.height = 'auto';
            let newHeight = this.$el.scrollHeight + 'px';

            if (this.$el.scrollHeight < parseFloat(this.initialHeight)) {
                this.$el.style.height = this.initialHeight;
            } else {
                this.$el.style.height = newHeight;
            }
        },

        initResizeObserver() {
            const observer = new ResizeObserver(() => {
                this.resize();
            });
            observer.observe(this.$el);
        },
    }"  
    {!! $attributes->merge([
    'class' => 'border-white/10 dark:bg-white/5 bg-white dark:text-gray-100 text-gray-900  focus:border-primary focus:ring-primary rounded-md shadow-sm',
        ]) !!}
        x-intersect.once="resize()"
        x-on:input="resize()"
        x-on:resize.window="resize()"
        x-on:keydown="resize()"
        x-model="contents"
        x-modelable="contents"
    ></textarea>
```
#### Scripts Explanation

So here’s how this autosizing textarea script works in plain terms. The goal is to make the textarea automatically adjust its height as you type, so you don’t have to worry about making it fit the content manually.

##### Key Parts of the Script

1. **Getting Things Up inside ``x-data``**:
in this part is where we define everything we need for this component. We set up three main things:

- ``initialHeight``: This is the starting height of the textarea, calculated based on the number of rows you pass in.
- ``height``: This tracks the current height of the textarea, and it changes whenever new content is added.
- ``contents``: Here we use Alpine’s ``$persist``, which is a simple way to make the textarea remember whatever you typed, even if you reload the page. The ``name`` you pass in becomes the key that stores the data, so each textarea keeps track of its own content.

2. **The ``init()`` Function**: When the component first loads, ``init()`` runs and does a couple of things:
- It sets the initial height, so the textarea starts out looking the way it should.
- It calls ``resize()``, which is the function that figures out how tall the textarea should be based on the content inside.
- Finally, it activates a ``ResizeObserver``, which watches for any size changes in the textarea and adjusts it as needed. This observer is like having a helper that keeps everything sized correctly as you type.

3. **How ``resize()`` Works**: This function is the heart of the autosizing. Here’s what it does:

- First, it sets the height to ``auto``. This resets the textarea temporarily so we can measure the exact height needed for the content.
- It checks the ``scrollHeight``, which is the total height the content takes up. If it’s more than the ``initialHeight``, it applies that as the new height, making sure the textarea always expands to fit the text.
- But if the content is less than the initial height, it just keeps the original height. That way, if you delete a bunch of text, it doesn’t shrink too much.

4. **How About The``ResizeObserver``**: The ``ResizeObserver`` is like an automated watcher. It keeps an eye on the textarea for any changes in size. So if the textarea’s content changes—say, you paste a big chunk of text or delete a bunch—the observer will call`` resize()`` again to make sure the height matches the content.



    hat’s the whole script in action! It’s a smart, lightweight way to make sure your textarea adapts to whatever you type

### Usage Example

```html
<div>
    <x-components::inputs.text-area 
        class="w-full"
        placeholder="write a comment"
        rows="4" 
        name="textarea"
        wire:model="comment.body" 
    />
</div>
```