---
name: 'key-value-input'
---

# Key-Value Input Component

## Introduction

The `key-value-input` component provides a powerful and flexible way to handle key-value pairs input. It features dynamic row management, bulk operations, validation, drag-and-drop reordering, and full accessibility support. Perfect for environment variables, metadata, configuration settings, or any structured data input scenario.

## Basic Usage

@blade
<x-demo>
    <x-ui.key-value-input 
        class="max-w-2xl"
        wire:model="configurations" 
        label="Configuration Settings"
    />
</x-demo>
@endblade

```html
<x-ui.key-value-input 
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
        <x-ui.key-value-input 
            wire:model="envVars" 
            label="Environment Variables"
            key-label="Variable Name"
            value-label="Variable Value"
            key-placeholder="e.g., NODE_ENV"
            value-placeholder="e.g., production"
        />
        <x-ui.key-value-input 
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
<x-ui.key-value-input 
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
        <x-ui.key-value-input 
            wire:model="requiredSettings" 
            label="Required Settings (2-5 rows)"
            :min-rows="2"
            :max-rows="5"
            :required="true"
        />
        <x-ui.key-value-input 
            wire:model="optionalSettings" 
            label="Optional Settings (0-10 rows)"
            :min-rows="0"
            :max-rows="10"
        />
    </div>
</x-demo>
@endblade

```html
<x-ui.key-value-input 
    wire:model="requiredSettings" 
    label="Required Settings (2-5 rows)"
    :min-rows="2"
    :max-rows="5"
    :required="true"
/>
<x-ui.key-value-input 
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
    <x-ui.key-value-input 
        wire:model="validatedConfig" 
        label="Validated Configuration"
        :prevent-duplicate-keys="true"
        :allow-empty-values="false"
        :required="true"
    />
</x-demo>
@endblade

```html
<x-ui.key-value-input 
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
    <x-ui.key-value-input 
        wire:model="bulkConfig" 
        label="Configuration with Bulk Operations"
        :show-bulk-actions="true"
        add-button-text="Add Configuration"
    />
</x-demo>
@endblade

```html
<x-ui.key-value-input 
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
    <x-ui.key-value-input 
        wire:model="managedRows" 
        label="Full Row Management"
        :show-reorder="true"
        :show-duplicate="true"
        :show-bulk-actions="true"
    />
</x-demo>
@endblade

```html
<x-ui.key-value-input 
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
    <x-ui.key-value-input 
        wire:model="simpleConfig" 
        label="Simple Configuration"
        :show-reorder="false"
        :show-duplicate="false"
        :show-bulk-actions="false"
    />
</x-demo>
@endblade

```html
<x-ui.key-value-input 
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
    <x-ui.key-value-input 
        wire:model="disabledConfig" 
        label="Disabled Configuration"
        :disabled="true"
    />
</x-demo>
@endblade

```html
<x-ui.key-value-input 
    wire:model="disabledConfig" 
    label="Disabled Configuration"
    :disabled="true"
/>
```

### Validation Rules

Apply custom validation rules to ensure data integrity.

@blade
<x-demo>
    <x-ui.key-value-input 
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
<x-ui.key-value-input 
    wire:model="strictConfig" 
    label="Strict Validation"
    key-validation="required|string|max:50|alpha_dash"
    value-validation="required|string|max:200"
    :prevent-duplicate-keys="true"
    :allow-empty-values="false"
/>
```

## JSON Import/Export

Enable JSON import and export functionality for easy data management.

@blade
<x-demo>
    <x-ui.key-value-input 
        wire:model="jsonConfig" 
        label="JSON Import/Export Configuration"
        :show-bulk-actions="true"
    />
</x-demo>
@endblade

```html
<x-ui.key-value-input 
    wire:model="jsonConfig" 
    label="JSON Import/Export Configuration"
    :show-bulk-actions="true"
/>
```

> **JSON Format**: The component expects JSON in the format `[{"key": "name", "value": "value"}, ...]`. The export function will copy this format to your clipboard.

## Drag and Drop Reordering

Users can reorder rows by dragging and dropping them when reordering is enabled.

> The component includes built-in drag-and-drop functionality. Simply drag the reorder controls to rearrange rows.

@blade
<x-demo>
    <x-ui.key-value-input 
        wire:model="reorderableConfig" 
        label="Reorderable Configuration"
        :show-reorder="true"
    />
</x-demo>
@endblade

```html
<x-ui.key-value-input 
    wire:model="reorderableConfig" 
    label="Reorderable Configuration"
    :show-reorder="true"
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

## Custom Styling

### CSS Classes

Apply custom styling with CSS class props:

@blade
<x-demo>
    <x-ui.key-value-input 
        wire:model="styledConfig" 
        label="Custom Styled Configuration"
        container-class="border-2 border-blue-200"
        table-class="bg-blue-50"
        input-class="border-blue-300 focus:border-blue-500"
        button-class="hover:bg-blue-100"
    />
</x-demo>
@endblade

```html
<x-ui.key-value-input 
    wire:model="styledConfig" 
    label="Custom Styled Configuration"
    container-class="border-2 border-blue-200"
    table-class="bg-blue-50"
    input-class="border-blue-300 focus:border-blue-500"
    button-class="hover:bg-blue-100"
/>
```

### Error Styling

Customize error message appearance:

```html
<x-ui.key-value-input 
    wire:model="errorConfig" 
    label="Custom Error Styling"
    error-class="text-red-600 font-medium text-sm mt-2"
/>
```

## Integration Examples

### Environment Variables

@blade
<x-demo>
    <x-ui.key-value-input 
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
<x-ui.key-value-input 
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
    <x-ui.key-value-input 
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
<x-ui.key-value-input 
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
    <x-ui.key-value-input 
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
<x-ui.key-value-input 
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
| `show-bulk-actions` | boolean | `true` | No | Show bulk action toolbar |
| `add-button-text` | string | `'Add Row'` | No | Text for add button |
| `key-validation` | string | `'required|string|max:255'` | No | Validation rules for keys |
| `value-validation` | string | `'nullable|string|max:1000'` | No | Validation rules for values |
| `container-class` | string | `''` | No | Additional CSS classes for container |
| `table-class` | string | `''` | No | Additional CSS classes for table |
| `input-class` | string | `''` | No | Additional CSS classes for inputs |
| `button-class` | string | `''` | No | Additional CSS classes for buttons |
| `error-class` | string | `'text-red-500 text-sm mt-1'` | No | CSS classes for error messages |
| `class` | string | `''` | No | Additional CSS classes for root element |

## Livewire Integration

### Basic Setup

In your Livewire component:

```php
<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;

class ConfigurationForm extends Component
{
    #[Validate([
        'configurations' => 'array',
        'configurations.*.key' => 'required|string|max:255',
        'configurations.*.value' => 'nullable|string|max:1000',
    ])]
    public array $configurations = [];

    public function save()
    {
        $this->validate();
        
        // Process the key-value pairs
        $processed = $this->processKeyValuePairs($this->configurations);
        
        // Save to database or perform other actions
        // ...
    }

    private function processKeyValuePairs(array $pairs): array
    {
        return collect($pairs)
            ->filter(fn($pair) => !empty(trim($pair['key'])))
            ->mapWithKeys(fn($pair) => [trim($pair['key']) => trim($pair['value'])])
            ->toArray();
    }

    public function render()
    {
        return view('livewire.configuration-form');
    }
}
```

### Advanced Validation

For more complex validation scenarios:

```php
#[Validate([
    'configurations' => 'array|min:2|max:10',
    'configurations.*.key' => 'required|string|max:50|alpha_dash|unique_in_array:configurations.*.key',
    'configurations.*.value' => 'required|string|max:200',
])]
public array $configurations = [];

protected function rules()
{
    return [
        'configurations' => 'array|min:2|max:10',
        'configurations.*.key' => [
            'required',
            'string',
            'max:50',
            'alpha_dash',
            Rule::unique('configurations', 'key')->ignore($this->id),
        ],
        'configurations.*.value' => 'required|string|max:200',
    ];
}
```

## Events and Hooks

The component dispatches several events that you can listen to:

- `notify`: Dispatched with success/error messages
- `key-value-updated`: Dispatched when data changes
- `row-added`: Dispatched when a row is added
- `row-deleted`: Dispatched when a row is deleted

```javascript
// Listen to events
document.addEventListener('notify', (event) => {
    console.log(event.detail.message);
});
```

## Browser Compatibility

The component is compatible with all modern browsers and gracefully degrades for older browsers:

- Chrome 60+
- Firefox 55+
- Safari 12+
- Edge 79+

## Performance Considerations

- The component is optimized for up to 50 rows by default
- Large datasets (100+ rows) may impact performance
- Consider server-side pagination for very large datasets
- Use debouncing for real-time validation in high-frequency scenarios