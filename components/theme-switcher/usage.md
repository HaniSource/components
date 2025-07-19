---
name: 'theme-switcher'
---


# Theme Switcher Component

## Introduction

The `theme-switcher` component provides a fully accessible, responsive, and customizable way to switch between color themes in your application. It supports three layout variants—dropdown, stacked, and inline—and allows users to select between light, dark, and system themes. It is built with Alpine.js and Blade, ensuring seamless integration into Livewire or Alpine-powered interfaces.

## Basic Usage

@blade <x-demo>
<x-ui.theme-switcher variant="dropdown"/> </x-demo>
@endblade

```html
<x-ui.theme-switcher variant="dropdown" />
```

## Variants

The component supports three visual layouts:

### Dropdown Variant (default)

Displays the theme switcher as a dropdown menu with the current theme icon as a button.

@blade <x-demo>
<x-ui.theme-switcher variant="dropdown" /> </x-demo>
@endblade

```html
<x-ui.theme-switcher variant="dropdown" />
```

### Stacked Variant

Displays a toggle button for dark/light themes. Automatically selects based on system preference if the `system` theme is active.

@blade <x-demo>
<x-ui.theme-switcher variant="stacked" /> </x-demo>
@endblade

```html
<x-ui.theme-switcher variant="stacked" />
```

### Inline Variant

Displays all three theme options as inline buttons.

@blade <x-demo>
<x-ui.theme-switcher variant="inline" /> </x-demo>
@endblade

```html
<x-ui.theme-switcher variant="inline" />
```

## Customization

### Icons

You can customize the icons used for each theme:

```html
<x-ui.theme-switcher
    dark-icon="moon"
    light-icon="sun"
    system-icon="computer-desktop"
/>
```

### Icon Variants

Control icon style using the `icon-variant` prop (e.g., `mini`, `outline`, etc.):

```html
<x-ui.theme-switcher icon-variant="outline" />
```

## JavaScript Behavior

this component is cames based 100% with scripts that happens when running 

```shell
php artisan fluxtor:init
```

if some how you want this to work, copy this script into you `resources/js/app.js`

```js
// other imports 
import themeSwitcher from "./components/themeSwitcher";

//....

document.addEventListener("alpine:init", themeSwitcher);
```

this is how ``themeSwitcher`` file should looks like 

The component uses Alpine.js internally and listens to `theme-changed` events. It stores the theme selection in `localStorage` and optionally applies the system preference if `theme == 'system'`.

### Alpine State

```js
{
  theme: null,
  init() {
    this.theme = localStorage.getItem('theme')
    this.$watch('theme', () => {
        $dispatch('theme-changed', this.theme)
    })
  },
  setTheme(val) {
    this.theme = val
  },
  themeIs(mode) {
    return this.theme === mode
  },
  toggleTheme() {
    this.theme === 'dark' ? this.setTheme('light') : this.setTheme('dark')
  }
}
```


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
