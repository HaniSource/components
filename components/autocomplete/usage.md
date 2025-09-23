---
name: autocomplete
---

## Introduction

The `Autocomplete` component is a **responsive**, **accessible** search input component with dropdown suggestions. It provides real-time filtering, keyboard navigation, and seamless integration with Livewire for dynamic data binding.

## Installation
Use the [sheaf artisan command](/docs/guides/cli-installation#content-component-management) to install the `autocomplete` component easily:

```bash
php artisan sheaf:install autocomplete
```

> Once installed, you can use the `<x-ui.autocomplete />` component in any Blade view.

## Usage
@blade
<x-demo>
    <div class="w-full max-w-3xs mx-auto">
        <x-ui.autocomplete 
            label="Search Countries" 
            placeholder="Type to search..."
            leftIcon="map-pin"
            >
                <x-ui.autocomplete.item>United States</x-ui.autocomplete.item>
                <x-ui.autocomplete.item>United Kingdom</x-ui.autocomplete.item>
                <x-ui.autocomplete.item>Canada</x-ui.autocomplete.item>
                <x-ui.autocomplete.item>Australia</x-ui.autocomplete.item>
                <x-ui.autocomplete.item>Germany</x-ui.autocomplete.item>
                <x-ui.autocomplete.item>France</x-ui.autocomplete.item>
        </x-ui.autocomplete>
    </div>
</x-demo>
@endblade

```html
<x-ui.autocomplete 
    label="Search Countries" 
    placeholder="Type to search..."
    leftIcon="map-pin"
    >
        <x-ui.autocomplete.item>United States</x-ui.autocomplete.item>
        <x-ui.autocomplete.item>United Kingdom</x-ui.autocomplete.item>
        <x-ui.autocomplete.item>Canada</x-ui.autocomplete.item>
        <x-ui.autocomplete.item>Australia</x-ui.autocomplete.item>
        <x-ui.autocomplete.item>Germany</x-ui.autocomplete.item>
        <x-ui.autocomplete.item>France</x-ui.autocomplete.item>
</x-ui.autocomplete>
```

### Bind To Livewire

To use with Livewire you only need to use `wire:model="property"` to bind your input state:

```html
<x-ui.autocomplete 
    label="Search Products" 
    wire:model="product"
    placeholder="Find products..." 
    description="Search through our product catalog"
    >
        <x-ui.autocomplete.item>iPhone 15 Pro</x-ui.autocomplete.item>
        <x-ui.autocomplete.item>MacBook Air M2</x-ui.autocomplete.item>
        <x-ui.autocomplete.item>AirPods Pro</x-ui.autocomplete.item>
        <x-ui.autocomplete.item>iPad Pro</x-ui.autocomplete.item>
        <x-ui.autocomplete.item>Apple Watch Series 9</x-ui.autocomplete.item>
</x-ui.autocomplete>
```

### Using it within Blade & Alpine

You can use it outside Livewire with just Alpine (and Blade):

```html
<x-ui.autocomplete 
    label="Search Products" 
    x-model="product"
    placeholder="Find products..." 
    description="Search through our product catalog"
    >
        <x-ui.autocomplete.item>iPhone 15 Pro</x-ui.autocomplete.item>
        <x-ui.autocomplete.item>MacBook Air M2</x-ui.autocomplete.item>
        <x-ui.autocomplete.item>AirPods Pro</x-ui.autocomplete.item>
        <x-ui.autocomplete.item>iPad Pro</x-ui.autocomplete.item>
        <x-ui.autocomplete.item>Apple Watch Series 9</x-ui.autocomplete.item>
</x-ui.autocomplete>
```

### Autocomplete with Icons

Enhance the autocomplete with leading and trailing icons for better visual communication.

@blade
<x-demo>
    <div class="w-full max-w-3xs mx-auto">
        <x-ui.autocomplete 
            placeholder="Find your favorite tech..."
            leftIcon="code-bracket"
            rightIcon="magnifying-glass"
           >
                <x-ui.autocomplete.item>Laravel</x-ui.autocomplete.item>
                <x-ui.autocomplete.item>Vue.js</x-ui.autocomplete.item>
                <x-ui.autocomplete.item>React</x-ui.autocomplete.item>
                <x-ui.autocomplete.item>Tailwind CSS</x-ui.autocomplete.item>
                <x-ui.autocomplete.item>Alpine.js</x-ui.autocomplete.item>
                <x-ui.autocomplete.item>Livewire</x-ui.autocomplete.item>
        </x-ui.autocomplete>
    </div>
</x-demo>
@endblade

```html
<x-ui.autocomplete 
    label="Search Technologies" 
    placeholder="Find your favorite tech..."
    leftIcon="code-bracket"
    rightIcon="magnifying-glass"
    wire:model="selectedTech">
        <x-ui.autocomplete.item>Laravel</x-ui.autocomplete.item>
        <x-ui.autocomplete.item>Vue.js</x-ui.autocomplete.item>
        <x-ui.autocomplete.item>React</x-ui.autocomplete.item>
        <x-ui.autocomplete.item>Tailwind CSS</x-ui.autocomplete.item>
        <x-ui.autocomplete.item>Alpine.js</x-ui.autocomplete.item>
        <x-ui.autocomplete.item>Livewire</x-ui.autocomplete.item>
</x-ui.autocomplete>
```

### Clearable Autocomplete

Add a clear button to easily reset the input value.

@blade
<x-demo>
    <div class="w-full max-w-3xs mx-auto">
        <x-ui.autocomplete 
            placeholder="Type city name..."
            icon="map-pin"
            clearable
            description="Search for cities worldwide"
            >
                <x-ui.autocomplete.item>New York</x-ui.autocomplete.item>
                <x-ui.autocomplete.item>Los Angeles</x-ui.autocomplete.item>
                <x-ui.autocomplete.item>Chicago</x-ui.autocomplete.item>
                <x-ui.autocomplete.item>Houston</x-ui.autocomplete.item>
                <x-ui.autocomplete.item>Phoenix</x-ui.autocomplete.item>
                <x-ui.autocomplete.item>Philadelphia</x-ui.autocomplete.item>
        </x-ui.autocomplete>
    </div>
</x-demo>
@endblade

```html
<x-ui.autocomplete 
    label="Search Cities" 
    placeholder="Type city name..."
    icon="map-pin"
    clearable="true"
    description="Search for cities worldwide"
    wire:model="selectedCity">
        <x-ui.autocomplete.item>New York</x-ui.autocomplete.item>
        <x-ui.autocomplete.item>Los Angeles</x-ui.autocomplete.item>
        <x-ui.autocomplete.item>Chicago</x-ui.autocomplete.item>
        <x-ui.autocomplete.item>Houston</x-ui.autocomplete.item>
        <x-ui.autocomplete.item>Phoenix</x-ui.autocomplete.item>
        <x-ui.autocomplete.item>Philadelphia</x-ui.autocomplete.item>
</x-ui.autocomplete>
```

### Validation States

Show different states for validation feedback.

@blade
<x-demo>
    <div class="w-full max-w-3xs mx-auto space-y-4">
        <x-ui.autocomplete 
            label="Invalid Selection" 
            placeholder="Search..."
            icon="exclamation-circle"
            invalid="true"
            description="Please select a valid option"
            >
                <x-ui.autocomplete.item>Option 1</x-ui.autocomplete.item>
                <x-ui.autocomplete.item>Option 2</x-ui.autocomplete.item>
        </x-ui.autocomplete>
    </div>
</x-demo>
@endblade

```html
<!-- Invalid state -->
<x-ui.autocomplete 
    label="Invalid Selection" 
    placeholder="Search..."
    icon="exclamation-circle"
    invalid="true"
    description="Please select a valid option"
    >
        <x-ui.autocomplete.item>Option 1</x-ui.autocomplete.item>
        <x-ui.autocomplete.item>Option 2</x-ui.autocomplete.item>
</x-ui.autocomplete>
```

### Disabled and Readonly States

@blade
<x-demo>
    <div class="w-full max-w-3xs mx-auto space-y-4">
        <x-ui.autocomplete 
            placeholder="This is disabled..."
            :disabled="true"
            >
                <x-ui.autocomplete.item>Option 1</x-ui.autocomplete.item>
                <x-ui.autocomplete.item>Option 2</x-ui.autocomplete.item>
        </x-ui.autocomplete>
        <x-ui.autocomplete 
            label="Readonly Autocomplete" 
            placeholder="This is readonly..."
            readonly
            >
                <x-ui.autocomplete.item>Option 1</x-ui.autocomplete.item>
                <x-ui.autocomplete.item>Option 2</x-ui.autocomplete.item>
        </x-ui.autocomplete>
    </div>
</x-demo>
@endblade

```html
<!-- Disabled -->
<x-ui.autocomplete 
    label="Disabled Autocomplete" 
    placeholder="This is disabled..."
    disabled="true"
    wire:model="disabledValue">
        <x-ui.autocomplete.item>Option 1</x-ui.autocomplete.item>
        <x-ui.autocomplete.item>Option 2</x-ui.autocomplete.item>
</x-ui.autocomplete>

<!-- Readonly -->
<x-ui.autocomplete 
    label="Readonly Autocomplete" 
    placeholder="This is readonly..."
    readonly
    wire:model="readonlyValue">
        <x-ui.autocomplete.item>Option 1</x-ui.autocomplete.item>
        <x-ui.autocomplete.item>Option 2</x-ui.autocomplete.item>
</x-ui.autocomplete>
```

## Customization

### Custom Input Classes

```html
<x-ui.autocomplete 
    label="Custom Styled" 
    inputClasses="bg-blue-50 border-blue-200 focus:border-blue-500"
    placeholder="Search..."
    wire:model="customValue">
        <x-ui.autocomplete.item>Option 1</x-ui.autocomplete.item>
        <x-ui.autocomplete.item>Option 2</x-ui.autocomplete.item>
</x-ui.autocomplete>
```


## Component Props

| Prop Name      | Type    | Default       | Required | Description                                                                  |
| -------------- | ------- | ------------- | -------- | ---------------------------------------------------------------------------- |
| `label`        | string  | `''`          | No       | Label text displayed above the input                                         |
| `name`         | string  | `wire:model`  | No       | Name attribute for the input (auto-detected from wire:model)                |
| `type`         | string  | `text`        | No       | Input type attribute                                                         |
| `description`  | string  | `''`          | No       | Helper text displayed below the input                                        |
| `placeholder`  | string  | `Search...`   | No       | Placeholder text for the input                                               |
| `variant`      | string  | `default`     | No       | Visual variant (currently only `default` supported)                         |
| `disabled`     | boolean | `false`       | No       | Whether the input is disabled                                                |
| `readonly`     | boolean | `false`       | No       | Whether the input is readonly                                                |
| `invalid`      | boolean | `false`       | No       | Whether to show invalid/error state styling                                  |
| `leftIcon`         | string  | `''`          | No       | left side of the icon name                                                            |
| `rightIcon` | string  | `''`          | No       | Right side of the icon name                                                           |
| `clearable`    | boolean | `false`       | No       | Whether to show a clear button                                               |
| `inputClasses`   | string  | `''`          | No       | Additional CSS classes for the input element                                 |
| `slot`         | mixed   | `''`          | Yes      | Dropdown items using `<div data-slot="autocomplete-item">` elements         |
