---
name: 'toasts'
---

# Toast Notifications Component

## Introduction

The `toasts` component provides a lightweight, accessible, and customizable toast message system built with Alpine.js and Tailwind CSS. It supports multiple toast types (`info`, `success`, `error`, `warning`), auto-dismiss with progress bars, hover-to-pause functionality, keyboard-accessible close buttons, and configurable max visible toasts.

This component listens to a global `notify` event, enabling toast triggering from anywhere in your app without prop drilling.

## Basic Usage

@blade
<x-demo>
    <div x-data class="flex items-center justify-center">
    <x-ui.button
        x-on:click="$dispatch('notify', {
            type: 'success',
            content: 'Operation successful!',
            duration: 6000
        })"
    >
        show notification
    </x-ui.button>
    </div>
</x-demo>
@endblade

```html
<div x-data>
  <button
    x-on:click="$dispatch('notify', {
      type: 'success',
      content: 'Operation successful!',
      duration: 6000
    })"
  >
    Show Success Toast
  </button>
</div>
```

## Variants
@blade
<x-demo>
<div 
    x-data
    class="flex items-center justify-center gap-2"
>
    <button 
        x-on:click="$dispatch('notify', { type: 'success', content:'Success toast', duration: 6000 })"
        class="py-2 px-4 bg-green-500/15 cursor-pointer rounded-xl dark:text-white text-green-500"
    >
        Success
    </button>
    <button 
        x-on:click="$dispatch('notify', { type: 'info', content:'Info toast', duration: 6000 })"
        class="py-2 px-4 bg-white dark:bg-white/5 cursor-pointer rounded-xl dark:text-white text-gray-500"
    >
        Info
    </button>
    <button 
        x-on:click="$dispatch('notify', { type: 'error', content:'Error toast', duration: 6000 })"
        class="py-2 px-4 bg-red-500/15 cursor-pointer rounded-xl dark:text-white text-red-500"
    >
        Error
    </button>
    <button 
        x-on:click="$dispatch('notify', { type: 'warning', content:'Warning toast', duration: 6000 })"
        class="py-2 px-4 bg-yellow-500/15 cursor-pointer rounded-xl dark:text-white text-yellow-500"
    >
        Warning
    </button>
</div>
</x-demo>
@endblade

```html
<div 
    x-data
    class="flex items-center justify-center gap-2"
>
    <button 
        x-on:click="$dispatch('notify', { type: 'success', content:'Success toast', duration: 6000 })"
        class="py-2 px-4 bg-green-500/15 rounded-xl dark:text-white text-green-500"
    >
        Success
    </button>
    <button 
        x-on:click="$dispatch('notify', { type: 'info', content:'Info toast', duration: 6000 })"
        class="py-2 px-4 bg-white rounded-xl dark:text-white text-gray-500"
    >
        Info
    </button>
    <button 
        x-on:click="$dispatch('notify', { type: 'error', content:'Error toast', duration: 6000 })"
        class="py-2 px-4 bg-red-500/15 rounded-xl dark:text-white text-red-500"
    >
        Error
    </button>
    <button 
        x-on:click="$dispatch('notify', { type: 'warning', content:'Warning toast', duration: 6000 })"
        class="py-2 px-4 bg-yellow-500/15 rounded-xl dark:text-white text-yellow-500"
    >
        Warning
    </button>
</div>
```
### How To Use 

Place the toast container somewhere in your page (usually root layout):

```blade
<x-ui.toast position="bottom-right" maxToasts="5" />
```
#### Use With Livewire
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
#### Use With Alpine.js 

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

#### Use Raw Javascript

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





## Toast Types and Styling

Supports types:

* `info`
* `success`
* `error`
* `warning`

Each type has its own colors and icons for light and dark modes, using Tailwind and color-mix for theme consistency.

## Customization

### Positioning

Set the toast container position:

```html
<x-ui.toast position="top-left" />
```

### Max Toasts

Control maximum visible toasts via `maxToasts` prop:

```blade
<x-ui.toast maxToasts="3" />
```




### Notes

Toasts dismiss automatically after a duration (default 4000ms). Progress bar shows remaining time.
Hover pauses dismissal and progress animation.




## Component Props

| Prop Name   | Type    | Default          | Required | Description                                                 |
| ----------- | ------- | ---------------- | -------- | ----------------------------------------------------------- |
| `position`  | string  | `'bottom-right'` | No       | Toast container position (`bottom-right`, `top-left`, etc.) |
| `maxToasts` | integer | `5`              | No       | Maximum number of concurrent visible toasts                 |
