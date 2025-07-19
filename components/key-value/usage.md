---
name: 'key-value-input'
---

# Key-Value Input Component

## Introduction

The `key-value-input` component provides a powerful and flexible way to handle key-value pairs input. It features dynamic row management, bulk operations, validation, drag-and-drop reordering, and full accessibility support. Perfect for environment variables, metadata, configuration settings, or any structured data input scenario.

## Basic Usage

@blade
<x-demo>
    <x-ui.key-value 
        class="max-w-2xl"
        wire:model="configurations" 
        label="Configuration Settings"
    />
</x-demo>
@endblade

```html
<x-ui.key-value 
    wire:model="configurations" 
    label="Configuration Settings"
/>
```

## Customization

### Labels and Placeholders

Customize the labels and placeholders for keys and values.

@blade
<x-demo>
    <div class="max-w-2xl w-full space-y-6">
        <x-ui.key-value 
            wire:model="envVars" 
            label="Environment Variables"
            key-label="Variable Name"
            value-label="Variable Value"
            key-placeholder="e.g., env"
            value-placeholder="e.g., production"
        />
        <x-ui.key-value 
            wire:model="metadata" 
            label="Application Metadata"
            key-label="Property"
            value-label="Value"
            key-placeholder="e.g., version"
            value-placeholder="e.g., 1.0.0"
        />
    </div>
</x-demo>
@endblade

```html
<x-ui.key-value 
    wire:model="envVars" 
    label="Environment Variables"
    key-label="Variable Name"
    value-label="Variable Value"
    key-placeholder="e.g., NODE_ENV"
    value-placeholder="e.g., production"
/>
```

### Row Constraints

Control the minimum and maximum number of rows.

@blade
<x-demo>
    <div class="max-w-2xl w-full space-y-6">
        <x-ui.key-value 
            wire:model="requiredSettings" 
            label="Required Settings (2-5 rows)"
            :min-rows="2"
            :max-rows="5"
            :required="true"
        />
        <x-ui.key-value 
            wire:model="optionalSettings" 
            label="Optional Settings (0-10 rows)"
            :min-rows="0"
            :max-rows="10"
        />
    </div>
</x-demo>
@endblade

```html
<x-ui.key-value 
    wire:model="requiredSettings" 
    label="Required Settings (2-5 rows)"
    :min-rows="2"
    :max-rows="5"
    :required="true"
/>
<x-ui.key-value 
    wire:model="optionalSettings" 
    label="Optional Settings (0-10 rows)"
    :min-rows="0"
    :max-rows="10"
/>
```

## Advanced Features

### Validation and Constraints

Set validation rules and constraints to ensure data quality.

@blade
<x-demo>
    <x-ui.key-value 
        wire:model="validatedConfig" 
        label="Validated Configuration"
        :prevent-duplicate-keys="true"
        :allow-empty-values="false"
        :required="true"
    />
</x-demo>
@endblade

```html
<x-ui.key-value 
    wire:model="validatedConfig" 
    label="Validated Configuration"
    :prevent-duplicate-keys="true"
    :allow-empty-values="false"
    :required="true"
/>
```

### Bulk Operations

Enable powerful bulk operations for efficient data management.

@blade
<x-demo>
    <x-ui.key-value 
        wire:model="bulkConfig" 
        label="Configuration with Bulk Operations"
        :show-bulk-actions="true"
        add-button-text="Add Configuration"
    />
</x-demo>
@endblade

```html
<x-ui.key-value 
    wire:model="bulkConfig" 
    label="Configuration with Bulk Operations"
    :show-bulk-actions="true"
    add-button-text="Add Configuration"
/>
```

### Row Management Features

Control which row management features are available.

@blade
<x-demo>
    <x-ui.key-value 
        wire:model="managedRows" 
        label="Full Row Management"
        :show-reorder="true"
        :show-duplicate="true"
        :show-bulk-actions="true"
    />
</x-demo>
@endblade

```html
<x-ui.key-value 
    wire:model="managedRows" 
    label="Full Row Management"
    :show-reorder="true"
    :show-duplicate="true"
    :show-bulk-actions="true"
/>
```

### Simplified Interface

Create a minimal interface by hiding advanced features.

@blade
<x-demo>
    <x-ui.key-value 
        wire:model="simpleConfig" 
        label="Simple Configuration"
        :show-reorder="false"
        :show-duplicate="false"
        :show-bulk-actions="false"
    />
</x-demo>
@endblade

```html
<x-ui.key-value 
    wire:model="simpleConfig" 
    label="Simple Configuration"
    :show-reorder="false"
    :show-duplicate="false"
    :show-bulk-actions="false"
/>
```

## States and Validation

### Disabled State

@blade
<x-demo>
    <x-ui.key-value 
        wire:model="disabledConfig" 
        label="Disabled Configuration"
        :disabled="true"
    />
</x-demo>
@endblade

```html
<x-ui.key-value 
    wire:model="disabledConfig" 
    label="Disabled Configuration"
    :disabled="true"
/>
```

### Validation Rules

Apply custom validation rules to ensure data integrity.

@blade
<x-demo>
    <x-ui.key-value 
        wire:model="strictConfig" 
        label="Strict Validation"
        key-validation="required|string|max:50|alpha_dash"
        value-validation="required|string|max:200"
        :prevent-duplicate-keys="true"
        :allow-empty-values="false"
    />
</x-demo>
@endblade

```html
<x-ui.key-value 
    wire:model="strictConfig" 
    label="Strict Validation"
    key-validation="required|string|max:50|alpha_dash"
    value-validation="required|string|max:200"
    :prevent-duplicate-keys="true"
    :allow-empty-values="false"
/>
```


## Real-time Features

### Live Validation

The component provides real-time validation feedback:

- **Duplicate Key Detection**: Highlights duplicate keys immediately
- **Empty Value Validation**: Shows errors for empty values when not allowed
- **Row Limit Feedback**: Displays helpful messages when limits are reached
- **Real-time Synchronization**: Instantly syncs with Livewire model

### Dynamic Row Management

- **Smart Add**: Automatically adds rows when needed
- **Smart Delete**: Prevents deletion below minimum rows
- **Auto-focus**: Focuses new rows for better UX
- **Bulk Operations**: Clear all, import, and export functionality

## Keyboard Navigation

The component supports comprehensive keyboard navigation:

- **Tab**: Navigate between key and value inputs
- **Enter**: Move to the next row or create a new one
- **Escape**: Clear current input focus
- **Arrow Keys**: Navigate reorder controls
- **Delete**: Remove current row when focused on action buttons

## Accessibility

The component is fully accessible with:

- ARIA labels and descriptions
- Screen reader announcements for row operations
- Keyboard-only navigation support
- Focus management and indicators
- Proper semantic table structure
- High contrast support


## Integration Examples

### Environment Variables

@blade
<x-demo>
    <x-ui.key-value 
        wire:model="envVariables" 
        label="Environment Variables"
        key-label="Variable Name"
        value-label="Variable Value"
        key-placeholder="e.g., NODE_ENV"
        value-placeholder="e.g., production"
        :prevent-duplicate-keys="true"
        :allow-empty-values="false"
        :show-bulk-actions="true"
    />
</x-demo>
@endblade

```html
<x-ui.key-value 
    wire:model="envVariables" 
    label="Environment Variables"
    key-label="Variable Name"
    value-label="Variable Value"
    key-placeholder="e.g., NODE_ENV"
    value-placeholder="e.g., production"
    :prevent-duplicate-keys="true"
    :allow-empty-values="false"
    :show-bulk-actions="true"
/>
```

### HTTP Headers

@blade
<x-demo>
    <x-ui.key-value 
        wire:model="httpHeaders" 
        label="HTTP Headers"
        key-label="Header Name"
        value-label="Header Value"
        key-placeholder="e.g., X-Custom-Header"
        value-placeholder="e.g., custom-value"
        :min-rows="0"
        :max-rows="20"
        :show-reorder="false"
    />
</x-demo>
@endblade

```html
<x-ui.key-value 
    wire:model="httpHeaders" 
    label="HTTP Headers"
    key-label="Header Name"
    value-label="Header Value"
    key-placeholder="e.g., X-Custom-Header"
    value-placeholder="e.g., custom-value"
    :min-rows="0"
    :max-rows="20"
    :show-reorder="false"
/>
```

### Application Metadata

@blade
<x-demo>
    <x-ui.key-value 
        wire:model="appMetadata" 
        label="Application Metadata"
        key-label="Property"
        value-label="Value"
        key-placeholder="e.g., version"
        value-placeholder="e.g., 1.0.0"
        :allow-empty-values="true"
        :show-duplicate="true"
        add-button-text="Add Property"
    />
</x-demo>
@endblade

```html
<x-ui.key-value 
    wire:model="appMetadata" 
    label="Application Metadata"
    key-label="Property"
    value-label="Value"
    key-placeholder="e.g., version"
    value-placeholder="e.g., 1.0.0"
    :allow-empty-values="true"
    :show-duplicate="true"
    add-button-text="Add Property"
/>
```

## Component Props

| Prop Name | Type | Default | Required | Description |
|-----------|------|---------|----------|-------------|
| `wire:model` | string | - | Yes | Livewire property to bind to |
| `wire:model` | string | - | Yes | alpine `x-data` scope property to bind to |
| `label` | string | `null` | No | Label text for the component |
| `key-label` | string | `'Key'` | No | Label for the key column |
| `value-label` | string | `'Value'` | No | Label for the value column |
| `key-placeholder` | string | `'Enter key...'` | No | Placeholder for key inputs |
| `value-placeholder` | string | `'Enter value...'` | No | Placeholder for value inputs |
| `min-rows` | integer | `1` | No | Minimum number of rows |
| `max-rows` | integer | `50` | No | Maximum number of rows |
| `required` | boolean | `false` | No | Whether the component is required |
| `disabled` | boolean | `false` | No | Whether the component is disabled |
| `allow-empty-values` | boolean | `true` | No | Allow empty values |
| `prevent-duplicate-keys` | boolean | `true` | No | Prevent duplicate keys |
| `show-reorder` | boolean | `true` | No | Show reorder controls |
| `show-duplicate` | boolean | `true` | No | Show duplicate row button |
| `show-top-bar` | boolean | `true` | No | Show top toolbar |
| `add-button-text` | string | `'Add Row'` | No | Text for add button |
| `key-validation` | string | `'required/string/max:255'` | No | Validation rules for keys |
| `value-validation` | string | `'nullable/string/max:1000'` | No | Validation rules for values |
| `container-class` | string | `''` | No | Additional CSS classes for container |
| `class` | string | `''` | No | Additional CSS classes for root element |
