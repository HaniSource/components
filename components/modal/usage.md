---
name: 'modal'
---
## Overview

Welcome to this advanced modal component engineered for **complete flexibility** and designed to be used seamlessly from anywhere in your application.

### Basic Usage

All you need is to bind a trigger to a modal using a unique `id`. That’s it.

@blade 
<x-demo>
    <x-ui.modal.trigger id="basic-modal" class="my-4">
        <x-ui.button>
            Open
        </x-ui.button>
    </x-ui.modal.trigger>
    <x-ui.modal
        id="basic-modal"
        heading="Basic Modal"
        description="This is a simple modal example"
    >
        <p>Modal content goes here...</p>
    </x-ui.modal> 
</x-demo>
@endblade

```blade
<x-ui.modal.trigger id="basic-modal">
    <x-ui.button>
        Open
    </x-ui.button>
</x-ui.modal.trigger>

<x-ui.modal 
    id="basic-modal"
    heading="Basic Modal"
    description="This is a simple modal example"
>
    <p>Modal content goes here...</p>
</x-ui.modal>
```

This component is designed to be controlled **globally via events** while supporting **isolated scoped instances**, giving you maximum control and flexibility for any UI scenario.

When using modals inside loops or repeated components, it’s critical to generate unique modal ids dynamically. Without unique identifiers, a single modal trigger will open all modals sharing the same id on the page, leading to unpredictable and unwanted behavior.

```blade
@foreach ($post as $post)
    <x-ui.modal :id="'edit-post-' . $post->slug">
        you may put the trigger here, and bind to it the same id 
    </x-ui.modal>
@endforeach
```

### Usage with livewire
just dispatch events like you would do normaly

```php
use Livewire\Component;
 
class CreatePost extends Component
{
    public function update()
    {
        // ...

        $this->dispatch('open-modal', id: 'confirm-update');         
    }
}
```

> see an example of how to build [confirmation modal](.#contents-confirmation-modal) below

### Usage with Blade 

```html
<x-ui.button 
    x-on:click="$modal.open('confirm-update')"
>
    open confirm update modal
</x-ui.button>

<x-ui.button 
    x-on:click="$modal.close('confirm-update')"
>
    close confirm update modal
</x-ui.button>

<x-ui.button
    x-on:click="$modal.closeAll()"
>
    close all models
</x-ui.button>
```

> see a deeper look at [modal store](#contents-deeper-look-at-modal-store) below

### Customization
#### Position
by default the modal is alignement vertically to top but you can also make it at center or bottom

##### Center
@blade 
<x-demo>
    <!-- BOTTOM POSITION TRIGGER -->
    <div class="flex gap-2 justify-center">
    <x-ui.modal.trigger id="center-position" class="my-4">
        <x-ui.button>
            Center Modal Trigger
        </x-ui.button>
    </x-ui.modal.trigger>
    <!-- BOTTOM POSITION TRIGGER -->
    <x-ui.modal.trigger id="bottom-position" class="my-4">
        <x-ui.button>
            Bottom Modal Trigger
        </x-ui.button>
    </x-ui.modal.trigger>
    </div>
    <!-- CENTER POSITION MODAL -->
    <x-ui.modal
        id="center-position"
        position="center"
        heading="Basic Modal"
        description="This is a simple modal example"
    >
        <p>Modal content goes here...</p>
    </x-ui.modal> 
    <!-- BOTTOM POSITION TRIGGER -->
    <x-ui.modal
        id="bottom-position"
        position="bottom"
        heading="Basic Modal"
        description="This is a simple modal example"
    >
        <p>Modal content goes here...</p>
    </x-ui.modal> 
</x-demo>
@endblade

```blade
<div class="flex gap-2 justify-center">
    <x-ui.modal.trigger id="center-position" class="my-4">
        <x-ui.button>
            Center Modal Trigger
        </x-ui.button>
    </x-ui.modal.trigger>
    <!-- BOTTOM POSITION TRIGGER -->
    <x-ui.modal.trigger id="bottom-position" class="my-4">
        <x-ui.button>
            Bottom Modal Trigger
        </x-ui.button>
    </x-ui.modal.trigger>
</div>
    <!-- CENTER POSITION MODAL -->
<x-ui.modal
    id="center-position"
    {+position="center"+}
    heading="Basic Modal"
    description="This is a simple modal example"
>
    <p>Modal content goes here...</p>
</x-ui.modal> 
<!-- BOTTOM POSITION TRIGGER -->
<x-ui.modal
    id="bottom-position"
    {+position="bottom"+}
    heading="Basic Modal"
    description="This is a simple modal example"
>
    <p>Modal content goes here...</p>
</x-ui.modal> 
```
##### Bottom



### Deeper Look at `$modal` Store

The `$modal` magic utility in Alpine.js is a **global reactive store** that manages modals across your entire app. Think of it as a central controller that knows which modals are open and which are closed — and it makes opening and closing modals smooth and consistent everywhere.

```js
modal = Alpine.reactive({
    openModals: new Set(),

    open(id) {
        
        if (this.openModals.has(id)) return;
        
        this.openModals.add(id);
        window.dispatchEvent(new CustomEvent('open-modal', { detail: { id } }));
    },

    close(id) {
        
        if(!this.openModals.has(id)) return;

        this.openModals.delete(id);
        window.dispatchEvent(new CustomEvent('close-modal', { detail: { id } }));
    },

    closeAll() {
        this.openModals.forEach(id => {
            this.close(id);
        });
    },
    
    getOpenedModals(){
        return Array.from(Alpine.raw(this.openModals));
    },
    isOpen(id) {
        return this.openModals.has(id);
    }
    })
```

#### How it works

* **`openModals`**
  This is a `Set` holding the IDs of all currently open modals. Using a `Set` ensures no duplicate IDs, so a modal can’t be opened twice by accident.

* **`open(id)`**
  Opens a modal with the given `id`.

  * First, it checks if this modal is already open. If yes, it does nothing (prevents duplicates).
  * If not open yet, it adds the `id` to `openModals`.
  * Then, it dispatches a global browser event `open-modal` with the modal `id` in the event’s details. This event lets other parts of your app know to show that modal.

* **`close(id)`**
  Closes the modal with the specified `id`.

  * Checks if the modal is currently open; if not, does nothing.
  * Removes the modal `id` from the `openModals` set.
  * Dispatches a `close-modal` event with the modal `id` so your app can respond by hiding the modal.

* **`closeAll()`**
  Closes every open modal by iterating over `openModals` and calling `close(id)` on each.

* **`getOpenedModals()`**
  Returns an array of all currently open modal IDs.
  Uses `Alpine.raw()` to get the raw underlying data of the reactive `Set`, then converts it to a normal array for easy use.

* **`isOpen(id)`**
  Returns `true` if the modal with this `id` is open; otherwise `false`.

#### Quick example usage:

```js
$modal.open('login');   // Opens the login modal
$modal.close('login');  // Closes the login modal
console.log($modal.isOpen('login'));  // false after close
$modal.closeAll();      // Close every open modal instantly
console.log($modal.getOpenedModals()); // []
```
