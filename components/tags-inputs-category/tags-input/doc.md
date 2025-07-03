---
name: "tags-input"
files:
  index: resources/views/components/inputs/tags-input.blade.php
  usage: resources/views/usage.blade.php
---

## Documentation

### Overview

the **tags input component** is lightweight, dynamic UI element, it provides an intuitive way to manage tags in a form or interface, this component is designed for flexibilty, supporting:

- Real-time tag creation and deletion.
- Customizable split keys for defining tags.
- Input validation to prevent duplicate or empty tags.
- Seamless integration with wire:model for Livewire applications.

This guide will walk you through the functionality, configuration options, and customization techniques to get the most out of the Tags Input Component.

### Features

1. **Tag Creation**
   - Users can create tags by pressing Enter, predefined split keys (e.g., space), or pasting content.
   - Prevents duplicate or empty tags automatically.
2. **Tag Deletion**
   - Includes a clear button to remove individual tags.
3. **Customizable Split Keys**
   - Define your preferred delimiters for splitting pasted or inputted content.
4. **Seamless Livewire Support**
   - Integrates with `wire:model` to bind the tags array to your backend effortlessly using `x-modelable` api.

### Component Stucture

The tags input has only one reusable blade component (`resources/views/components/inputs/tags-input.blade.php`) that can be used anywhere in your application.

```html
    <div
    x-data="{
        newTag: '',
        tags:[],
        splitKeys: ' ',
        createTag: function () {
            this.newTag = this.newTag.trim()

            if (this.newTag === '') {
                return
            }

            if (this.tags.includes(this.newTag)) {
                this.newTag = ''
                return
            }

            this.tags.push(this.newTag)
            {{--  --}}
            this.newTag = ''
        },

        deleteTag: function (tagToDelete) {
            this.tags = this.tags.filter((tag) => tag !== tagToDelete)
        },
        input: {
            ['x-on:blur']: 'createTag()',
            ['x-model']: 'newTag',
            ['x-on:keydown'](event) {
                if (['Enter', ...this.splitKeys].includes(event.key)) {
                    event.preventDefault()
                    event.stopPropagation()

                    this.createTag()
                }
            },
            ['x-on:paste']() {
                this.$nextTick(() => {
                    if (this.splitKeys.length === 0) {
                        this.createTag()

                        return
                    }

                    const pattern = this.splitKeys
                        .map((key) =>
                            key.replace(/[/\-\\^$*+?.()|[\]{}]/g, '\\$&'),
                        )
                        .join('|')

                    this.newTag
                        .split(new RegExp(pattern, 'g'))
                        .forEach((tag) => {
                            this.newTag = tag

                            this.createTag()
                        })
                })
            },
        },
    }"
    x-modelable="tags"
    {{  $attributes->whereStartsWith('wire:model') }}
>
    <div {{ $attributes
        ->whereDoesntStartWith('wire:model')
        ->merge(['class'=>"rounded-lg bg-white/5 shadow-sm ring-1 ring-gray-950/10 transition duration-75 focus-within:ring-2 focus-within:ring-violet-600 dark:ring-white/20 dark:focus-within:ring-violet-500"]) }} >
        <input
            type="text"
            class="input block w-full border-none outline-none py-1.5 text-base text-gray-950 transition bg-transparent duration-75 placeholder:text-gray-400 focus:ring-0 disabled:text-gray-500  dark:text-white dark:placeholder:text-gray-500"
            x-bind="input"
        >
        <div wire:ignore class="block">
            <template x-cloak x-if="tags?.length">
                <div
                    @class([
                        'flex w-full flex-wrap gap-1.5 p-2',
                        'border-t border-t-gray-200 dark:border-t-white/10',
                    ])
                >
                    <template
                        x-for="(tag, index) in tags"
                        x-bind:key="`${tag}-${index}`"
                        class="hidden"
                    >
                        <div
                            class="bg-violet-500/15 text-violet-800 text-xs font-medium  px-2.5 py-0.5 rounded dark:bg-white/5 dark:text-violet-400 border border-violet-500! dark:border-violet-400"
                        >
                            <span
                                x-text="tag"
                                class="select-none text-start"
                            ></span>
                            <button
                                type="button"
                                x-on:click="deleteTag(tag)"
                            >&times;</button>
                        </div>
                    </template>
                </div>
            </template>
        </div>
    </div>
</div>
```
#### Core Component Script Explained

The Tags Input Component's script is at the heart of its functionality. It uses Alpine.js to provide a reactive and intuitive user experience. Let’s break it down step by step:
- **Component Blueprint**:
```js
    x-data="{
        newTag: '',
        tags: [],
        splitKeys: ' ',
        createTag: function () { ... },
        deleteTag: function (tagToDelete) { ... },
        input: { ... },
    }"
```
1. ``newTag``: A temporary variable for the current tag being typed by the user.
2. ``tags``: The array holding all created tags.
3. ``splitKeys``: Defines the keys that trigger tag creation (e.g., space or Enter).
4. ``createTag``: A method to add a new tag to the tags array.
5. ``deleteTag``: A method to remove a tag from the tags array.
6. ``input``: Contains event bindings for managing user interactions like blur, keydown, and paste.
- **Creating a Tag**:

```js
createTag: function () {
    this.newTag = this.newTag.trim();

    if (this.newTag === '') {
        return; // Prevent adding empty tags.
    }

    if (this.tags.includes(this.newTag)) {
        this.newTag = '';
        return; // Prevent duplicate tags.
    }

    this.tags.push(this.newTag); // Add the new tag.
    this.newTag = ''; // Reset the input field.
}
```
1. Trims whitespace from ``newTag`` to ensure clean input.
2. Prevents empty or duplicate ``tags`` from being added.
3. Adds the new tag to the ``tags`` array and clears the input.
- **Deleting a tag**
```js
deleteTag: function (tagToDelete) {
    this.tags = this.tags.filter((tag) => tag !== tagToDelete);
}
```
Removes a specific tag from the ``tags`` array by filtering out the tag to be deleted.
- **Input Bindings**
The ``input`` object defines event bindings to handle user interactions.
    - **Blur Event**

        ```js
            ['x-on:blur']: 'createTag()'
        ```
    
    Creates a tag when the input loses focus (useful for ensuring input is captured).
    - **keydown Event**

        ```js
            ['x-on:keydown'](event) {
                if (['Enter', ...this.splitKeys].includes(event.key)) {
                    event.preventDefault();
                    event.stopPropagation();
                    this.createTag(); // Create a tag on pressing Enter or a split key.
                }
            }
        ```  
    
    * Listens for Enter or other splitKeys to trigger tag creation.
    * Prevents default behavior (e.g., submitting a form) and stops propagation.
    - **paste Event**   

    ```js
        ['x-on:paste']() {
            this.$nextTick(() => {
                if (this.splitKeys.length === 0) {
                    this.createTag();
                    return;
                }

                const pattern = this.splitKeys
                    .map((key) => key.replace(/[/\-\\^$*+?.()|[\]{}]/g, '\\$&'))
                    .join('|');

                this.newTag
                    .split(new RegExp(pattern, 'g')) // Split pasted content by split keys.
                    .forEach((tag) => {
                        this.newTag = tag;
                        this.createTag(); // Add each tag.
                    });
            });
        }
    ```
Handles pasted content, splitting it into multiple tags using splitKeys.
Uses a dynamic regular expression to match any of the defined split keys.

 - **Dynamic Binding with x-modelable**
 ```js
    x-modelable="tags"
    {{ $attributes->whereStartsWith('wire:model') }}
 ```
* Enables two-way binding between the ``tags`` array in the component and the backend property defined in the Livewire class.
* Automatically syncs changes to the ``tags`` array.

- **Displaying Tags**

```html
<template x-if="tags?.length">
    <div class="flex w-full flex-wrap gap-1.5 p-2">
        <template x-for="(tag, index) in tags" :key="`${tag}-${index}`">
            <div class="bg-violet-500/15 text-violet-800 text-xs font-medium px-2.5 py-0.5 rounded">
                <span x-text="tag" class="select-none"></span>
                <button type="button" x-on:click="deleteTag(tag)">&times;</button>
            </div>
        </template>
    </div>
</template>
```
``x-if:`` Ensures the tag list only renders when there are tags.
``x-for:`` Iterates over the ``tags`` array to display each tag with a unique key.
Delete Button: Calls the ``deleteTag`` method to remove a tag.

### Usage

The Tags Input Component is versatile and can be used with any form element that accepts array data. This makes it perfect for applications like categorizing posts, managing tags, or capturing a list of hobbies for user profiles.
#### Livewire Integration Made Easy
The component is designed to bind seamlessly to any array property in your Livewire class using the ``x-modelable`` feature. This simplifies synchronization between the front end and backend data.

Here’s a basic example:

```html
<x-inputs.tags-input
  class="w-full"
  placeholder="add tags"
  name="textarea"
  wire:model.live="tags"
/>
```

This assumes that your Livewire class has an array property defined as:

```php
public array $tags = [];
```
With this setup:

- Tags added or removed in the component will immediately reflect in the ``$tags`` property in your Livewire class.
- Any changes to ``$tags`` in your Livewire methods will also propagate to the front end.

##### Dynamic Initialization

You can dynamically initialize the tags during the component's lifecycle. For instance, you might populate the `$tags` property during the mount lifecycle method based on some existing data, such as retrieving tags from a related model

```php
public array $tags = [];

public function mount(Component $component)
{
    // Populate tags array from the database
    $this->tags = $component->tags()->pluck('name')->toArray();
}
```
