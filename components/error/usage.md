# Error Component

The Error component displays validation errors and custom error messages with a consistent design and proper accessibility features.

## Basic Usage

```blade
<x-ui.error name="email" />
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | `string\|null` | `null` | The field name to get validation errors from Laravel's `$errors` bag |
| `messages` | `array\|string\|null` | `[]` | Custom error messages to display alongside or instead of validation errors |

## Examples

### Laravel Validation Errors

Display validation errors for a specific field:

```blade
<x-ui.input name="email" type="email" />
<x-ui.error name="email" />
```

### Custom Error Messages

Display custom error messages:

```blade
<x-ui.error :messages="'Something went wrong'" />
<x-ui.error :messages="['Password too short', 'Must contain numbers']" />
```

### Combined Sources

Combine Laravel validation errors with custom messages:

```blade
<x-ui.error name="username" :messages="['Custom validation failed']" />
```

### Styling

Apply custom classes:

```blade
<x-ui.error name="phone" class="mb-4 p-3 bg-red-50 rounded-lg" />
```

## Features

### Smart Message Handling
- **Single message**: Displays as plain text
- **Multiple messages**: Automatically renders as a bulleted list
- **Deduplication**: Removes duplicate messages from multiple sources
- **Empty filtering**: Ignores empty or null messages

### Accessibility
- Uses `role="alert"` for screen readers
- Includes `aria-live="polite"` for dynamic updates
- Semantic HTML structure

### Visual Design
- Red color scheme with dark mode support
- Exclamation circle icon for visual identification
- Proper spacing and alignment
- Icon forced to red color using `[&>[data-slot=icon]]:!text-red-600`

## Behavior

The component will:
1. Check Laravel's `$errors` bag for the specified field name
2. Merge any custom messages from the `messages` prop
3. Remove duplicates and empty values
4. Hide completely if no errors exist
5. Show with appropriate layout (single line or list)

## Integration with Forms

Works seamlessly with form validation:

```blade
<form wire:submit="save">
    <x-ui.input name="title" label="Post Title" />
    <x-ui.error name="title" />
    
    <x-ui.textarea name="content" label="Content" />
    <x-ui.error name="content" />
    
    <x-ui.button type="submit">Save Post</x-ui.button>
</form>
```

## Styling Slots

The component includes data slots for targeted styling:

- `data-slot="error"` - The main error container
- `data-slot="icon"` - The exclamation icon (automatically styled red)

```css
[data-slot="error"] {
    /* Custom error container styles */
}
```