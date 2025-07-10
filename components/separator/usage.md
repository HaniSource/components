---
name: 'separator'
---

# Separator Component

## Introduction

The `separator` component provides a clean and accessible way to visually separate content sections. It supports both horizontal and vertical orientations, optional labels, and follows accessibility best practices. Perfect for dividing form sections, content areas, or creating visual breaks in your interface.

## Basic Usage

@blade
<x-demo class="w-full space-y-6">
    <div class="p-4 ">
        <x-ui.card size="xl" class="mx-auto">
            <x-ui.heading class="flex items-center justify-between mb-4" level="h3" size="sm">
                <span>Welcome to Fluxtor.</span>
                <a href="https://fluxtor.dev">
                    <x-ui.icon name="arrow-up-right" class="text-gray-800 dark:text-white size-4" />
                </a>
            </x-ui.heading>
            <p>
                Powered by the TALL stack, our components offer speed, elegance,
                and accessibility for modern web development. 
            </p>
        </x-ui.card>
        <x-ui.separator class="my-4" />
        <x-ui.card size="xl" class="mx-auto">
            <x-ui.heading class="flex items-center justify-between mb-4" level="h3" size="sm">
                <span>Welcome to Converge.</span>
                <a href="https://convergeghp.com">
                    <x-ui.icon name="arrow-up-right" class="text-gray-800 dark:text-white size-4" />
                </a>
            </x-ui.heading>
            <p>
                Powered by the TALL stack, our components offer speed, elegance,
                and accessibility for modern web development. 
            </p>
        </x-ui.card>
    </div>
</x-demo>
@endblade

```html
<x-ui.separator />
```

## Orientations

### Horizontal Separator (Default)

The default orientation creates a horizontal line to separate content vertically.

@blade
<x-demo class="w-full">
    <div class="max-w-md mx-auto space-y-4">
        <div class="text-center">
            <h4 class="font-medium">Above Content</h4>
            <p class="text-sm text-gray-600">Some content here</p>
        </div>
        
        <x-ui.separator />
        
        <div class="text-center">
            <h4 class="font-medium">Below Content</h4>
            <p class="text-sm text-gray-600">Some content here</p>
        </div>
    </div>
</x-demo>
@endblade

```html
<x-ui.separator />
<!-- or explicitly -->
<x-ui.separator :vertical="false" />
```

### Vertical Separator

Use vertical orientation to separate content horizontally.

@blade
<x-demo class="w-full">
    <div class="flex items-center justify-center space-x-4 py-8">
        <div class="text-center">
            <h4 class="font-medium">Left Content</h4>
            <p class="text-sm text-gray-600">Some content</p>
        </div>
        
        <x-ui.separator vertical class="h-16" />
        
        <div class="text-center">
            <h4 class="font-medium">Right Content</h4>
            <p class="text-sm text-gray-600">Some content</p>
        </div>
    </div>
</x-demo>
@endblade

```html
<x-ui.separator vertical />
<!-- or explicitly -->
<x-ui.separator :vertical="true" />
```

## Labeled Separators

Add labels to provide context for the separation.

### Horizontal with Label

@blade
<x-demo class="w-full">
    <div class="max-w-md mx-auto space-y-4">
        <div class="text-center">
            <h4 class="font-medium">Login Form</h4>
            <input type="email" placeholder="Email" class="w-full p-2 border rounded mt-2">
            <input type="password" placeholder="Password" class="w-full p-2 border rounded mt-2">
        </div>
        
        <x-ui.separator label="OR" />
        
        <div class="text-center">
            <button class="w-full p-2 bg-blue-500 text-white rounded">
                Continue with Google
            </button>
        </div>
    </div>
</x-demo>
@endblade

```html
<x-ui.separator label="OR" />
```

### Vertical with Label

@blade
<x-demo class="w-full">
    <div class="flex items-center justify-center space-x-6 py-8">
        <div class="text-center">
            <h4 class="font-medium">Option A</h4>
            <p class="text-sm text-gray-600">First choice</p>
            <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">
                Choose A
            </button>
        </div>
        
        <x-ui.separator vertical label="OR" class="h-24" />
        
        <div class="text-center">
            <h4 class="font-medium">Option B</h4>
            <p class="text-sm text-gray-600">Second choice</p>
            <button class="mt-2 px-4 py-2 bg-green-500 text-white rounded">
                Choose B
            </button>
        </div>
    </div>
</x-demo>
@endblade

```html
<x-ui.separator vertical label="OR" />
```

## Customization

### Custom Labels

Use any text as a label to provide meaningful context.

@blade
<x-demo class="w-full space-y-6">
    <div class="max-w-md mx-auto">
        <div class="space-y-4">
            <div class="text-center">
                <h4 class="font-medium">Personal Information</h4>
                <input type="text" placeholder="Name" class="w-full p-2 border rounded mt-2">
            </div>
            
            <x-ui.separator label="Contact Details" />
            
            <div class="text-center">
                <input type="email" placeholder="Email" class="w-full p-2 border rounded">
                <input type="tel" placeholder="Phone" class="w-full p-2 border rounded mt-2">
            </div>
            
            <x-ui.separator label="Preferences" />
            
            <div class="text-center">
                <label class="flex items-center">
                    <input type="checkbox" class="mr-2">
                    Subscribe to newsletter
                </label>
            </div>
        </div>
    </div>
</x-demo>
@endblade

```html
<x-ui.separator label="Contact Details" />
<x-ui.separator label="Preferences" />
<x-ui.separator label="Additional Options" />
```

### Styling and Classes

Apply custom classes to control spacing and appearance.

@blade
<x-demo class="w-full space-y-6">
    <div class="max-w-md mx-auto">
        <x-ui.separator label="Default" />
        <x-ui.separator label="Large Spacing"  />
        <div class="flex items-center justify-center gap-4 py-4">
            <span>Left</span>
            <x-ui.separator vertical class="h-8" />
            <span>Right</span>
        </div>
    </div>
</x-demo>
@endblade

```html
<!-- Custom spacing -->
<x-ui.separator class="my-8" />

<!-- Custom height for vertical -->
<x-ui.separator vertical class="h-12" />
```

## Accessibility

The component includes proper accessibility features:

- Uses `role="separator"` for screen readers
- Includes `aria-orientation` attribute
- Provides `aria-label` for labeled separators
- Decorative elements are marked with `aria-hidden="true"`

## Component Props

| Prop Name | Type | Default | Required | Description |
|-----------|------|---------|----------|-------------|
| `vertical` | boolean | `false` | No | Whether to display as vertical separator |
| `variant` | string | `null` | No | Visual variant (reserved for future use) |
| `label` | string | `null` | No | Optional label text to display |
| `class` | string | `''` | No | Additional CSS classes |

## Examples

### Basic Usage
```html
<!-- Simple horizontal separator -->
<x-ui.separator />

<!-- Vertical separator -->
<x-ui.separator vertical />

<!-- Labeled separator -->
<x-ui.separator label="OR" />

<!-- Vertical labeled separator -->
<x-ui.separator vertical label="OR" />
```

### With Custom Styling
```html
<!-- Custom spacing -->
<x-ui.separator class="my-8" />

<!-- Custom height for vertical -->
<x-ui.separator vertical class="h-16" />

<!-- Labeled with custom spacing -->
<x-ui.separator label="Continue" class="my-6" />
```