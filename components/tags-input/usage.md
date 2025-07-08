---
name: 'tags-input'
---

# Tags Input Component

## Introduction

The `tags-input` component provides a powerful and flexible way to handle multiple tags or keywords input. It features autocomplete suggestions, drag-and-drop reordering, validation, persistence, and full accessibility support. Perfect for skills, categories, keywords, or any multi-value input scenario.

## Basic Usage

@blade
<x-demo>
    <x-ui.tags-input 
        class="max-w-lg"
        wire:model="tags" 
        placeholder="Add tags..."
    />
</x-demo>
@endblade

```html
<x-ui.tags-input 
    wire:model="tags" 
    placeholder="Add tags..."
/>
```

## Customization

### Size Variants

The component comes in three sizes: `sm`, `md` (default), and `lg`.

@blade
<x-demo>
    <div class="max-w-md w-full space-y-4">
        <x-ui.tags-input 
            wire:model="smallTags" 
            placeholder="Small size"
            size="sm"
        />
        <x-ui.tags-input 
            wire:model="defaultTags" 
            placeholder="Default size (md)"
        />
        <x-ui.tags-input 
            wire:model="largeTags" 
            placeholder="Large size"
            size="lg"
        />
    </div>
</x-demo>
@endblade

```html
<x-ui.tags-input 
    wire:model="smallTags" 
    placeholder="Small size"
    size="sm"
/>
<x-ui.tags-input 
    wire:model="defaultTags" 
    placeholder="Default size (md)"
/>
<x-ui.tags-input 
    wire:model="largeTags" 
    placeholder="Large size"
    size="lg"
/>
```


### Tag Variants

Control the visual appearance of your tags with different shapes.

@blade
<x-demo>
    <div class="max-w-md w-full !space-y-4">
        <x-ui.tags-input 
            wire:model="roundedTags" 
            placeholder="Rounded tags (default)"
            tagVariant="rounded"
            class="mb-4"
            :initialTags="['convergephp','fluxtor','eigenify']"
        />
        <x-ui.tags-input 
            wire:model="pillTags" 
            placeholder="Pill-shaped tags"
            tagVariant="pill"
            :initialTags="['convergephp','fluxtor','eigenify']"

        />
    </div>
</x-demo>
@endblade

```html
<x-ui.tags-input 
    wire:model="roundedTags" 
    placeholder="Rounded tags (default)"
    tagVariant="rounded"
/>
<x-ui.tags-input 
    wire:model="pillTags" 
    placeholder="Pill-shaped tags"
    tagVariant="pill"
/>
```

## Advanced Features

### Suggestions and Autocomplete

Provide users with helpful suggestions as they type.

@blade
<x-demo>
    <x-ui.tags-input 
        wire:model="skillTags" 
        placeholder="Type to see suggestions..."
        :suggestions="['PHP', 'Laravel', 'Vue.js', 'Alpine.js', 'Tailwind CSS', 'JavaScript', 'Python', 'React', 'Node.js']"
    />
</x-demo>
@endblade

```html
<x-ui.tags-input 
    wire:model="skillTags" 
    placeholder="Type to see suggestions..."
    :suggestions="['PHP', 'Laravel', 'Vue.js', 'Alpine.js', 'Tailwind CSS', 'JavaScript', 'Python', 'React', 'Node.js']"
/>
```

### Validation and Constraints

Set limits and validation rules to ensure data quality.

@blade
<x-demo>
    <x-ui.tags-input 
        wire:model="constrainedTags" 
        placeholder="Max 3 tags, 2-10 characters each"
        :max-tags="3"
        :min-tag-length="2"
        :max-tag-length="10"
        :show-counter="true"
    />
</x-demo>
@endblade

```html
<x-ui.tags-input 
    wire:model="constrainedTags" 
    placeholder="Max 3 tags, 2-10 characters each"
    :max-tags="3"
    :min-tag-length="2"
    :max-tag-length="10"
    :show-counter="true"
/>
```

### Custom Separators

Define which keys should create new tags.

@blade
<x-demo>
    <x-ui.tags-input 
        wire:model="customSeparators" 
        placeholder="Use space, comma, or semicolon to separate"
        :split-keys="[' ', ',', ';']"
    />
</x-demo>
@endblade

```html
<x-ui.tags-input 
    wire:model="customSeparators" 
    placeholder="Use space, comma, or semicolon to separate"
    :split-keys="[' ', ',', ';']"
/>
```

### Bulk Operations

Enable counter display and clear all functionality.

@blade
<x-demo>
    <x-ui.tags-input 
        wire:model="bulkTags" 
        placeholder="Tags with counter and clear all"
        :show-counter="true"
        :show-clear-all="true"
    />
</x-demo>
@endblade

```html
<x-ui.tags-input 
    wire:model="bulkTags" 
    placeholder="Tags with counter and clear all"
    :show-counter="true"
    :show-clear-all="true"
/>
```

## States and Validation

### Disabled State

@blade
<x-demo>
    <x-ui.tags-input 
        wire:model="disabledTags" 
        placeholder="Disabled tags input"
        disabled
    />
</x-demo>
@endblade

```html
<x-ui.tags-input 
    wire:model="disabledTags" 
    placeholder="Disabled tags input"
    disabled
/>
```

### Character Validation

Restrict input to specific character patterns.

@blade
<x-demo>
    <x-ui.tags-input 
        wire:model="alphanumericTags" 
        placeholder="Only alphanumeric characters allowed"
        allowed-chars="^[a-zA-Z0-9]+$"
    />
</x-demo>
@endblade

```html
<x-ui.tags-input 
    wire:model="alphanumericTags" 
    placeholder="Only alphanumeric characters allowed"
    allowed-chars="^[a-zA-Z0-9]+$"
/>
```

### Blocked Words

Prevent specific words from being added as tags.

@blade
<x-demo>
    <x-ui.tags-input 
        wire:model="filteredTags" 
        placeholder="Try typing 'spam' or 'test'"
        :blocked-words="['spam', 'test', 'admin']"
    />
</x-demo>
@endblade

```html
<x-ui.tags-input 
    wire:model="filteredTags" 
    placeholder="Try typing 'spam' or 'test'"
    :blocked-words="['spam', 'test', 'admin']"
/>
```

## Value Persistence

Keep user input even after page refreshes by enabling persistence.

@blade
<x-demo>
    <x-ui.tags-input 
        wire:model="persistentTags" 
        placeholder="These tags will persist across page reloads"
        persist="true"
    />
</x-demo>
@endblade

```html
<x-ui.tags-input 
    wire:model="persistentTags" 
    placeholder="These tags will persist across page reloads"
    persist="true"
/>
```

## Auto-Sorting

Automatically sort tags alphabetically.

@blade
<x-demo>
    <x-ui.tags-input 
        wire:model="sortedTags" 
        placeholder="Tags will be sorted automatically"
        :sort-tags="true"
        sort-direction="asc"
    />
</x-demo>
@endblade

```html
<x-ui.tags-input 
    wire:model="sortedTags" 
    placeholder="Tags will be sorted automatically"
    :sort-tags="true"
    sort-direction="asc"
/>
```

## Drag and Drop

Users can reorder tags by dragging and dropping them.

> The component includes built-in drag-and-drop functionality. Simply drag tags to reorder them.

@blade
<x-demo>
    <x-ui.tags-input 
        wire:model="reorderableTags" 
        placeholder="Add tags and drag to reorder"
        :initial-tags="['First', 'Second', 'Third']"
    />
</x-demo>
@endblade

```html
<x-ui.tags-input 
    wire:model="reorderableTags" 
    placeholder="Add tags and drag to reorder"
    :initial-tags="['First', 'Second', 'Third']"
/>
```

## Keyboard Navigation

The component supports full keyboard navigation:

- **Enter**: Create a new tag
- **Backspace**: Delete the last tag when input is empty
- **Arrow Up/Down**: Navigate through suggestions
- **Escape**: Close suggestions dropdown
- **Delete**: Remove focused tag
- **Custom Keys**: Any key defined in `split-keys` will create a tag

## Accessibility

The component is fully accessible with:

- ARIA labels and descriptions
- Screen reader announcements
- Keyboard-only navigation
- Focus management
- Proper semantic roles

## Component Props

| Prop Name | Type | Default | Required | Description |
|-----------|------|---------|----------|-------------|
| `wire:model` | string | - | Yes | Livewire property to bind to |
| `placeholder` | string | `'Add tags...'` | No | Input placeholder text |
| `initial-tags` | array | `[]` | No | Initial tags to display |
| `size` | string | `'md'` | No | Size variant: `sm`, `md`, `lg` |
| `tag-variant` | string | `'default'` | No | Color theme: `default`, `primary`, `secondary`, `success`, `warning`, `danger` |
| `tagVariante` | string | `'rounded'` | No | Shape: `rounded`, `square`, `pill` |
| `disabled` | boolean | `false` | No | Whether the input is disabled |
| `max-tags` | integer | `null` | No | Maximum number of tags allowed |
| `min-tag-length` | integer | `1` | No | Minimum characters per tag |
| `max-tag-length` | integer | `50` | No | Maximum characters per tag |
| `allow-duplicates` | boolean | `false` | No | Allow duplicate tags |
| `case-sensitive` | boolean | `false` | No | Case-sensitive duplicate checking |
| `split-keys` | array | `[' ', ',', ';']` | No | Keys that create new tags |
| `suggestions` | array | `[]` | No | Autocomplete suggestions |
| `allow-custom` | boolean | `true` | No | Allow custom tags beyond suggestions |
| `blocked-words` | array | `[]` | No | Words that cannot be added as tags |
| `allowed-chars` | string | `null` | No | Regex pattern for allowed characters |
| `show-counter` | boolean | `false` | No | Show tag counter |
| `show-clear-all` | boolean | `false` | No | Show clear all button |
| `sort-tags` | boolean | `false` | No | Auto-sort tags alphabetically |
| `sort-direction` | string | `'asc'` | No | Sort direction: `asc`, `desc` |
| `persist` | boolean | `false` | No | Enable value persistence |
| `persist-key` | string | `null` | No | Custom persistence key |
| `create-on-blur` | boolean | `true` | No | Create tag when input loses focus |
| `create-on-enter` | boolean | `true` | No | Create tag on Enter key |
| `create-on-paste` | boolean | `true` | No | Handle paste with auto-splitting |
| `aria-label` | string | `'Tags input'` | No | ARIA label for accessibility |
| `aria-description` | string | `null` | No | ARIA description |
| `class` | string | `''` | No | Additional CSS classes |