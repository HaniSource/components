---
name: 'theme-switcher'
---


# Theme Switcher Component

## Introduction

The `theme-switcher` component provides a fully accessible, responsive, and customizable way to switch between color themes in your application. It supports three layout variants—dropdown, stacked, and inline—and allows users to select between light, dark, and system themes. It is built with Alpine.js and Blade, ensuring seamless integration into Livewire or Alpine-powered interfaces.

## Basic Usage

@blade 
<x-demo>
    <x-ui.theme-switcher variant="dropdown"/> 
</x-demo>
@endblade

```html
<x-ui.theme-switcher variant="dropdown" />
```

## Variants

The component supports three visual layouts:

### Dropdown Variant (default)

Displays the theme switcher as a dropdown menu with the current theme icon as a button.

@blade 
<x-demo>
    <x-ui.theme-switcher variant="dropdown" /> 
</x-demo>
@endblade

```html
<x-ui.theme-switcher variant="dropdown" />
```

### Stacked Variant

Displays a toggle button for dark/light themes. Automatically selects based on system preference if the `system` theme is active.

@blade 
<x-demo>
    <x-ui.theme-switcher variant="stacked" />
</x-demo>
@endblade

```html
<x-ui.theme-switcher variant="stacked" />
```

### Inline Variant

Displays all three theme options as inline buttons.

@blade 
<x-demo>
    <x-ui.theme-switcher variant="inline" />
</x-demo>
@endblade

```html
<x-ui.theme-switcher variant="inline" />
```

## Customization

### Icons

You can customize the icons used for each theme:
@blade 
<x-demo>
    <x-ui.theme-switcher 
        variant="stacked"
        dark-icon="bug-ant"
        light-icon="light-bulb"
        system-icon="command-line"
    />
</x-demo>
@endblade

```html
<x-ui.theme-switcher
    variant="stacked" 
    dark-icon="bug-ant"
    light-icon="light-bulb"
    system-icon="command-line"
/>
```
>  This features applies to all theme-switcher variants: dropdown, stacked, inline

### Icon Variants

Control icon style using the `icon-variant` prop (e.g., `mini`, `outline`, etc.):

```html
<x-ui.theme-switcher icon-variant="outline" />
```

## JavaScript Behavior

This component is fully driven by JavaScript logic, which is automatically wired up when you run using `fluxtor/cli`:

```shell
php artisan fluxtor:init
```

If you want to manually enable this behavior or integrate it into your existing build pipeline, copy the following snippet into your ``resources/js/app.js`` (or equivalent entry point):

```js
// Other imports...
import themeSwitcher from "./components/themeSwitcher";

// Initialize Alpine with themeSwitcher on alpine:init event
document.addEventListener("alpine:init", themeSwitcher);
```

Here’s a canonical example of the ``resources/js/components/themeSwitcher.js`` module implementing the logic used by the component:

```js
export default () => {
    
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
}
```

The component uses Alpine.js internally and listens to `theme-changed` events. It stores the theme selection in `localStorage` and optionally applies the system preference if `theme == 'system'`.



## Component Props

| Prop Name      | Type   | Default            | Required | Description                                   |
| -------------- | ------ | ------------------ | -------- | --------------------------------------------- |
| `variant`      | string | `dropdown`         | No       | Layout style: `dropdown`, `stacked`, `inline` |
| `dark-icon`    | string | `moon`             | No       | Icon name for dark theme                      |
| `light-icon`   | string | `sun`              | No       | Icon name for light theme                     |
| `system-icon`  | string | `computer-desktop` | No       | Icon name for system theme                    |
| `icon-variant` | string | `mini`             | No       | Variant style for icons                       |

## Example with All Props

```html
<x-ui.theme-switcher
    variant="inline"
    dark-icon="moon"
    light-icon="sun"
    system-icon="computer-desktop"
    icon-variant="outline"
/>
```

## Notes

* Make sure to handle the `theme-changed` event in your layout script to apply the class to `<html>` or `<body>`.
* For system detection, ensure you're listening to `matchMedia('(prefers-color-scheme: dark)')`.
