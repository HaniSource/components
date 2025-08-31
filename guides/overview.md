---
name: 'overview'
---
# Overview

<<<<<<< HEAD
**Sheaf UI** is a modern component library and design system built specifically for the **TALL stack**: Tailwind CSS, Alpine.js, Laravel, and Livewire, and even raw **Blade** with alpinejs reactivity.
=======
**sheaf** is a modern component library and design system built specifically for the **TALL stack**: Tailwind CSS, Alpine.js, Laravel, and Livewire, and even raw **Blade** with alpinejs reactivity.
>>>>>>> 0f4057d15faad34310ebce7d7e580a793a714bba

It was invented for personal needs and the lack of such solution in our amazing community.

It follows the **copy-paste** philosophy through our [cli](/docs/guides/installation) made popular by shadcn/ui but goes further:

* **Zero dependencies** (for most components)
* **Real Laravel integration**
* **Full ownership over your UI**
* **Reactive Blade components that scale**

## Philosophy

### Own Your Code

<<<<<<< HEAD
Every Sheaf UI component lives in **your codebase**, not a vendor package.
=======
Every sheaf component lives in **your codebase**, not a vendor package.
>>>>>>> 0f4057d15faad34310ebce7d7e580a793a714bba
No version conflicts, no dependency hell, no hidden behavior.
You own it. You control it.  You modify it. You ship it.

### Built for Developer Flow

* Add any component with a simple CLI command.
* Components come fully documented and customizable.
* Everything is plain Blade, Alpine, and Tailwind, nothing more.
* No build step. No lock-in. No surprises.


## Architecture

### Component Anatomy

Each component includes:

* **Blade templates** for markup and structure
* **Alpine logic** for client-side behavior
* **Design tokens and variants** for theme customization
* **Clear docs** for usage, props, slots, and integration

Example:

this how may typically your codebase will look likes:

```
resources/views/components/ui/
├── button/index.blade.php
├── card/index.blade.php
└── dropdown/
    ├── index.blade.php
    └── item.blade.php
```

### Design System

Sheaf UI includes a fully themeable system with:

* Light/Dark mode support via system preference
* Custom color palettes, spacing, and typography
* Utility-first design with consistency baked in


## Integration Patterns

* Designed to work **seamlessly with Laravel's Blade components**
* Built with **Alpine** and **Livewire compatibility**
* No extra config or boilerplate just copy (via cli), use, extend ...


## Getting Started

### Install via CLI

```bash
php artisan sheaf:add button
php artisan sheaf:add tags-input
php artisan sheaf:add select
php artisan sheaf:add ...
```

> Our CLI handles setup, imports, and file placement so you don't have to.
> 
> [Read more about CLI](/docs/guides/installation)

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

Since it's your file, you can change anything: structure, logic, styles...

---

## Component Organization

All Sheaf UI components live under the `ui` namespace:

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

> [Read more about theming system](/docs/guides/themes)

## Documentation

Every component includes:

* Usage examples
* Props and slot definitions
* Customization patterns
* Integration notes (Livewire, interactivity, accessibility...)

## Community & Contribution

Sheaf UI is built **by Laravel devs, for Laravel devs**.
It powers production UIs and evolves based on real-world needs.

Since you own every component you install, **you can contribute improvements back**:

* Better accessibility
* New variants
* Performance enhancements
* Real-world use cases


## Next Steps

* [Dark Mode](/docs/guides/dark-mode) – Add full theme switching
* [Theming System](/docs/guides/themes) – Customize your design language
* [Component Reference](/docs/components) – Browse all available UI blocks
* [Need Help?](/docs/guides/help) – Get unstuck fast


> **Sheaf UI is the UI toolkit Laravel has always deserved.**
> Fully native. Zero dependencies. Copy paste simplicity with infinite power.