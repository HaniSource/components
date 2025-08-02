---
name: 'input'
---
<style>
    .fluxtor-component input{
        max-width : 40rem
    }
</style>

# Input Component

## Introduction

The `input` component provides a powerful and flexible foundation for text input fields. It features customizable prefixes and suffixes, icon support, input actions (copy, clear, reveal), validation states, and full accessibility support. Perfect for forms, search fields, and any text input scenario.

## Basic Usage

@blade
<x-demo x-data="{ value: 'Hello World' }">
    <x-ui.input 
        class="max-w-sm mx-auto"
        x-model="value" 
        placeholder="Enter text..."
    />
</x-demo>
@endblade

```html
<x-ui.input 
    wire:model="name"  
    placeholder="Enter your name..."
/>
```

### Bind To Livewire

To use with Livewire you only need to use `wire:model="property"` to bind your input state:

```html
<x-ui.input 
    wire:model="email" 
    placeholder="Enter email..."
    type="email"
/>
```

### Using it within Blade & Alpine

You can use it outside Livewire with just Alpine (and Blade):

```html
<div x-data="{ email: '' }">
    <x-ui.input 
        x-model="email" 
        placeholder="Enter email..."
        type="email"
    />
</div>
```

## Input Types

### Basic Text Input

@blade
<x-demo x-data="{ text: '' }">
    <x-ui.input 
        x-model="text" 
        class="max-w-sm mx-auto"
        placeholder="Enter text..."
        type="text"
    />
</x-demo>
@endblade

```html
<x-ui.input 
    wire:model="text" 
    placeholder="Enter text..."
    type="text"
/>
```

### Email Input

@blade
<x-demo x-data="{ email: '' }">
    <x-ui.input 
        x-model="email" 
        class="max-w-sm mx-auto"
        placeholder="Enter email..."
        type="email"
    />
</x-demo>
@endblade

```html
<x-ui.input 
    wire:model="email" 
    placeholder="Enter email..."
    type="email"
/>
```

### Password Input

@blade
<x-demo x-data="{ password: '' }">
    <x-ui.input 
        x-model="password" 
        class="max-w-sm mx-auto"
        placeholder="Enter password..."
        type="password"
    />
</x-demo>
@endblade

```html
<x-ui.input 
    wire:model="password" 
    placeholder="Enter password..."
    type="password"
/>
```

### Number Input

@blade
<x-demo x-data="{ number: '' }">
    <x-ui.input 
        x-model="number" 
        class="max-w-sm mx-auto"
        placeholder="Enter number..."
        type="number"
    />
</x-demo>
@endblade

```html
<x-ui.input 
    wire:model="age" 
    placeholder="Enter age..."
    type="number"
/>
```

## Prefixes and Suffixes

### Text Prefix and Suffix

@blade
<x-demo x-data="{ url: 'charrafi' }">
    <x-ui.input 
        x-model="url" 
        class="max-w-sm mx-auto"
        placeholder="Enter your site name"
    >
        <x-slot name="prefix">
            https://
        </x-slot>
        <x-slot name="suffix">
            .com
        </x-slot>
    </x-ui.input>
</x-demo>
@endblade

```html
<x-ui.input 
    wire:model="url" 
    placeholder="Enter your site name"
>
    <x-slot name="prefix">
        https://
    </x-slot>
    <x-slot name="suffix">
        .com
    </x-slot>
</x-ui.input>
```

### Icon Prefix and Suffix

@blade
<x-demo x-data="{ search: '' }">
    <x-ui.input 
        x-model="search" 
        placeholder="Search..."
        class="max-w-sm mx-auto"
        prefixIcon="magnifying-glass"
        suffixIcon="document-duplicate"
    />
</x-demo>
@endblade

```html
<x-ui.input 
    wire:model="search" 
    placeholder="Search..."
    prefixIcon="magnifying-glass"
    suffixIcon="document-duplicate"
/>
```


## Input Actions

### Copyable Input

@blade
<x-demo x-data="{ apiKey: 'sk-1234567890abcdef' }">
    <x-ui.input 
        x-model="apiKey" 
        placeholder="API Key"
        class="max-w-sm mx-auto"
        copyable
        readonly
    />
</x-demo>
@endblade

```html
<x-ui.input 
    wire:model="apiKey" 
    placeholder="API Key"
    copyable
    readonly
/>
```

### Clearable Input

@blade
<x-demo x-data="{ search: 'Clear me!' }">
    <x-ui.input 
        x-model="search" 
        placeholder="Search..."
        class="max-w-sm mx-auto"
        clearable
    />
</x-demo>
@endblade

```html
<x-ui.input 
    wire:model="search" 
    placeholder="Search..."
    clearable
/>
```

### Revealable Password

@blade
<x-demo x-data="{ password: 'secret123' }">
    <x-ui.input 
        x-model="password" 
        placeholder="Password"
        type="password"
        class="max-w-sm mx-auto"
        revealable
    />
</x-demo>
@endblade

```html
<x-ui.input 
    wire:model="password" 
    placeholder="Password"
    type="password"
    revealable
/>
```

### Multiple Actions

@blade
<x-demo x-data="{ value: 'Multiple actions!' }">
    <x-ui.input 
        x-model="value" 
        class="max-w-sm mx-auto"
        placeholder="Try all actions..."
        copyable
        clearable
        revealable
    />
</x-demo>
@endblade

```html
<x-ui.input 
    wire:model="value" 
    placeholder="Try all actions..."
    copyable
    clearable
    revealable
/>
```

## Form Structure Components

### Field Component

The `field` component provides proper spacing and structure for form inputs with labels, descriptions, and errors.
read more about [field component](/field)
@blade
<x-demo>
    <x-ui.field required
                class="max-w-sm mx-auto"
    >
        <x-ui.label>Full Name</x-ui.label>
        <x-ui.description>Your first and last name as it appears on official documents</x-ui.description>
        <x-ui.input 
            wire:model="name" 
            placeholder="John Doe"
            clearable
        />
    </x-ui.field>
</x-demo>
@endblade

```html
<x-ui.field required>
    <x-ui.label>Full Name</x-ui.label>
    <x-ui.description>Your first and last name as it appears on official documents</x-ui.description>
    <x-ui.input 
        wire:model="name" 
        placeholder="John Doe"
        clearable
    />
    <x-ui.error name="name" />
</x-ui.field>
```

### Label Component

read more about [label component](/components/label)

```html
<x-ui.label>Email Address</x-ui.label>
<!-- or -->
<x-ui.label text="Email Address" />
```

### Description Component
read more about [description component](/components/error)

intent to be used with inputs 
@blade
<x-demo>
    <x-ui.description>
        This information will be displayed publicly so be careful what you share.
    </x-ui.description>
</x-demo>
@endblade

```html
<x-ui.description>
    This information will be displayed publicly so be careful what you share.
</x-ui.description>
```

### Error Component

read more about [error component](/components/error)

```html
<x-ui.error name="email" />
<!-- or with manual messages -->
<x-ui.error messages="['Custom error message']" />
```

## Fieldset Component

Group related form fields together with a fieldset. read more about [fieldset component](/components/fieldset)

@blade
<x-demo>
    <x-ui.fieldset label="Account Information">
        <x-ui.field required>
            <x-ui.label>Email</x-ui.label>
            <x-ui.input 
                wire:model="email" 
                type="email"
                placeholder="john@example.com"
            />
        </x-ui.field>
        <!--  -->
        <x-ui.field required>
            <x-ui.label>Password</x-ui.label>
            <x-ui.input 
                wire:model="password" 
                type="password"
                placeholder="••••••••"
                revealable
            />
        </x-ui.field>
    </x-ui.fieldset>
</x-demo>
@endblade

```html
<x-ui.fieldset label="Account Information">
    <x-ui.field required>
        <x-ui.label>Email</x-ui.label>
        <x-ui.input 
            wire:model="email" 
            type="email"
            placeholder="john@example.com"
        />
        <x-ui.error name="email" />
    </x-ui.field>

    <x-ui.field required>
        <x-ui.label>Password</x-ui.label>
        <x-ui.input 
            wire:model="password" 
            type="password"
            placeholder="••••••••"
            revealable
        />
        <x-ui.error name="password" />
    </x-ui.field>
</x-ui.fieldset>
```

## Complete Form Example

@blade
<x-demo>
    <form class="space-y-6">
        <x-ui.fieldset label="Personal Information">
            <x-ui.field required>
                <x-ui.label>Full Name</x-ui.label>
                <x-ui.description>Your first and last name</x-ui.description>
                <x-ui.input 
                    wire:model="name"
                    placeholder="John Doe"
                    clearable
                />
            </x-ui.field>
            <!--  -->
            <x-ui.field required>
                <x-ui.label>Email Address</x-ui.label>
                <x-ui.input 
                    wire:model="email"
                    type="email"
                    placeholder="john@example.com"
                />
            </x-ui.field>
            <!--  -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <x-ui.field required>
                    <x-ui.label>Password</x-ui.label>
                    <x-ui.input 
                        wire:model="password"
                        type="password"
                        placeholder="••••••••"
                        revealable
                    />
                </x-ui.field>
                <!--  -->
                <x-ui.field required>
                    <x-ui.label>Confirm Password</x-ui.label>
                    <x-ui.input 
                        wire:model="password_confirmation"
                        type="password"
                        placeholder="••••••••"
                        revealable
                    />
                </x-ui.field>
            </div>
        </x-ui.fieldset>
        <!--  -->
        <x-ui.fieldset label="Professional Details">
            <x-ui.field>
                <x-ui.label>Website</x-ui.label>
                <x-ui.description>Your personal or company website</x-ui.description>
                <x-ui.input 
                    wire:model="website"
                    type="url"
                    placeholder="charrafi"
                    copyable
                >
                    <x-slot name="prefix">https://</x-slot>
                    <x-slot name="suffix">.com</x-slot>
                </x-ui.input>
            </x-ui.field>
            <!--  -->
            <x-ui.field>
                <x-ui.label>Company</x-ui.label>
                <x-ui.input 
                    wire:model="company"
                    placeholder="Acme Inc."
                    clearable
                />
            </x-ui.field>
        </x-ui.fieldset>
    </form>
</x-demo>
@endblade

```html
<form class="space-y-6">
    <x-ui.fieldset label="Personal Information">
        <x-ui.field required>
            <x-ui.label>Full Name</x-ui.label>
            <x-ui.description>Your first and last name</x-ui.description>
            <x-ui.input 
                wire:model="name"
                placeholder="John Doe"
                clearable
            />
            <x-ui.error name="name" />
        </x-ui.field>

        <x-ui.field required>
            <x-ui.label>Email Address</x-ui.label>
            <x-ui.input 
                wire:model="email"
                type="email"
                placeholder="john@example.com"
            />
            <x-ui.error name="email" />
        </x-ui.field>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <x-ui.field required>
                <x-ui.label>Password</x-ui.label>
                <x-ui.input 
                    wire:model="password"
                    type="password"
                    placeholder="••••••••"
                    revealable
                />
                <x-ui.error name="password" />
            </x-ui.field>

            <x-ui.field required>
                <x-ui.label>Confirm Password</x-ui.label>
                <x-ui.input 
                    wire:model="password_confirmation"
                    type="password"
                    placeholder="••••••••"
                    revealable
                />
                <x-ui.error name="password_confirmation" />
            </x-ui.field>
        </div>
    </x-ui.fieldset>

    <x-ui.fieldset label="Professional Details">
        <x-ui.field>
            <x-ui.label>Website</x-ui.label>
            <x-ui.description>Your personal or company website</x-ui.description>
            <x-ui.input 
                wire:model="website"
                type="url"
                placeholder="charrafi"
                copyable
            >
                <x-slot name="prefix">https://</x-slot>
                <x-slot name="suffix">.com</x-slot>
            </x-ui.input>
            <x-ui.error name="website" />
        </x-ui.field>

        <x-ui.field>
            <x-ui.label>Company</x-ui.label>
            <x-ui.input 
                wire:model="company"
                placeholder="Acme Inc."
                clearable
            />
            <x-ui.error name="company" />
        </x-ui.field>
    </x-ui.fieldset>
</form>
```

## Validation States

### Invalid State

When validation fails, the input automatically shows error styling.

@blade
<x-demo>
    <x-ui.field
        class="max-w-sm mx-auto"
    >
        <x-ui.label>Email</x-ui.label>
        <x-ui.input 
            wire:model="email"
            type="email"
            placeholder="Enter email..."
            invalid
        />
        <!-- <x-ui.error messages="['Please enter a valid email address']" /> -->
    </x-ui.field>
</x-demo>
@endblade

```html
<x-ui.field>
    <x-ui.label>Email</x-ui.label>
    <x-ui.input 
        wire:model="email"
        type="email"
        placeholder="Enter email..."
    />
    <x-ui.error name="email" />
</x-ui.field>
```

### Disabled State

@blade
<x-demo>
    <x-ui.field 
        disabled
        class="max-w-sm mx-auto"
    >
        <x-ui.label>Disabled Input</x-ui.label>
        <x-ui.description>This field is currently disabled</x-ui.description>
        <x-ui.input 
            wire:model="disabled"
            placeholder="Cannot edit this"
            disabled
        />
    </x-ui.field>
</x-demo>
@endblade

```html
<x-ui.field disabled>
    <x-ui.label>Disabled Input</x-ui.label>
    <x-ui.description>This field is currently disabled</x-ui.description>
    <x-ui.input 
        wire:model="disabled"
        placeholder="Cannot edit this"
        disabled
    />
</x-ui.field>
```

## Component Props

### Input Component Props

| Prop Name | Type | Default | Required | Description |
|-----------|------|---------|----------|-------------|
| `wire:model` | string | - | Yes | Livewire property to bind to |
| `name` | string | - | No | Input name attribute |
| `type` | string | `'text'` | No | Input type (text, email, password, etc.) |
| `placeholder` | string | - | No | Placeholder text |
| `disabled` | boolean | `false` | No | Whether input is disabled |
| `readonly` | boolean | `false` | No | Whether input is readonly |
| `invalid` | boolean | `false` | No | Whether input has validation errors |
| `prefix` | slot | - | No | Content to show before input |
| `suffix` | slot | - | No | Content to show after input |
| `prefixIcon` | string | - | No | Icon name to show as prefix |
| `suffixIcon` | string | - | No | Icon name to show as suffix |
| `copyable` | boolean | `false` | No | Add copy to clipboard button |
| `clearable` | boolean | `false` | No | Add clear input button |
| `revealable` | boolean | `false` | No | Add password reveal toggle |
| `autocomplete` | string | - | No | HTML autocomplete attribute |
| `class` | string | `''` | No | Additional CSS classes |

### Field Component Props

| Prop Name | Type | Default | Required | Description |
|-----------|------|---------|----------|-------------|
| `required` | boolean | `false` | No | Whether field is required |
| `disabled` | boolean | `false` | No | Whether field is disabled |

### Label Component Props

| Prop Name | Type | Default | Required | Description |
|-----------|------|---------|----------|-------------|
| `text` | string | - | No | Label text (alternative to slot) |
| `required` | boolean | `false` | No | Whether to show required indicator |

### Error Component Props

| Prop Name | Type | Default | Required | Description |
|-----------|------|---------|----------|-------------|
| `name` | string | - | No | Field name to get errors from $errors bag |
| `messages` | array | `[]` | No | Manual error messages |

### Fieldset Component Props

| Prop Name | Type | Default | Required | Description |
|-----------|------|---------|----------|-------------|
| `label` | string | - | No | Fieldset legend text |
| `labelHidden` | boolean | `false` | No | Whether to hide the legend visually |