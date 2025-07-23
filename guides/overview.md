# Overview

Fluxtor is a comprehensive component library and design system built specifically for the TALL stack (Tailwind CSS, Alpine.js, Laravel, Livewire) community. Unlike traditional package-based libraries, Fluxtor follows the copy-paste philosophy pioneered by shadcn/ui, giving you complete ownership and control over your components.

## Philosophy

### Own Your Code
Every component you add to your project becomes part of your codebase. There are no hidden dependencies or black box implementations. You can modify, extend, and customize components to perfectly fit your project's needs.

### TALL Stack Native
Fluxtor components are designed from the ground up for the TALL stack ecosystem:
- **Tailwind CSS** for styling with full customization support
- **Alpine.js** for reactive behavior and client-side interactions
- **Laravel** integration with Blade components and backend patterns
- **Livewire** compatibility for seamless server-side reactivity

### Developer Experience First
- Components copy directly into your project structure
- No version conflicts or dependency management
- Full transparency into how components work
- Easy customization and extension

## Architecture

### Component Structure
Each Fluxtor component consists of:
- **Blade Templates**: The HTML structure with Tailwind classes
- **Alpine.js Logic**: Client-side reactivity and interactions  
- **Configuration**: Customizable design tokens and variants
- **Documentation**: Usage examples and API reference

### Design System

Fluxtor includes a comprehensive theming system that supports:

- Light and dark mode with automatic system preference detection
- Customizable color palettes and design tokens
- Consistent spacing, typography, and component variants

### Integration Patterns

Components are designed to work seamlessly with:
- Laravel's native Blade component system
- with laravel livewire

## Getting Started

### Installation
Use the Fluxtor CLI to add components to your Laravel project:

```bash
php artisan fluxtor:add button
php artisan fluxtor:add tags-input
php artisan fluxtor:add ...
```

> our handy `cli we do it best to do all setup needed for you for every component`

### Basic Usage
Once installed, components work like standard Blade components:

```blade
<x-ui.button variant="primary" size="lg">
    Click me
</x-ui.button>

<x-ui.card>
    <x-slot name="header">
        Card Title
    </x-slot>
    
    Card content goes here
</x-ui.card>
```

### Customization
Since components live in your codebase, you can modify them directly:

```blade
{{-- resources/views/components/ui/button.blade.php --}}
<button 
    {{ $attributes->merge([
        'class' => 'your-custom-classes ' . $baseClasses
    ]) }}
>
    {{ $slot }}
</button>
```



## Component Organization

fluxtor put all blade component inside `resources/views/ui/components`

we choose keeping all component under `ui` namespace

- we make component managment isolated for future updates
- that `ui` namespace gives the fealing of chunks in ui ....
- latestly we like how `shadcn/ui` adapt this pattern

```
resources/views/components/ui/
├── button/index.blade.php
├── card/index.blade.php
├── dropdown/
│   ├── item.blade.php
│   └── index.blade.php
│   └ ....
└── select/
    ├── item.blade.php
    └── index.blade.php
...
```

### Theming Consistency
Use the built-in theming system to maintain consistency across your application. Define custom design tokens in your Tailwind configuration and reference them in your components.

### Performance Considerations
- Components are rendered server-side for optimal performance
- Alpine.js provides minimal client-side JavaScript
- Tailwind's purging ensures minimal CSS bundle sizes
- Livewire integration minimizes JavaScript complexity

## Community and Support

Fluxtor is built by and for the TALL stack community. Components are battle-tested in real-world applications and continuously improved based on developer feedback.

### Contributing
Since you own the components in your codebase, you can contribute improvements back to the community by sharing your customizations and enhancements.

### Documentation
Each component includes comprehensive documentation with:
- Usage examples and code snippets
- Props and slot descriptions
- Customization guides
- Integration patterns

## Next Steps

- [Adding Dark Mode](/docs/dark-mode) - Implement system-wide dark mode support
- [Theming System](/docs/theming) - Customize colors, spacing, and design tokens
- [Component Reference](/docs/components) - Browse all available components
- [Needs Help ?](/docs/help) - Browse all available components