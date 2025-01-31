---
name: 'modal'
files:
    index: resources/views/components/modal/index.blade.php
    usage: resources/views/usage-file.blade.php
---
# Documentation

## Introduction

Imagine you're building a modern web application, and you need a flexible, customizable, and interactive modal to enhance the user experience. Enter **modal component**, an Alpine.js-powered Laravel Blade component designed to simplify modal creation with rich features like smooth animations, touch support, and a responsive design.

## Overview

The modal component component brings a seamless way to display popups with intuitive controls and smooth animations. It handles everything from triggering modals to ensuring accessibility and responsiveness out of the box.

## Features

- **Dynamic Triggering:** Open the modal using any element—button, div, or link.
- **Fluid Transitions:** Alpine.js handles animations for a polished user experience.
- **Mobile-Friendly:** Swipe down to close on touch devices.
- **Flexible Layouts:** Add headers, footers, and content sections effortlessly.

---

## How It Works

### Quick Start

Here’s how easy it is to add an `x-modal` to your Blade views:

```html
<x-modal>
    <x-slot:trigger class="px-4 py-1 rounded-xl dark:text-gray-300 text-gray-800 bg-white dark:bg-white/5">
        Open this modal
    </x-slot:trigger>
    <x-slot:header>
        Welcome to the modal world!
    </x-slot:header>
    This is your modal content. Make it count!
</x-modal>
```

### Breaking it Down

1. **`<x-modal>`:** The core wrapper for handling modal logic.
2. **`<x-slot:trigger>`:** The clickable element to launch the modal.
3. **`<x-slot:header>`:** Optional header to title your modal.
4. **Content:** Place anything inside the modal body.

---

## Detailed Explanation
```html
@props([
    'header' => null,
    'footer' => null,
    'height'=> 75,
    'scrollable'=>true,
    'closeEvent' => null,
    'openEvent'=>null,
])
@php
    $maxHeight = !$scrollable ? $height - 5 : $height - 10  
@endphp
<div 
    x-data="{ 
        isOpen: false,
        startY: 0,
        currentY: 0,
        moving: false,
        init() {
            this.$nextTick(()=>{
                Alpine.effect(() => {
                  this.$refs.panel.style.transform = `translateY(${this.distance}px)`;
                });
            })
        },
        close(){
            this.isOpen = false;
            this.resetPosition();
        },
        open(){
            this.isOpen = true;
        },
        get distance() {
            return this.moving ? Math.max(0, this.currentY - this.startY) : 0;
        },
        resetPosition() {
            this.startY = 0;
            this.currentY = 0;
            if (this.$refs.panel) {
                this.$refs.panel.style.transform = `translateY(0)`;
            }
        },
        handleMovingStart(event) {
            this.moving = true;
            this.startY = this.currentY = event.touches[0].clientY;
        },
        handleWhileMoving(event) {
            this.currentY = event.touches[0].clientY;
        },
        handleMovingEnd() {
            if (this.distance > 100) {
                this.close();
            }
            this.moving = false;
        },
    }"
    @if(filled($closeEvent))
        x-on:{{ $closeEvent }}.window="close()" 
    @endif
    @if(filled($openEvent))
        x-on:{{ $openEvent }}.window="open()" 
    @endif
    class="flex justify-center">
    @php
        $tag = $trigger->attributes->has('isButton') ? 'button' : 'div' ;
        $atts = $trigger->attributes->has('isButton') ? 'type="button"' : '';
    @endphp

    <{{ $tag }} 
        x-on:click="open()"
        {{ $atts }}
         {{ $trigger->attributes->except('isButton') }}
        >
            {{ $trigger }}
    </{{ $tag }}>

    <!-- The Modal -->

    <div
        x-show="isOpen"
        style="display: none"
        x-on:keydown.escape.prevent.stop="close()"
        role="dialog"
        aria-modal="true"
        x-id="['modal-header']"
        :aria-labelledby="$id('modal-header')"
        class="fixed inset-x-0 inset-y-0 z-10 overflow-y-auto"
    >
        <!-- Overlay -->
        <div 
            x-show="isOpen"
            x-transition.opacity
            class="fixed inset-0 dark:bg-black bg-white bg-opacity-60 backdrop-blur-lg"
        ></div>

        <!-- Panel -->
        <div
            x-show="isOpen" 
            x-transition
            x-ref="panel"
            x-on:click="close()"
            class="relative flex min-h-screen   items-center justify-center p-2 z-30"
        >
            <div class="h-[{{ $height }}vh] w-full">
                <div
                    x-on:click.stop
                    x-trap.noscroll.inert="isOpen"
                    @class([
                    "relative max-w-2xl mx-auto border dark:border-white/5 border-gray-800/15 overflow-y-auto rounded-xl dark:bg-zinc-950 bg-white text-gray-800 dark:text-gray-300 px-4 ",
                    'pb-4'=>blank($footer),
                    'pb-2'=>filled($footer),
                    'pt-4'=>blank($header),
                    'pt-2'=>filled($header)
                    ])
                >
                {{-- close button --}}
                    <div class="absolute top-2 right-2 dark:bg-white/5 dark:hover:bg-white/10 bg-gray-800/5 hover:bg-gray-800/10 transition-all duration-300  rounded-lg ">
                        <button
                            type="button"
                            class="p-1"
                            x-on:click.stop="close()"
                        >
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400"
                            viewBox="0 0 20 20">
                                <path
                                    d="M10 10l5.09-5.09L10 10l5.09 5.09L10 10zm0 0L4.91 4.91 10 10l-5.09 5.09L10 10z"
                                    stroke="currentColor" fill="none" fill-rule="evenodd"
                                    stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </svg>
                        </button>
                    </div>
                {{-- swapabble --}}
                    <div
                        x-on:touchstart="handleMovingStart($event)"
                        x-on:touchmove="handleWhileMoving($event)"
                        x-on:touchend="handleMovingEnd()"
                        class="absolute sm:hidden top-[-10px] left-0 right-0 h-[50px]">
                        <div class="flex justify-center pt-[12px]">
                            <div class="bg-gray-400 rounded-full w-[10%] h-[5px]"></div>
                        </div>
                    </div>
                    {{-- contents container --}}
                    @if(filled($header))
                    <div
                        {{ $header->attributes->merge(['class' => 'modal-header']) }} 
                        {{-- behave as sticky --}}
                        x-bind:id="$id('modal-header')"
                    >
                            {{ $header }}
                    </div>
                    @endif
                    <div class="h-full overflow-y-auto w-full max-h-[{{ $maxHeight }}vh]">
                        {{ $slot }}
                    </div>
                    @if (filled($footer))
                        <footer
                            @class([
                                "z-30 hidden sm:flex  w-full select-none items-center px-2 pt-2 text-center dark:border-gray-700",
                                'relative',
                                ])
                            >
                            {{ $footer }}
                        </footer>
                    @endif
                </div>
            </div>
        </div>
</div>
```

### Component Props

| Prop         | Type   | Default | Description                          |
|--------------|--------|---------|--------------------------------------|
| `header`     | mixed  | `null`  | Customizable header content         |
| `footer`     | mixed  | `null`  | Customizable footer content         |
| `height`     | number | `75`    | Modal height in viewport percentage |
| `scrollable` | bool   | `true`  | Determines the scroll behavior: if true, scrolling is confined to the modal container (ideal for global search modals). If false, the entire page remains scrollable (useful for content popups).     |
| `closeEvent` | string | `null`  | Event to trigger modal close         |
| `openEvent`  | string | `null`  | Event to trigger modal open          |

#### trigger tag
The ``trigger`` slot allows you to specify the element that will open the modal when clicked. You can use any HTML element inside the trigger slot to initiate the modal opening but button.

If your trigger is a button, you can simplify the markup by using the isButton flag directly in the trigger slot:

```html
<x-slot:trigger isButton>
    what's coming 
</x-slot:trigger>
``` 
However, if you use the isButton flag, ensure that you do not include a <button> element inside the trigger again to avoid nesting issues.

You can apply custom styles, classes, or even Alpine.js directives inside the trigger slot for additional behavior.

### Interactive Behavior

The modal leverages Alpine.js for dynamic behavior, making it easy to control.

- **Opening & Closing:**
  - Clicking the trigger toggles `isOpen` to `true`, displaying the modal.
  - Click outside or press `Escape` to close it.
- **Touch Gestures:**
  - Swipe down on mobile to dismiss the modal effortlessly.

---

## Breakdown of Functions

### `init()`

- Initializes the modal and sets up Alpine.js reactivity.
- Applies necessary transformations to handle positioning.

### `open()`

- Opens the modal by setting `isOpen` to `true`.
- Ensures proper focus management.

### `close()`

- Closes the modal by setting `isOpen` to `false`.
- Resets modal position and state.

### `get distance()`

- Calculates the vertical drag distance for swipe-to-close functionality.

### `resetPosition()`

- Resets the modal's position to its original state.

### `handleMovingStart(event)`

- Captures the initial touch position to detect user movement.

### `handleWhileMoving(event)`

- Updates the current Y position during touch movement.

### `handleMovingEnd()`

- Determines if the swipe distance exceeds the threshold and closes the modal if necessary.

---

## Customizing Your Modal

### Styling

Want a unique look? Easily customize the modal's appearance:

```blade
<x-modal class="custom-modal-class">
    Your custom content
</x-modal>
```

---
  
  
## using events
You may want to show or hide the modal programmatically outside the trigger element. This is an ideal use case for the events feature in the component. You can specify custom event names for opening and closing the modal as shown below:

```html
<x-modal openEvent="open-global-search" closeEvent="close-global-search">
    Your custom content
</x-modal>
```
You can dispatch these events either from Alpine.js or Livewire, like this:


### Alpinejs

```html
<button x-data x-on:click="$dispatch('open-global-search')">
    open global search
</button>
```
To Closing it:

```html
<button x-data x-on:click="$dispatch('close-global-search')">
    open global search
</button>
```
### Livewire

```php
function search(){
    // some logic here
    $this->dispatch('open-global-search')
} 
```

Honestly, I built this component multiple times, rather than all at once like others, making it suitable for various modals in Fluxtor, including global search, confirmation, and content popups. I hope you find it good as well 