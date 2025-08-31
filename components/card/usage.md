---
name: card
---

## Introduction

The `Card` component is a **responsive**, **unstyled** container component designed for content encapsulation. It provides a clean foundation for building UI sections with consistent spacing, subtle borders, and seamless dark mode support.

## Installation
Use the [sheaf artisan command](/docs/guides/installation#content-component-management) to install the `card` component easily:

```bash
php artisan sheaf:install card
```

> Once installed, you can use the <x-ui.card /> component in any Blade view.

### Real-world Example
@blade
<x-demo>
    <div class="grid gap-4 md:grid-cols-2">
        <x-components::ui.card size="lg">
            <div class="flex items-center gap-3 mb-4">
                <x-components::ui.icon name="user" class="size-8 text-blue-500" />
                <div>
                    <h3 class="font-semibold">John Doe</h3>
                    <p class="text-sm text-gray-600">Software Engineer</p>
                </div>
            </div>
            <p class="text-sm">Building amazing web applications with the TALL stack.</p>
        </x-components::ui.card>
        <!--  -->
        <x-components::ui.card size="lg">
            <div class="text-center">
                <x-components::ui.icon name="chart-bar" class="size-12 text-green-500 mx-auto mb-4" />
                <h3 class="font-semibold mb-2">Analytics Dashboard</h3>
                <p class="text-sm text-gray-600">Track your application metrics in real-time.</p>
            </div>
        </x-components::ui.card>
    </div>
</x-demo>
@endblade


## Usage

@blade
<x-demo>
    <div class="w-full">
        <x-components::ui.card size="xl" class="mx-auto">
            <x-components::ui.heading class="flex items-center justify-between mt-0 mb-4 leading-0 " level="h3" size="sm">
                <span>Welcome to Sheaf UI.</span>
                <a href="https://sheaf.dev">
                    <x-components::ui.icon name="arrow-up-right" class="text-gray-800 dark:text-white size-4" />
                </a>
            </x-components::ui.heading>
            <p>
                Powered by the TALL stack, our components offer speed, </br> elegance, and accessibility for modern web development. 
            </p>
        </x-components::ui.card>
    </div>
</x-demo>
@endblade

```html
    <x-ui.card size="xl" class="mx-auto">
        <x-ui.heading class="flex items-center justify-between mb-4" level="h3" size="sm">
            <span>Welcome to Sheaf UI.</span>
            <a href="https://sheaf.dev">
                <x-ui.icon name="arrow-up-right" class="text-gray-800 dark:text-white size-4" />
            </a>
        </x-ui.heading>
        <p>
            Powered by the TALL stack, our components offer speed, elegance,
             and accessibility for modern web development. 
        </p>
    </x-components::ui.card>
```

### Card with Header and Footer

Structure your content with distinct header and footer sections for better organization and visual hierarchy.

@blade
<x-demo>
    <div class="w-full">
        <x-components::ui.card size="lg" class="mx-auto">
            <div class="flex items-center justify-between pb-4 border-b border-gray-200 dark:border-gray-700">
                <div class="flex items-center gap-3">
                    <x-components::ui.icon name="inbox" class="size-6 text-blue-500" />
                    <div>
                        <x-components::ui.heading level="h3" class="font-semibold text-gray-900 dark:text-white mt-0 mb-1">Messages</x-components::ui.heading>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-0">3 unread messages</p>
                    </div>
                </div>
            </div>
            <!-- Content -->
            <div class="py-4">
                <div class="space-y-3">
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900 dark:text-white mb-0 mt-0">Welcome to Sheaf UI</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mb-0 mt-0">2 minutes ago</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900 dark:text-white mb-0 mt-0">Component installed successfully</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mb-0 mt-0">5 minutes ago</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 bg-orange-500 rounded-full"></div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900 dark:text-white mb-0 mt-0">Update available</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mb-0 mt-0">1 hour ago</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <div class="flex items-center justify-between pt-4 border-t border-gray-200 dark:border-gray-700">
                <button class="text-sm text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200">
                    Mark all as read
                </button>
                <button class="text-sm text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 font-medium">
                    View all
                </button>
            </div>
        </x-components::ui.card>
    </div>
</x-demo>
@endblade

```html
<x-ui.card size="lg">
    <!-- Header -->
    <div class="flex items-center justify-between pb-4 border-b border-gray-200 dark:border-gray-700">
        <div class="flex items-center gap-3">
            <x-ui.icon name="inbox" class="size-6 text-blue-500" />
            <div>
                <x-ui.heading level="h3" class="font-semibold text-gray-900 dark:text-white">Messages</x-ui.heading>
                <p class="text-sm text-gray-500 dark:text-gray-400">3 unread messages</p>
            </div>
        </div>
    </div>
    <!-- Content -->
    <div class="py-4">
        <div class="space-y-3">
            <div class="flex items-center gap-3">
                <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-900 dark:text-white">Welcome to Sheaf UI</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">2 minutes ago</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-900 dark:text-white">Component installed successfully</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">5 minutes ago</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <div class="w-2 h-2 bg-orange-500 rounded-full"></div>
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-900 dark:text-white">Update available</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">1 hour ago</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <div class="flex items-center justify-between pt-4 border-t border-gray-200 dark:border-gray-700">
        <button class="text-sm text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200">
            Mark all as read
        </button>
        <button class="text-sm text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 font-medium">
            View all
        </button>
    </div>
</x-ui.card>
```

## Customization

#### Size
The `size` prop controls the max width of the card and helps enforce layout constraints in a flexible way. Default is `md`.

@blade
<x-demo>
    <div class="w-full space-y-2">
        <x-components::ui.card size="xs">Extra Small Card</x-components::ui.card>
        <x-components::ui.card size="sm">Small Card</x-components::ui.card>
        <x-components::ui.card size="md">Medium Card</x-components::ui.card>
        <x-components::ui.card size="lg">Large Card</x-components::ui.card>
        <x-components::ui.card size="xl">Extra Large Card</x-components::ui.card>
    </div>
</x-demo>
@endblade

```html
<x-ui.card size="xs">Extra Small Card</x-ui.card>
<x-ui.card size="sm">Small Card</x-ui.card>
<x-ui.card size="md">Medium Card</x-ui.card>
<x-ui.card size="lg">Large Card</x-ui.card>
<x-ui.card size="xl">Extra Large Card</x-ui.card>
```

## Component Props

| Prop Name | Type                 | Default | Required | Description                                                                                            |
| --------- | ---------------------| ------- | -------- | ------------------------------------------------------------------------------------------------------ |
| `slot`    | string or components | `''`    | No       | Content to display within the card. Can include headings, text, forms, buttons, and other components.  |
| `size`    | string               | `md`    | No       | Sets max-width constraint (`xs`, `sm`, `md`, `lg`, `xl`)                                               |
| `class`   | string               | `''`    | No       | Additional Tailwind classes applied to the card container                                              |
