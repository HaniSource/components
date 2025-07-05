---
name: 'dropdown'
---

# Dropdown Component

## Introduction

The `dropdown` component provides a fully featured dropdown menu system with support for nested submenus, keyboard navigation, focus management, and modern styling. It includes multiple sub-components for building complex menu structures with proper accessibility.

## Basic Usage

@blade
<x-demo>
    <x-ui.dropdown>
        <x-slot:button>
                Actions
        </x-slot:button>
        <x-slot:items>
            <x-ui.dropdown.item>Edit</x-ui.dropdown.item>
            <x-ui.dropdown.item>Copy</x-ui.dropdown.item>
            <x-ui.dropdown.separator />
            <x-ui.dropdown.item>Delete</x-ui.dropdown.item>
        </x-slot:items>
    </x-ui.dropdown>
</x-demo>
@endblade

```html
<x-ui.dropdown>
    <x-slot:button>
        Actions
    </x-slot:button>
    
    <x-slot:items>
        <x-ui.dropdown.item>Edit</x-ui.dropdown.item>
        <x-ui.dropdown.item>Copy</x-ui.dropdown.item>
        <x-ui.dropdown.separator />
        <x-ui.dropdown.item>Delete</x-ui.dropdown.item>
    </x-slot:items>
</x-ui.dropdown>
```

## Positioning

Control where the dropdown appears relative to the trigger button using the `position` prop.

@blade
<x-demo>
    <div class="flex flex-wrap gap-4 justify-center">
        <x-ui.dropdown position="bottom-center">
            <x-slot:button>
                Bottom Center
            </x-slot:button>
            <x-slot:items>
                <x-ui.dropdown.item>Option 1</x-ui.dropdown.item>
                <x-ui.dropdown.item>Option 2</x-ui.dropdown.item>
            </x-slot:items>
        </x-ui.dropdown>
        
        <x-ui.dropdown position="bottom-start">
            <x-slot:button>
                Bottom Start
            </x-slot:button>
            <x-slot:items>
                <x-ui.dropdown.item>Option 1</x-ui.dropdown.item>
                <x-ui.dropdown.item>Option 2</x-ui.dropdown.item>
            </x-slot:items>
        </x-ui.dropdown>
        
        <x-ui.dropdown position="top-center">
            <x-slot:button>
                Top Center
            </x-slot:button>
            <x-slot:items>
                <x-ui.dropdown.item>Option 1</x-ui.dropdown.item>
                <x-ui.dropdown.item>Option 2</x-ui.dropdown.item>
            </x-slot:items>
        </x-ui.dropdown>
    </div>
</x-demo>
@endblade

```html
<x-ui.dropdown position="bottom-center">
    <x-slot:button>
        Bottom Center
    </x-slot:button>
    <x-slot:items>
        <x-ui.dropdown.item>Option 1</x-ui.dropdown.item>
        <x-ui.dropdown.item>Option 2</x-ui.dropdown.item>
    </x-slot:items>
</x-ui.dropdown>
```

## Dropdown Items

### Basic Items

Create clickable dropdown items with optional icons and keyboard shortcuts.

@blade
<x-demo>
    <x-ui.dropdown>
        <x-slot:button>
            File Menu
        </x-slot:button>
        
        <x-slot:items>
            <x-ui.dropdown.item>
                <x-slot:icon>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </x-slot:icon>
                New File
                <x-slot:shortcut>Ctrl+N</x-slot:shortcut>
            </x-ui.dropdown.item>
            
            <x-ui.dropdown.item>
                <x-slot:icon>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                    </svg>
                </x-slot:icon>
                Open File
                <x-slot:shortcut>Ctrl+O</x-slot:shortcut>
            </x-ui.dropdown.item>
            
            <x-ui.dropdown.item>
                <x-slot:icon>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3-3m0 0l-3 3m3-3v12"></path>
                    </svg>
                </x-slot:icon>
                Save
                <x-slot:shortcut>Ctrl+S</x-slot:shortcut>
            </x-ui.dropdown.item>
        </x-slot:items>
    </x-ui.dropdown>
</x-demo>
@endblade

```html
<x-ui.dropdown.item>
    <x-slot:icon>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
        </svg>
    </x-slot:icon>
    New File
    <x-slot:shortcut>Ctrl+N</x-slot:shortcut>
</x-ui.dropdown.item>
```

### Link Items

Create dropdown items that function as links by providing an `href` attribute.

@blade
<x-demo>
    <x-ui.dropdown>
        <x-slot:button>
            Navigation
        </x-slot:button>
        
        <x-slot:items>
            <x-ui.dropdown.item href="/dashboard">Dashboard</x-ui.dropdown.item>
            <x-ui.dropdown.item href="/profile">Profile</x-ui.dropdown.item>
            <x-ui.dropdown.item href="/settings">Settings</x-ui.dropdown.item>
        </x-slot:items>
    </x-ui.dropdown>
</x-demo>
@endblade

```html
<x-ui.dropdown.item href="/dashboard">Dashboard</x-ui.dropdown.item>
<x-ui.dropdown.item href="/profile">Profile</x-ui.dropdown.item>
<x-ui.dropdown.item href="/settings">Settings</x-ui.dropdown.item>
```

### Disabled Items

Disable dropdown items when they shouldn't be interactive.

@blade
<x-demo>
    <x-ui.dropdown>
        <x-slot:button>
            Edit Menu
        </x-slot:button>
        
        <x-slot:items>
            <x-ui.dropdown.item>Cut</x-ui.dropdown.item>
            <x-ui.dropdown.item>Copy</x-ui.dropdown.item>
            <x-ui.dropdown.item disabled>Paste</x-ui.dropdown.item>
            <x-ui.dropdown.separator />
            <x-ui.dropdown.item disabled>Undo</x-ui.dropdown.item>
            <x-ui.dropdown.item disabled>Redo</x-ui.dropdown.item>
        </x-slot:items>
    </x-ui.dropdown>
</x-demo>
@endblade

```html
<x-ui.dropdown.item disabled>Paste</x-ui.dropdown.item>
<x-ui.dropdown.item disabled>Undo</x-ui.dropdown.item>
```

## Grouping & Separators

### Groups

Organize related items using groups with optional labels.

@blade
<x-demo>
    <x-ui.dropdown>
        <x-slot:button>
            Account
        </x-slot:button>
        
        <x-slot:items>
            <x-ui.dropdown.group label="Account">
                <x-ui.dropdown.item>Profile</x-ui.dropdown.item>
                <x-ui.dropdown.item>Settings</x-ui.dropdown.item>
                <x-ui.dropdown.item>Billing</x-ui.dropdown.item>
            </x-ui.dropdown.group>
            
            <x-ui.dropdown.group label="Support">
                <x-ui.dropdown.item>Help Center</x-ui.dropdown.item>
                <x-ui.dropdown.item>Contact Us</x-ui.dropdown.item>
            </x-ui.dropdown.group>
            
            <x-ui.dropdown.group>
                <x-ui.dropdown.item>Sign Out</x-ui.dropdown.item>
            </x-ui.dropdown.group>
        </x-slot:items>
    </x-ui.dropdown>
</x-demo>
@endblade

```html
<x-ui.dropdown.group label="Account">
    <x-ui.dropdown.item>Profile</x-ui.dropdown.item>
    <x-ui.dropdown.item>Settings</x-ui.dropdown.item>
    <x-ui.dropdown.item>Billing</x-ui.dropdown.item>
</x-ui.dropdown.group>

<x-ui.dropdown.group label="Support">
    <x-ui.dropdown.item>Help Center</x-ui.dropdown.item>
    <x-ui.dropdown.item>Contact Us</x-ui.dropdown.item>
</x-ui.dropdown.group>
```

### Separators

Use separators to visually divide groups of items.

@blade
<x-demo>
    <x-ui.dropdown>
        <x-slot:button>
            Options
        </x-slot:button>
        
        <x-slot:items>
            <x-ui.dropdown.item>New</x-ui.dropdown.item>
            <x-ui.dropdown.item>Open</x-ui.dropdown.item>
            <x-ui.dropdown.separator />
            <x-ui.dropdown.item>Save</x-ui.dropdown.item>
            <x-ui.dropdown.item>Save As</x-ui.dropdown.item>
            <x-ui.dropdown.separator />
            <x-ui.dropdown.item>Exit</x-ui.dropdown.item>
        </x-slot:items>
    </x-ui.dropdown>
</x-demo>
@endblade

```html
<x-ui.dropdown.item>New</x-ui.dropdown.item>
<x-ui.dropdown.item>Open</x-ui.dropdown.item>
<x-ui.dropdown.separator />
<x-ui.dropdown.item>Save</x-ui.dropdown.item>
<x-ui.dropdown.item>Save As</x-ui.dropdown.item>
<x-ui.dropdown.separator />
<x-ui.dropdown.item>Exit</x-ui.dropdown.item>
```

## Nested Submenus

Create complex nested menu structures using submenus that appear on hover or keyboard navigation.

@blade
<x-demo>
    <x-ui.dropdown>
        <x-slot:button>
            Advanced Menu
        </x-slot:button>
        
        <x-slot:items>
            <x-ui.dropdown.item>New Document</x-ui.dropdown.item>
            <x-ui.dropdown.item>Open Recent</x-ui.dropdown.item>
            
            <x-ui.dropdown.submenu label="Export">
                <x-slot:icon>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                </x-slot:icon>
                
                <x-ui.dropdown.item>Export as PDF</x-ui.dropdown.item>
                <x-ui.dropdown.item>Export as Word</x-ui.dropdown.item>
                <x-ui.dropdown.item>Export as Excel</x-ui.dropdown.item>
                <x-ui.dropdown.separator />
                <x-ui.dropdown.item>Export as Image</x-ui.dropdown.item>
            </x-ui.dropdown.submenu>
            
            <x-ui.dropdown.submenu label="Share">
                <x-slot:icon>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                    </svg>
                </x-slot:icon>
                
                <x-ui.dropdown.item>Share Link</x-ui.dropdown.item>
                <x-ui.dropdown.item>Email</x-ui.dropdown.item>
                <x-ui.dropdown.item>Copy to Clipboard</x-ui.dropdown.item>
            </x-ui.dropdown.submenu>
            
            <x-ui.dropdown.separator />
            <x-ui.dropdown.item>Delete</x-ui.dropdown.item>
        </x-slot:items>
    </x-ui.dropdown>
</x-demo>
@endblade

```html
<x-ui.dropdown.submenu label="Export">
    <x-slot:icon>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
        </svg>
    </x-slot:icon>
    
    <x-ui.dropdown.item>Export as PDF</x-ui.dropdown.item>
    <x-ui.dropdown.item>Export as Word</x-ui.dropdown.item>
    <x-ui.dropdown.item>Export as Excel</x-ui.dropdown.item>
</x-ui.dropdown.submenu>
```

## Keyboard Navigation

The dropdown component provides full keyboard accessibility:

- **Space/Enter**: Open/close dropdown
- **Escape**: Close dropdown and return focus to trigger
- **Arrow Down/Up**: Navigate between items
- **Home/End**: Jump to first/last item
- **Arrow Right**: Open submenu (when focused on submenu item)
- **Arrow Left**: Close submenu and return to parent
- **Tab**: Navigate away from dropdown (closes it)

## Accessibility Features

- Full ARIA support with proper roles and states
- Focus management and keyboard navigation
- Screen reader announcements
- Proper focus restoration when closing
- High contrast support
- RTL language support

## Component Structure

The dropdown system consists of five main components:

1. **`x-ui.dropdown`** - Main container with positioning and state management
2. **`x-ui.dropdown.item`** - Individual menu items (buttons or links)
3. **`x-ui.dropdown.group`** - Groups items with optional labels
4. **`x-ui.dropdown.separator`** - Visual dividers between items
5. **`x-ui.dropdown.submenu`** - Nested submenus with hover/keyboard triggers

## Component Props

### Dropdown (Main Container)

| Prop Name | Type | Default | Required | Description |
|-----------|------|---------|----------|-------------|
| `position` | string | `bottom-center` | No | Dropdown position: `bottom-center`, `bottom-start`, `bottom-end`, `top-center`, `top-start`, `top-end` |
| `class` | string | `''` | No | Additional CSS classes to apply |

### Dropdown Item

| Prop Name | Type | Default | Required | Description |
|-----------|------|---------|----------|-------------|
| `disabled` | boolean | `false` | No | Whether the item is disabled |
| `href` | string | `null` | No | Makes item a link instead of button |
| `icon` | slot | `null` | No | Icon to display before text |
| `shortcut` | slot | `null` | No | Keyboard shortcut to display |
| `class` | string | `''` | No | Additional CSS classes to apply |

### Dropdown Group

| Prop Name | Type | Default | Required | Description |
|-----------|------|---------|----------|-------------|
| `label` | string | `null` | No | Group label text |
| `class` | string | `''` | No | Additional CSS classes to apply |

### Dropdown Separator

| Prop Name | Type | Default | Required | Description |
|-----------|------|---------|----------|-------------|
| `class` | string | `''` | No | Additional CSS classes to apply |

### Dropdown Submenu

| Prop Name | Type | Default | Required | Description |
|-----------|------|---------|----------|-------------|
| `label` | string | - | Yes | Submenu trigger text |
| `icon` | slot | `null` | No | Icon to display before label |
| `disabled` | boolean | `false` | No | Whether the submenu is disabled |
| `class` | string | `''` | No | Additional CSS classes to apply |