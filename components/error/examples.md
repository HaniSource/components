## Basic Usage

@blade
<x-ui.error name="email" />
@endblade

```blade
<x-ui.error name="email" />
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | `string\|null` | `null` | The field name to get validation errors from Laravel's `$errors` bag |
| `messages` | `array\|string\|null` | `[]` | Custom error messages to display alongside or instead of validation errors |

## Examples

### Basic Field with Validation

@blade
<x-ui.field required>
    <x-ui.label>Email Address</x-ui.label>
    <x-ui.input 
        wire:model.blur="email" 
        type="email" 
        placeholder="john@example.com"
    />
    <x-ui.error name="email"/>
</x-ui.field>
@endblade

```blade
<x-ui.field required>
    <x-ui.label>Email Address</x-ui.label>
    <x-ui.input 
        wire:model.blur="email" 
        type="email" 
        placeholder="john@example.com"
    />
    <x-ui.error name="email"/>
</x-ui.field>
```

### Custom Error Messages

@blade
<x-ui.error :messages="'Something went wrong'" />
<x-ui.error :messages="['Password too short', 'Must contain numbers']" />
@endblade

```blade
<x-ui.error :messages="'Something went wrong'" />
<x-ui.error :messages="['Password too short', 'Must contain numbers']" />
```

### Form with Multiple Fields

@blade
<form wire:submit="save" class="space-y-6">
    <x-ui.fieldset label="Account Information">
        
        <x-ui.field required>
            <x-ui.label>Full Name</x-ui.label>
            <x-ui.description>Your first and last name</x-ui.description>
            <x-ui.input 
                wire:model="name" 
                placeholder="John Doe" 
            />
            <x-ui.error name="name"/>
        </x-ui.field>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <x-ui.field required>
                <x-ui.label>Password</x-ui.label>
                <x-ui.input 
                    wire:model.blur="password" 
                    type="password" 
                    placeholder="••••••••" 
                    revealable
                />
                <x-ui.error name="password" />
            </x-ui.field>

            <x-ui.field required>
                <x-ui.label>Confirm Password</x-ui.label>
                <x-ui.input 
                    wire:model.blur="password_confirmation" 
                    type="password"
                    placeholder="••••••••"  
                    revealable
                />
                <x-ui.error name="password_confirmation"/>
            </x-ui.field>
        </div>

    </x-ui.fieldset>

    <x-ui.button type="submit" variant="primary">
        Create Account
    </x-ui.button>
</form>
@endblade

```blade
<form wire:submit="save" class="space-y-6">
    <x-ui.fieldset label="Account Information">
        
        <x-ui.field required>
            <x-ui.label>Full Name</x-ui.label>
            <x-ui.description>Your first and last name</x-ui.description>
            <x-ui.input 
                wire:model="name" 
                placeholder="John Doe" 
            />
            <x-ui.error name="name"/>
        </x-ui.field>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <x-ui.field required>
                <x-ui.label>Password</x-ui.label>
                <x-ui.input 
                    wire:model.blur="password" 
                    type="password" 
                    placeholder="••••••••" 
                    revealable
                />
                <x-ui.error name="password" />
            </x-ui.field>

            <x-ui.field required>
                <x-ui.label>Confirm Password</x-ui.label>
                <x-ui.input 
                    wire:model.blur="password_confirmation" 
                    type="password"
                    placeholder="••••••••"  
                    revealable
                />
                <x-ui.error name="password_confirmation"/>
            </x-ui.field>
        </div>

    </x-ui.fieldset>

    <x-ui.button type="submit" variant="primary">
        Create Account
    </x-ui.button>
</form>
```

### With Select and Textarea

@blade
<x-ui.field required>
    <x-ui.label>Role</x-ui.label>
    <x-ui.select wire:model="role">
        <x-ui.select.option value="developer">Developer</x-ui.select.option>
        <x-ui.select.option value="designer">Designer</x-ui.select.option>
    </x-ui.select>
    <x-ui.error name="role"/>
</x-ui.field>

<x-ui.field>
    <x-ui.label>Bio</x-ui.label>
    <x-ui.description>Tell us about yourself</x-ui.description>
    <x-ui.textarea 
        wire:model="bio" 
        rows="4"
        placeholder="I'm a passionate developer..."
        clearable
    />
    <x-ui.error name="bio"/>
</x-ui.field>
@endblade

```blade
<x-ui.field required>
    <x-ui.label>Role</x-ui.label>
    <x-ui.select wire:model="role">
        <x-ui.select.option value="developer">Developer</x-ui.select.option>
        <x-ui.select.option value="designer">Designer</x-ui.select.option>
    </x-ui.select>
    <x-ui.error name="role"/>
</x-ui.field>

<x-ui.field>
    <x-ui.label>Bio</x-ui.label>
    <x-ui.description>Tell us about yourself</x-ui.description>
    <x-ui.textarea 
        wire:model="bio" 
        rows="4"
        placeholder="I'm a passionate developer..."
        clearable
    />
    <x-ui.error name="bio"/>
</x-ui.field>
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