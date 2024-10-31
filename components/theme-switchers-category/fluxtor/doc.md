---
name: 'fluxtor theme switcher'
files:
    index: resources/views/components/theme-switcher/index.blade.php
    app: resources/views/js/app.js
---


## Documentation

### Overview

Supporting both dark and light mode on your website can enhance user experience significantly. This documentation explains how to integrate a theme switcher component into your website, allowing users to toggle between dark and light modes easily. The instructions below will guide you through adding the necessary components and scripts to support seamless theme switching and prevent any flickering during theme transitions. 

### Component's Structure

1. Theme Mode Trigger (``theme-switcher/index.blade.php``): This view component renders the theme switcher button, allowing users to toggle between themes.
2. Theme Scripts (``app.js``): These scripts are essential for applying the initial theme based on the user's preferences and saving any changes they make. They ensure that the preferred theme is consistently applied, even across page reloads.

So Let's go step by step :

#### ***Step 1***:  Initializing the Theme in app.js 
for initializing the theme in the ``app.js`` we need to follow this sub-steps
1. **Setting Up Theme from Local Storage :** 

The first part grabs the user’s theme preference (if it exists) from ``localStorage``. If it hasn’t been set before, it defaults to ``"system"``—meaning it will match the system’s default setting (light or dark).

```js
const theme = localStorage.getItem("theme") ?? "system";
```

This line checks ``localStorage`` for a saved theme mode. If it’s ``null``, ``undefined``, or an empty string, we assume ``"system"``. So if the user has chosen their preference before, this will pick it up; otherwise, it goes with the ``system``.

2. **Storing and Applying the Theme:**

Now we take the theme value and add it to Alpine’s reactive store, which lets the whole app access and react to the theme setting. This way, any component that uses this theme store will instantly know whether it’s in dark or light mode.

```js
window.Alpine.store(
    "theme",
    theme === "dark" ||
        (theme === "system" &&
         window.matchMedia("(prefers-color-scheme: dark)").matches)
        ? "dark"
        : "light"
);
```

*Here's what's happening:*

We use a check: if the saved theme is ``"dark"``, we store it as ``"dark"``.
If it’s ``"system"``, we ask if the system preference is dark (using ``matchMedia``). If so, we set the theme store to ``"dark"``.
If neither condition matches, we default to ``"light"``

3. **Updating Theme with Custom Events:**

This part sets up an event listener for custom theme changes. we will build a dropdown later in this section to  trigger a ``theme-changed`` event to update the theme, which keeps the UI consistent.

```js
window.addEventListener("theme-changed", (event) => {
    let theme = event.detail;

    localStorage.setItem("theme", theme);
    
    if (theme === "system") {
        theme = window.matchMedia("(prefers-color-scheme: dark)").matches
            ? "dark"
            : "light";
    }

    window.Alpine.store("theme", theme);
});
```

Here’s the rundown:

- When a ``theme-changed`` event fires, it updates ``localStorage`` with the new theme.
- If the new theme is ``"system"``, it checks the system preference (``dark`` or ``light``) and sets the theme accordingly.
- Finally, it updates the theme in the Alpine store, which updates the theme across the app.

4.  **Listen for System Theme Changes**(optional):

If the user chose ``"system"`` as their theme, this code listens for system theme changes (for example, if they switch to dark mode on their OS). This keeps the app’s theme in sync with the system.

```js
window
    .matchMedia("(prefers-color-scheme: dark)")
    .addEventListener("change", (event) => {
        if (localStorage.getItem("theme") === "system") {
            window.Alpine.store("theme", event.matches ? "dark" : "light");
        }
    });

```
If the user’s preference in ``localStorage`` is ``"system"``, this block will update the Alpine theme store whenever the system’s theme mode changes, using event.matches to determine whether dark mode is active.

5. **Applying the Theme to the DOM**

This final part uses Alpine’s ``effect()`` to automatically add or remove the ``dark`` class on the HTML ``<html>`` element based on the theme. Adding this class enables dark mode styling; removing it switches to light mode.

```js
window.Alpine.effect(() => {
    const theme = window.Alpine.store("theme");

    theme === "dark"
        ? document.documentElement.classList.add("dark")
        : document.documentElement.classList.remove("dark");
});
```
Whenever the theme in the Alpine store changes, this function runs:

- If the theme is ``"dark"``, it adds the ``dark`` class to the document’s root element, turning on dark mode.
- If it’s ``"light"``, it removes the class, switching to ``light`` mode.

oki that's it for the script this is the whole code that you can copy in your ``resources/js/app.js`` 

```js
    
document.addEventListener("alpine:init", () => {
    
    const theme = localStorage.getItem("theme") ?? "system";

    window.Alpine.store(
        "theme",
        theme === "dark" ||
            (theme === "system" &&
                window.matchMedia("(prefers-color-scheme: dark)").matches)
            ? "dark"
            : "light"
    );

    window.addEventListener("theme-changed", (event) => {
        let theme = event.detail;

        localStorage.setItem("theme", theme);

        if (theme === "system") {
            theme = window.matchMedia("(prefers-color-scheme: dark)").matches
                ? "dark"
                : "light";
        }

        window.Alpine.store("theme", theme);
    });

    window
        .matchMedia("(prefers-color-scheme: dark)")
        .addEventListener("change", (event) => {
            if (localStorage.getItem("theme") === "system") {
                window.Alpine.store("theme", event.matches ? "dark" : "light");
            }
        });

    window.Alpine.effect(() => {
        const theme = window.Alpine.store("theme");

        theme === "dark"
            ? document.documentElement.classList.add("dark")
            : document.documentElement.classList.remove("dark");
    });
});
```
#### ***Step 2***: Create the Theme Toggle Component
Add this code to ``theme-switcher/index.blade.php`` to create a theme dropdown component. It initializes the theme state from ``localStorage`` and dispatches a ``theme-changed`` event when the user selects a new theme mode.
```html
<div 
    class='ml-6 flex items-center  pl-6'>
    <label class="sr-only">
        Theme
    </label>

    <div x-data="{
        theme: null,
        init() {
            this.theme = localStorage.getItem('theme')
            this.$watch('theme', () => {
                $dispatch('theme-changed', this.theme)
            })
        },
        setTheme(val){
            this.theme = val;
        }, 
        themeIs(mode){
            return this.theme === mode;
        }  
    }">
        <x-dropdown>
            <x-slot:button class="bg-purple-500/[0.09]">
                <div aria-expanded="false">
                    <span  class="dark:hidden">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path class="dark:stroke-slate-500 stroke-slate-400"
                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z">
                            </path>
                            <path class="dark:stroke-slate-500 stroke-slate-400"
                                d="M12 4v1M17.66 6.344l-.828.828M20.005 12.004h-1M17.66 17.664l-.828-.828M12 20.01V19M6.34 17.664l.835-.836M3.995 12.004h1.01M6 6l.835.836">
                            </path>
                        </svg>
                    </span>
                    <span  class="dark:inline hidden">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none">
                            <path class="fill-transparent" fill-rule="evenodd" clip-rule="evenodd"
                                d="M17.715 15.15A6.5 6.5 0 0 1 9 6.035C6.106 6.922 4 9.645 4 12.867c0 3.94 3.153 7.136 7.042 7.136 3.101 0 5.734-2.032 6.673-4.853Z">
                            </path>
                            <path class="dark:fill-slate-500 fill-slate-400"
                                d="m17.715 15.15.95.316a1 1 0 0 0-1.445-1.185l.495.869ZM9 6.035l.846.534a1 1 0 0 0-1.14-1.49L9 6.035Zm8.221 8.246a5.47 5.47 0 0 1-2.72.718v2a7.47 7.47 0 0 0 3.71-.98l-.99-1.738Zm-2.72.718A5.5 5.5 0 0 1 9 9.5H7a7.5 7.5 0 0 0 7.5 7.5v-2ZM9 9.5c0-1.079.31-2.082.845-2.93L8.153 5.5A7.47 7.47 0 0 0 7 9.5h2Zm-4 3.368C5 10.089 6.815 7.75 9.292 6.99L8.706 5.08C5.397 6.094 3 9.201 3 12.867h2Zm6.042 6.136C7.718 19.003 5 16.268 5 12.867H3c0 4.48 3.588 8.136 8.042 8.136v-2Zm5.725-4.17c-.81 2.433-3.074 4.17-5.725 4.17v2c3.552 0 6.553-2.327 7.622-5.537l-1.897-.632Z">
                            </path>
                            <path class="dark:fill-slate-500 fill-slate-400" fill-rule="evenodd" clip-rule="evenodd"
                                d="M17 3a1 1 0 0 1 1 1 2 2 0 0 0 2 2 1 1 0 1 1 0 2 2 2 0 0 0-2 2 1 1 0 1 1-2 0 2 2 0 0 0-2-2 1 1 0 1 1 0-2 2 2 0 0 0 2-2 1 1 0 0 1 1-1Z">
                            </path>
                        </svg>
                    </span>
                </div>
            </x-slot:button>
            <x-slot:items class="w-36 dark:bg-transparent bg-gray-100">
                <x-dropdown.item class="flex items-center gap-1" x-on:click="setTheme('light')">
                    <svg class="mr-1 h-5 w-5" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path x-bind:class="themeIs('light') ? 'stroke-violet-500' : 'stroke-slate-400'" 
                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                        <path x-bind:class="themeIs('light') ? 'stroke-violet-500' : 'stroke-slate-400'" 
                            d="M12 4v1M17.66 6.344l-.828.828M20.005 12.004h-1M17.66 17.664l-.828-.828M12 20.01V19M6.34 17.664l.835-.836M3.995 12.004h1.01M6 6l.835.836"></path>
                    </svg>
                    <span x-bind:class="themeIs('light') ? 'text-violet-500 dark:text-violet-400':'text-gray-900 dark:text-white'">Light</span>
                </x-dropdown.item>
                <x-dropdown.item class="flex items-center gap-1" x-on:click="setTheme('dark')">
                    <svg class="mr-1 h-5 w-5" viewBox="0 0 24 24" fill="none">
                        <path class="fill-transparent" fill-rule="evenodd" clip-rule="evenodd"
                            d="M17.715 15.15A6.5 6.5 0 0 1 9 6.035C6.106 6.922 4 9.645 4 12.867c0 3.94 3.153 7.136 7.042 7.136 3.101 0 5.734-2.032 6.673-4.853Z">
                        </path>
                        <path x-bind:class="themeIs('dark') ? 'dark:fill-violet-500 fill-violet-400' : 'dark:fill-slate-500 fill-slate-400'"
                            d="m17.715 15.15.95.316a1 1 0 0 0-1.445-1.185l.495.869ZM9 6.035l.846.534a1 1 0 0 0-1.14-1.49L9 6.035Zm8.221 8.246a5.47 5.47 0 0 1-2.72.718v2a7.47 7.47 0 0 0 3.71-.98l-.99-1.738Zm-2.72.718A5.5 5.5 0 0 1 9 9.5H7a7.5 7.5 0 0 0 7.5 7.5v-2ZM9 9.5c0-1.079.31-2.082.845-2.93L8.153 5.5A7.47 7.47 0 0 0 7 9.5h2Zm-4 3.368C5 10.089 6.815 7.75 9.292 6.99L8.706 5.08C5.397 6.094 3 9.201 3 12.867h2Zm6.042 6.136C7.718 19.003 5 16.268 5 12.867H3c0 4.48 3.588 8.136 8.042 8.136v-2Zm5.725-4.17c-.81 2.433-3.074 4.17-5.725 4.17v2c3.552 0 6.553-2.327 7.622-5.537l-1.897-.632Z">
                        </path>
                        <path x-bind:class="themeIs('dark') ? 'dark:fill-violet-500 fill-violet-400' : 'dark:fill-slate-500 fill-slate-400'" fill-rule="evenodd" clip-rule="evenodd"
                            d="M17 3a1 1 0 0 1 1 1 2 2 0 0 0 2 2 1 1 0 1 1 0 2 2 2 0 0 0-2 2 1 1 0 1 1-2 0 2 2 0 0 0-2-2 1 1 0 1 1 0-2 2 2 0 0 0 2-2 1 1 0 0 1 1-1Z">
                        </path>
                    </svg>
                    <span x-bind:class="themeIs('dark') ? 'text-violet-500 dark:text-violet-400':'text-gray-900 dark:text-white'">Dark</span>
                </x-dropdown.item>
                <x-dropdown.item class="flex items-center gap-1" x-on:click="setTheme('system')">
                    <svg class="mr-1 h-5 w-5" viewBox="0 0 24 24" fill="none">
                        <path x-bind:class="themeIs('system') ? 'dark:stroke-violet-500 stroke-violet-400' : 'dark:stroke-slate-500 stroke-slate-400'"
                            d="M4 6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6Z" stroke-width="2"
                            stroke-linejoin="round"></path>
                        <path 
                            x-bind:class="themeIs('system') ? 'dark:stroke-violet-500 stroke-violet-400' : 'dark:stroke-slate-500 stroke-slate-400'"
                            d="M14 15c0 3 2 5 2 5H8s2-2 2-5" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <span x-bind:class="themeIs('system') ? 'text-violet-500 dark:text-violet-400' : 'text-gray-900 dark:text-white'">System </span>
                </x-dropdown.item>
            </x-slot:items>
        </x-dropdown>
    </div>
    
</div>

``` 
#### Preventing Flicker on Page Load 
When setting the theme mode, a brief flicker may occur on page load, especially if the dark theme is applied. This flicker happens because the theme is applied after the page is initially rendered. To prevent this, add the following script in the ``<head>`` section of your ``app.blade.php`` file. This script applies the dark theme class (``.dark``) immediately if the theme preference is already set to dark.

Add this code in the ``<head>`` of your ``app.blade.php``:
```html
<script>
    const theme = localStorage.getItem('theme') ?? 'system'

    if (
        theme === 'dark' ||
        (theme === 'system' &&
            window.matchMedia('(prefers-color-scheme: dark)')
                .matches)
    ) {
        document.documentElement.classList.add('dark')
    }
</script>
```