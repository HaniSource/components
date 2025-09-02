---
name: 'toast'
---

# Toast Notifications Component

## Introduction

The `toasts` component provides a lightweight, accessible, and customizable toast message system built with Alpine.js and Tailwind CSS. It supports multiple toast types (`info`, `success`, `error`, `warning`), auto-dismiss with progress bars, hover-to-pause functionality, keyboard-accessible close buttons, and configurable max visible toasts.

This component listens to a global `notify` event, enabling toast triggering from anywhere in your app without prop drilling.

## Installation

Use the [sheaf artisan command](/docs/guides/cli-installation#content-component-management) to install the `toast` component easily:

```bash
php artisan sheaf:install toast
```
then put the `<x-ui.toast />` in your global layout file like so:

```html
<!-- this is your base layout file -->
<x-ui.toast />
```

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
        class="py-2 px-4 bg-gray-300 dark:bg-white/5 cursor-pointer rounded-xl dark:text-white text-gray-500"
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
            type: 'success',
            content: 'This is a success message!',
            duration: 3000 
        }
    })
);
```
#### From Backend

You can create toasts from your backend using Laravel's `session()->flash()` helper:

```php
session()->flash('notify', [
    'content' => 'Operation completed successfully!',
    'type' => 'success', // optional if type is info.
    'duration' => 5000 // optional
]);
```

**Available Keys:**
- `content` (required) - The toast message text
- `type` (optional) - Toast variant: `info` (default), `success`, `error`, `warning`  
- `duration` (optional) - Display duration in milliseconds (default: 4000ms)

**Example Use Cases:**

**After User Logout:**
```php
<?php

declare(strict_types=1);

namespace App\Actions\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

final class Logout
{
    public function __invoke(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        session()->flash('notify', [
            'content' => 'You have been logged out successfully',
            'type' => 'success'
        ]);

        return redirect()->route('home');
    }
}
```

**Form Validation Errors:**
```php
// In your controller
if ($validator->fails()) {
    session()->flash('notify', [
        'content' => 'Please fix the validation errors',
        'type' => 'error',
        'duration' => 6000
    ]);
    
    return redirect()->back()->withErrors($validator);
}
```

**After Data Operations:**
```php
// After creating a record
$post = Post::create($validatedData);

session()->flash('notify', [
    'content' => 'Post created successfully!',
    'type' => 'success'
]);

return redirect()->route('posts.index');
```

> **Note:** The toast system uses `session()->pull()` on the frontend to retrieve and display flashed toast data, ensuring toasts appear only once per session flash.
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

### Progress Bar

You can make the progress bar thin by using the `progressBarVariant` attribute:
```html
<x-ui.toast 
    progressBarVariant="thin" 
/>
```

You can align the progress bar to the top by using the `progressBarAlignment` attribute:

```html
<x-ui.toast 
    progressBarVariant="thin"
    progressBarAlignment="top" 
/>
```




### Notes

Toasts dismiss automatically after a duration (default 4000ms). Progress bar shows remaining time.
Hover pauses dismissal and progress animation.

> I (mohamed) actually believe this toasts system working for all kind of tasts (after actions) in laravel, is deadly simple and powerfull, if you find any cases where it doesn't open new issue and let the work to me.  




## Component Props

| Prop Name   | Type    | Default          | Required | Description                                                 |
| ----------- | ------- | ---------------- | -------- | ----------------------------------------------------------- |
| `position`  | string  | `'bottom-right'` | No       | Toast container position (`bottom-right`, `top-left`, etc.) |
| `maxToasts` | integer | `5`              | No       | Maximum number of concurrent visible toasts                 |
