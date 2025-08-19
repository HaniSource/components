---
name: 'theme-switcher'
---


# Theme Switcher Component

## Introduction

The `theme-switcher` component provides a fully accessible, responsive, and customizable way to switch between color themes in your application. It supports three layout variants—dropdown, stacked, and inline—and allows users to select between light, dark, and system themes. It is built with Alpine.js and Blade, ensuring seamless integration into Livewire or Alpine-powered interfaces.

## Installation

Use the [fluxtor artisan command](/docs/guides/installation#content-component-management) to install the `theme-switcher` component easily:

```bash
php artisan fluxtor:install theme-switcher
```

## Basic Usage

@blade 
<x-demo class="flex justify-center">
    <x-ui.theme-switcher  variant="dropdown"/> 
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
<x-demo class="flex justify-center">
    <x-ui.theme-switcher variant="dropdown" /> 
</x-demo>
@endblade

```html
<x-ui.theme-switcher variant="dropdown" />
```

### Stacked Variant

Displays a toggle button for dark/light themes. Automatically selects based on system preference if the `system` theme is active.

@blade 
<x-demo class="flex justify-center">
    <x-ui.theme-switcher variant="stacked" />
</x-demo>
@endblade

```html
<x-ui.theme-switcher variant="stacked" />
```

### Inline Variant

Displays all three theme options as inline buttons.

@blade 
<x-demo class="flex justify-center">
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
<x-demo class="flex justify-center">
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

This component is fully driven by JavaScript logic, read [dark mode guide](/docs/guides/dark-mode)



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
