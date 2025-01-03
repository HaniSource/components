---
name: 'filament-notifications'
files:
    index: resources/views/components/toasts/index.blade.php
    usage: resources/views/some-usage-file.blade.php
---


## Documentation

### Overview

The Toast Notification Component provides an intuitive and customizable way to display transient messages on the screen, such as success alerts, error messages, or informational updates. It leverages Alpine.js for reactivity, ensuring a smooth and dynamic user experience.

### Component Structure:

#### Toast Component (`toasts/index.blade.php`)

```html
<div
    x-data="{
        toasts: [],
        typeMap: {
            info: {
                textColor: 'text-gray-400',
                icon: '!',
                srLabel: 'Information',
                background:'dark:bg-gray-500/15 bg-gray-800/15',
                borderColor:'border-gray-500/55'
            },
            success: {
                textColor: 'text-green-600',
                icon: '&check;',
                srLabel: 'Success',
                background:'dark:bg-green-500/15 bg-green-500/35',
                borderColor:'border-green-500/55'
            },
            error: {
                textColor: 'text-red-600',
                icon: '&times;',
                srLabel: 'Error',
                background:'dark:bg-red-500/15 bg-red-500/35',
                borderColor:'border-red-500/55'
            }
        },
        notify(e) {
            this.toasts.push({
                id: e.timeStamp,
                type: e.detail.type,
                content: e.detail.content,
                duration: e.detail.duration || 4000
            })
        },
        remove(toast) {
            this.toasts = this.toasts.filter(i => i.id !== toast.id)
        }
    }"
    x-on:notify.window="notify($event)"
    class="fixed bottom-0 right-0 flex w-full max-w-xs flex-col space-y-4 pr-4 pb-4 sm:justify-start"
    role="status"
    aria-live="polite"
>
    <!-- Notification -->
    <template 
        x-for="toast in toasts" 
        x-bind:key="toast.id"
    >
        <div class="dark:bg-gray-900 bg-white rounded-xl">
            <div
                x-data="{
                    show: false,
                    init() {
                        this.$nextTick(() => this.show = true)
                        setTimeout(() => this.fadeOut(), toast.duration)
                    },
                    fadeOut() {
                        this.show = false
                        setTimeout(() => this.remove(toast), 500)
                    }
                }"
                x-show="show"
                x-transition.duration.100ms
                x-bind:class="[
                    'pointer-events-auto relative  w-full max-w-sm rounded-xl border dark:border-white/15 border-gray-200 py-4 pl-6 pr-4 shadow-lg',
                    typeMap[toast.type].background
                ]"
            >
                <div class="flex items-start ">
                    <div class="flex-shrink-0" x-bind:class="typeMap[toast.type].textColor">
                        <div aria-hidden="true" class="flex size-6 items-center justify-center rounded-full border-2 font-bold text-xl pb-1 leading-none" x-bind:class="typeMap[toast.type].borderColor" x-html="typeMap[toast.type].icon"></div>
                        <span class="sr-only" x-text="typeMap[toast.type].srLabel"></span>
                    </div>
                    <div class="ml-3 w-0 flex-1 pt-0.5">
                        <p x-text="toast.content" class="text-sm font-medium leading-5 text-gray-900 dark:text-white"></p>
                    </div>
                    <div class="ml-4 flex flex-shrink-0">
                        <button x-on:click="fadeOut()" type="button" class="inline-flex text-gray-400">
                            <svg aria-hidden class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close toast</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </template>
</div>

```


##### Scripts Explanation

- **typeMap**: Defines styling and content for different notification types (info, success, error).

- **``notify`` Function**: The ``notify`` function is responsible for adding a new notification to the ``toasts`` array. Here's how it works:
    - **Triggered by a Global Event:**
        The ``x-on:notify.window="notify($event)"`` directive listens for a notify event dispatched anywhere in the application.
    - **Extracts Event Details:**
        When the event is triggered, the function retrieves details such as:

        - ``type``: The type of the notification (e.g., info, success, error).
        - ``content``: The text to display in the notification.
        - ``duration``: How long the notification should stay visible (default is 2000ms if not provided).
    - **Pushes to toasts Array:**
        A new toast object is created with:

        A unique ``id`` (using ``event.timeStamp``).
        The ``type``, ``content``, and ``duration`` extracted from the event. This object is then added to the ``toasts`` array, which makes it available for rendering.

- **``remove`` Function**: Removes a toast from the list by its ID.
    Here's how it works:
    - **Triggered by ``fadeOut``:**
        The fadeOut method in the child component calls remove once the notification has been hidden using animations.

    - Filters Out the Toast:
        The function uses the ``filter`` method to create a new ``toasts`` array that excludes the toast with the matching ``id``.


each toast in the toasts array has its own seperate alpine component for controlling animations correctly 


#### How To Use 

1. **Global Placement** Add the ``<x-components::toasts/>``component to your ``layouts/app.blade.php`` or any global layout to ensure it is available across your application.

```html
<body>
    {{ $slot }}
    <x-components::toasts/> <------------------------
</body>
```
2. **Triggering Notifications** Dispatch a global ``notify`` event with the desired ``type``, ``content``, and ``duration`` from anywhere in your application.

##### Use With Alpine.js 

```html
<button
    @click="$dispatch('notify', {
        type: 'success',
        content: 'This is a success toast!',
        duration: 3000,
    })"
>
    Show Success Toast
</button>

```
###### Multiple Notification Types:
there is 3 supported types of notifications

```html
<div 
    x-data 
    class="flex items-center justify-center gap-1"
>
    <button 
        x-on:click="$dispatch('notify',{
            type: 'success',
            content:'this is taost component',
            duration: 4000
        })"
        class="py-2 px-4 bg-white/15 rounded-xl text-white"
    >
    success toast
    </button>
    <button 
        x-on:click="$dispatch('notify',{
            type: 'info',
            content:'this is taost component',
            duration: 4000
        })"
        class="py-2 px-4 bg-white/15 rounded-xl text-white"
    >
    info toast
    </button>
    <button 
        x-on:click="$dispatch('notify',{
            type: 'error',
            content:'this is taost component',
            duration: 4000
        })"
        class="py-2 px-4 bg-white/15 rounded-xl text-white"
    >
    error toast
    </button>
</div>
```
##### Use With Livewire
you can use livewire to show the toast, here is an example 

```php
use Livewire\Component;
 
class CreatePost extends Component
{
    public function save()
    {
        // ...
 
        $this->dispatch('notify',
            type: 'success',
            content:'post saved successfully',
            duration: 4000
        ); 
    }
}
```

##### Use Raw Javascript

```js
window.dispatchEvent(
    new CustomEvent('notify', {
        detail: {
            type: 'success', // or 'info', 'error'
            content: 'This is a success message!',
            duration: 3000 // duration in milliseconds
        }
    })
);
```