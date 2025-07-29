---
name: 'overview'
---
# Overview

**Fluxtor** is a modern component library and design system built specifically for the **TALL stack**: Tailwind CSS, Alpine.js, Laravel, and Livewire, and even raw **Blade**.

It was invented for personal needs and the lack of such solution in our amazing community.

It follows the **copy-paste** philosophy made popular by shadcn/ui but goes further:

* **Zero dependencies**
* **Real Laravel integration**
* **Full ownership over your UI**
* **Reactive Blade components that scale**

## Philosophy

### Own Your Code

Every Fluxtor component lives in **your codebase**, not a vendor package.
No version conflicts, no dependency hell, no hidden behavior.
You own it. You control it. You ship it.

### Built for Developer Flow

* Add any component with a simple CLI command
* Components come fully documented and customizable
* Everything is plain Blade, Alpine, and Tailwind—nothing more
* No build step. No lock-in. No surprises.


## Architecture

### Component Anatomy

Each component includes:

* **Blade templates** for markup and structure
* **Alpine logic** for client-side behavior
* **Design tokens and variants** for theme customization
* **Clear docs** for usage, props, slots, and integration

Example:

```
resources/views/components/ui/
├── button/index.blade.php
├── card/index.blade.php
└── dropdown/
    ├── index.blade.php
    └── item.blade.php
```

### Design System

Fluxtor includes a fully themeable system with:

* Light/Dark mode support via system preference
* Custom color palettes, spacing, and typography
* Utility-first design with consistency baked in


## Integration Patterns

* Designed to work **seamlessly with Laravel's Blade components**
* Built with **Alpine** and **Livewire compatibility**
* No extra config or boilerplate—just copy, use, extend


## Getting Started

### Install via CLI

```bash
php artisan fluxtor:add button
php artisan fluxtor:add tags-input
php artisan fluxtor:add select
```

> Our CLI handles setup, imports, and file placement—so you don't have to.
> 
> [Read more about CLI](/docs/cli)

### Use in Blade

```blade
<x-ui.button variant="primary" size="lg">
    Click me
</x-ui.button>

<x-ui.card>
    <x-slot name="header">Card Title</x-slot>
    Card content goes here.
</x-ui.card>
```

### Customize Freely

```blade
{{-- resources/views/components/ui/button/index.blade.php --}}
<button {{ $attributes->merge(['class' => 'your-custom-class ' . $baseClasses]) }}>
    {{ $slot }}
</button>
```

Since it's your file, you can change anything—structure, logic, styles.

---

## Component Organization

All Fluxtor components live under the `ui` namespace:

```
resources/views/components/ui/
```

This ensures:

* **Isolation** for future updates
* **Scannable structure** as your library grows
* **A consistent mental model** inspired by `shadcn/ui`


## Theming

Define your own design system using Tailwind:

* Custom tokens for colors, spacing, radius
* Global dark mode with Tailwind `dark:` classes
* Consistent styles across all components

> [Read more about theming system](/docs/theming-system)

## Documentation

Every component includes:

* Usage examples
* Props and slot definitions
* Customization patterns
* Integration notes (Livewire, interactivity, accessibility...)

## Community & Contribution

Fluxtor is built **by Laravel devs, for Laravel devs**.
It powers production UIs and evolves based on real-world needs.

Since you own every component you install, **you can contribute improvements back**:

* Better accessibility
* New variants
* Performance enhancements
* Real-world use cases


## Next Steps

* [Dark Mode](/docs/dark-mode) – Add full theme switching
* [Theming System](/docs/theming) – Customize your design language
* [Component Reference](/docs/components) – Browse all available UI blocks
* [Need Help?](/docs/help) – Get unstuck fast


## TL;DR:

> **Fluxtor is the UI toolkit Laravel has always deserved.**
> Fully native. Zero dependencies. Copy-paste simplicity with infinite power.