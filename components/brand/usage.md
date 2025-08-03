---
name: brand
---

## Introduction

The `Brand` component is a flexible branding element designed to display your company logo and name in a consistent, clickable format. It's perfect for headers, navigation bars, footers, and anywhere you need to showcase your brand identity with proper link functionality.

## Installation

Use the [fluxtor artisan command](/docs/cli-reference#fluxtorinstall) to install the `brand` component easily:

```bash
php artisan fluxtor:install brand
```

> Once installed, you can use the <x-ui.brand /> component in any Blade view.

## Usage

### Basic Brand with Logo URL

Display your brand using a logo image URL and company name.

@blade
<x-demo>
    <x-components::ui.brand 
        href="#" 
        name="Fluxtor" 
        alt="Fluxtor" 
        logo="/fluxtor-logo.webp" 
        logoClass="rounded-full overflow-hidden"
    />
</x-demo>
@endblade

```html
<x-ui.brand 
    href="/" 
    logo="/fluxtor-logo.webp" 
    name="Your Company" 
    alt="Your Company" 
    logoClass="rounded-full overflow-hidden"
/>
```

### Logo Only

Create a minimal brand display using only the logo without text.

@blade
<x-demo>
    <x-components::ui.brand 
        href="#" 
        logo="/fluxtor-logo.webp" 
        logoClass="rounded-full overflow-hidden"
        alt="Fluxtor" 
    />
</x-demo>
@endblade

```html
<x-ui.brand 
    href="/" 
    logo="/fluxtor-logo.webp" 
    logoClass="rounded-full overflow-hidden"  
    alt="Fluxtor" 
/>
```

### Text Only Brand

Display your brand using only text, perfect for text-based logos or minimalist designs.

@blade
<x-demo>
    <x-components::ui.brand 
        href="#" 
        name="TechCorp" 
    />
</x-demo>
@endblade

```html
<x-ui.brand 
    href="/" 
    name="Your Company Name" 
/>
```

### Custom Logo Content

Use the logo slot to include custom SVG content or more complex logo structures.

@blade
<x-demo>
    <div class="w-full px-6 py-3 bg-gray-50 dark:bg-neutral-950 rounded-lg">
        <x-components::ui.brand href="#" name="InnovateLab">
            <x-slot:logo>
                <div class="h-8 w-8 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                    <svg class="h-5 w-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                </div>
            </x-slot:logo>
        </x-components::ui.brand>
    </div>
</x-demo>
@endblade

```html
<x-ui.brand href="/" name="Your Company">
    <x-slot:logo>
        <div class="h-8 w-8 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
            <svg class="h-5 w-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
            </svg>
        </div>
    </x-slot:logo>
</x-ui.brand>
```

### External Link

Configure the brand to open in a new tab when linking to external sites.

@blade
<x-demo>
    <div class="w-full px-6 py-3 bg-gray-50 dark:bg-neutral-950 rounded-lg">
        <x-components::ui.brand 
            href="https://example.com" 
            target="_blank"
            name="External Site" 
        />
        <p class="text-xs text-gray-500 mt-2 text-start">This link opens in a new tab</p>
    </div>
</x-demo>
@endblade

```html
<x-ui.brand 
    href="https://external-site.com" 
    target="_blank"
    logo="https://external-site.com/logo.svg" 
    name="External Site" 
    alt="External Site" 
/>
```

### Navigation Header Example

A practical example showing the brand component in a typical navigation header.

@blade
<x-demo>
    <div class="w-full">
        <header class="bg-white dark:bg-neutral-950 shadow-sm border-b border-gray-200 dark:border-gray-700">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <x-components::ui.brand 
                        href="#" 
                        name="Dashboard"
                    >
                        <x-slot:logo>
                            <div class="h-8 w-8 bg-indigo-600 rounded-lg flex items-center justify-center">
                                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                        </x-slot:logo>
                    </x-components::ui.brand>
                    
                    <nav class="hidden md:flex space-x-8">
                        <a href="#" class="text-gray-500 hover:text-gray-700 px-3 py-2 text-sm font-medium">Features</a>
                        <a href="#" class="text-gray-500 hover:text-gray-700 px-3 py-2 text-sm font-medium">Pricing</a>
                        <a href="#" class="text-gray-500 hover:text-gray-700 px-3 py-2 text-sm font-medium">About</a>
                    </nav>
                    
                    <x-components::ui.button size="sm">Get Started</x-components::ui.button>
                </div>
            </div>
        </header>
    </div>
</x-demo>
@endblade

```html
<header class="bg-white dark:bg-neutral-950 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <x-ui.brand href="/" name="Your App">
                <x-slot:logo>
                    <div class="h-8 w-8 bg-indigo-600 rounded-lg flex items-center justify-center">
                        <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                </x-slot:logo>
            </x-ui.brand>
            
            <!-- Navigation items -->
            <nav class="hidden md:flex space-x-8">
                <a href="#" class="text-gray-500 hover:text-gray-700">Features</a>
                <a href="#" class="text-gray-500 hover:text-gray-700">Pricing</a>
            </nav>
        </div>
    </div>
</header>
```

### Footer Brand Example

Using the brand component in a footer context with custom styling.

@blade
<x-demo>
    <div class="w-full">
        <footer class="bg-neutral-950 text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                    <x-components::ui.brand 
                        href="#" 
                        name="Company Inc."
                        class="mb-4 md:mb-0"
                    >
                        <x-slot:logo>
                            <div class="h-8 w-8 bg-white rounded-full flex items-center justify-center">
                                <span class="text-gray-900 font-bold text-sm">YC</span>
                            </div>
                        </x-slot:logo>
                    </x-components::ui.brand>
                    
                    <div class="flex flex-col md:flex-row gap-4 text-sm text-gray-400">
                        <a href="#" class="hover:text-white">Privacy Policy</a>
                        <a href="#" class="hover:text-white">Terms of Service</a>
                        <a href="#" class="hover:text-white">Contact</a>
                    </div>
                </div>
                
                <div class="mt-8 pt-8 border-t border-gray-700 text-center text-sm text-gray-400">
                    © 2024 Company Inc. All rights reserved.
                </div>
            </div>
        </footer>
    </div>
</x-demo>
@endblade

```html
<footer class="bg-neutral-950 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
            <x-ui.brand 
                href="/" 
                name="Your Company"
                class="mb-4 md:mb-0"
            >
                <x-slot:logo>
                    <div class="h-8 w-8 bg-white rounded-full flex items-center justify-center">
                        <span class="text-gray-900 font-bold text-sm">YC</span>
                    </div>
                </x-slot:logo>
            </x-ui.brand>
            
            <div class="flex gap-4 text-sm text-gray-400">
                <a href="#" class="hover:text-white">Privacy Policy</a>
                <a href="#" class="hover:text-white">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
```

## Component Props Reference

### Brand Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `href` | `string` | `'#'` | The URL the brand link should navigate to |
| `logo` | `string\|null` | `null` | Image URL for the logo (use slot for custom content) |
| `name` | `string` | `''` | Brand name text to display alongside the logo |
| `logoClass` | `string` | `''` | Logo wrapper styles |
| `alt` | `string` | `''` | Alt text for the logo image (accessibility) |
| `target` | `string` | `'_self'` | Link target: `'_self'`, `'_blank'`, `'_parent'`, `'_top'` |

### Slot Reference

| Slot | Required | Description |
|------|----------|-------------|
| `logo` | No | Custom logo content (overrides the `logo` prop) |
