---
name: 'tabs'
---

# Tabs Component

## Introduction

The `tabs` component provides a flexible and accessible tabbed interface for organizing content. It supports both named and indexed tabs, Livewire binding, x-model integration, keyboard navigation, and automatic tab management. Perfect for organizing related content sections, settings panels, or any multi-section interface.

## Basic Usage

@blade
<x-demo>
    <x-ui.tabs>
        <x-ui.tab.group>
            <x-ui.tab label="Tab 1" />
            <x-ui.tab label="Tab 2" />
            <x-ui.tab label="Tab 3" />
        </x-ui.tab.group>
        
        <x-ui.tab.panel>
            <h3 class="text-lg font-semibold mb-2">Tab 1 Content</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </x-ui.tab.panel>
        
        <x-ui.tab.panel>
            <h3 class="text-lg font-semibold mb-2">Tab 2 Content</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod.</p>
        </x-ui.tab.panel>
        
        <x-ui.tab.panel>
            <h3 class="text-lg font-semibold mb-2">Tab 3 Content</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit ut labore.</p>
        </x-ui.tab.panel>
    </x-ui.tabs>
</x-demo>
@endblade

```html
<x-ui.tabs>
    <x-ui.tab.group>
        <x-ui.tab label="Tab 1" />
        <x-ui.tab label="Tab 2" />
        <x-ui.tab label="Tab 3" />
    </x-ui.tab.group>
    
    <x-ui.tab.panel>
        <h3 class="text-lg font-semibold mb-2">Tab 1 Content</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </x-ui.tab.panel>
    
    <x-ui.tab.panel>
        <h3 class="text-lg font-semibold mb-2">Tab 2 Content</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod.</p>
    </x-ui.tab.panel>
    
    <x-ui.tab.panel>
        <h3 class="text-lg font-semibold mb-2">Tab 3 Content</h3>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit ut labore.</p>
    </x-ui.tab.panel>
</x-ui.tabs>
```

## Livewire Integration

### Bind To Livewire

Use `wire:model` to bind the active tab to a Livewire property:

@blade
<x-demo>
    <x-ui.tabs wire:model="activeTab">
        <x-ui.tab.group>
            <x-ui.tab label="Dashboard" name="dashboard" />
            <x-ui.tab label="Settings" name="settings" />
            <x-ui.tab label="Profile" name="profile" />
        </x-ui.tab.group>
        
        <x-ui.tab.panel name="dashboard">
            <h3 class="text-lg font-semibold mb-2">Dashboard</h3>
            <p>Your dashboard content goes here.</p>
        </x-ui.tab.panel>
        
        <x-ui.tab.panel name="settings">
            <h3 class="text-lg font-semibold mb-2">Settings</h3>
            <p>Configure your application settings.</p>
        </x-ui.tab.panel>
        
        <x-ui.tab.panel name="profile">
            <h3 class="text-lg font-semibold mb-2">Profile</h3>
            <p>Manage your profile information.</p>
        </x-ui.tab.panel>
    </x-ui.tabs>
</x-demo>
@endblade

```html
<x-ui.tabs wire:model="activeTab">
    <x-ui.tab.group>
        <x-ui.tab label="Dashboard" name="dashboard" />
        <x-ui.tab label="Settings" name="settings" />
        <x-ui.tab label="Profile" name="profile" />
    </x-ui.tab.group>
    
    <x-ui.tab.panel name="dashboard">
        <h3 class="text-lg font-semibold mb-2">Dashboard</h3>
        <p>Your dashboard content goes here.</p>
    </x-ui.tab.panel>
    
    <x-ui.tab.panel name="settings">
        <h3 class="text-lg font-semibold mb-2">Settings</h3>
        <p>Configure your application settings.</p>
    </x-ui.tab.panel>
    
    <x-ui.tab.panel name="profile">
        <h3 class="text-lg font-semibold mb-2">Profile</h3>
        <p>Manage your profile information.</p>
    </x-ui.tab.panel>
</x-ui.tabs>
```

### Using with Alpine.js

You can use the tabs component with Alpine.js using `x-model`:

@blade
<x-demo>
    <div x-data="{ currentTab: 'tab1' }">
        <x-ui.tabs x-model="currentTab">
            <x-ui.tab.group>
                <x-ui.tab label="Home" name="tab1" />
                <x-ui.tab label="About" name="tab2" />
                <x-ui.tab label="Contact" name="tab3" />
            </x-ui.tab.group>
            
            <x-ui.tab.panel name="tab1">
                <h3 class="text-lg font-semibold mb-2">Home</h3>
                <p>Welcome to our homepage content.</p>
            </x-ui.tab.panel>
            
            <x-ui.tab.panel name="tab2">
                <h3 class="text-lg font-semibold mb-2">About</h3>
                <p>Learn more about our company and mission.</p>
            </x-ui.tab.panel>
            
            <x-ui.tab.panel name="tab3">
                <h3 class="text-lg font-semibold mb-2">Contact</h3>
                <p>Get in touch with us through various channels.</p>
            </x-ui.tab.panel>
        </x-ui.tabs>
    </div>
</x-demo>
@endblade

```html
<div x-data="{ currentTab: 'tab1' }">
    <x-ui.tabs x-model="currentTab">
        <x-ui.tab.group>
            <x-ui.tab label="Home" name="tab1" />
            <x-ui.tab label="About" name="tab2" />
            <x-ui.tab label="Contact" name="tab3" />
        </x-ui.tab.group>
        
        <x-ui.tab.panel name="tab1">
            <h3 class="text-lg font-semibold mb-2">Home</h3>
            <p>Welcome to our homepage content.</p>
        </x-ui.tab.panel>
        
        <x-ui.tab.panel name="tab2">
            <h3 class="text-lg font-semibold mb-2">About</h3>
            <p>Learn more about our company and mission.</p>
        </x-ui.tab.panel>
        
        <x-ui.tab.panel name="tab3">
            <h3 class="text-lg font-semibold mb-2">Contact</h3>
            <p>Get in touch with us through various channels.</p>
        </x-ui.tab.panel>
    </x-ui.tabs>
</div>
```

## Tab Management

### Named Tabs

Use the `name` attribute to create identifiable tabs:

@blade
<x-demo>
    <x-ui.tabs activeTab="general">
        <x-ui.tab.group>
            <x-ui.tab label="General" name="general" />
            <x-ui.tab label="Security" name="security" />
            <x-ui.tab label="Notifications" name="notifications" />
        </x-ui.tab.group>
        
        <x-ui.tab.panel name="general">
            <h3 class="text-lg font-semibold mb-2">General Settings</h3>
            <p>Basic configuration options for your account.</p>
        </x-ui.tab.panel>
        
        <x-ui.tab.panel name="security">
            <h3 class="text-lg font-semibold mb-2">Security Settings</h3>
            <p>Manage your password and security preferences.</p>
        </x-ui.tab.panel>
        
        <x-ui.tab.panel name="notifications">
            <h3 class="text-lg font-semibold mb-2">Notification Settings</h3>
            <p>Control how and when you receive notifications.</p>
        </x-ui.tab.panel>
    </x-ui.tabs>
</x-demo>
@endblade

```html
<x-ui.tabs activeTab="general">
    <x-ui.tab.group>
        <x-ui.tab label="General" name="general" />
        <x-ui.tab label="Security" name="security" />
        <x-ui.tab label="Notifications" name="notifications" />
    </x-ui.tab.group>
    
    <x-ui.tab.panel name="general">
        <h3 class="text-lg font-semibold mb-2">General Settings</h3>
        <p>Basic configuration options for your account.</p>
    </x-ui.tab.panel>
    
    <x-ui.tab.panel name="security">
        <h3 class="text-lg font-semibold mb-2">Security Settings</h3>
        <p>Manage your password and security preferences.</p>
    </x-ui.tab.panel>
    
    <x-ui.tab.panel name="notifications">
        <h3 class="text-lg font-semibold mb-2">Notification Settings</h3>
        <p>Control how and when you receive notifications.</p>
    </x-ui.tab.panel>
</x-ui.tabs>
```

### Indexed Tabs

For simpler use cases, you can use numeric indices:

@blade
<x-demo>
    <x-ui.tabs activeTab="1">
        <x-ui.tab.group>
            <x-ui.tab label="First" />
            <x-ui.tab label="Second" />
            <x-ui.tab label="Third" />
        </x-ui.tab.group>
        
        <x-ui.tab.panel>
            <h3 class="text-lg font-semibold mb-2">First Tab</h3>
            <p>This is the first tab content (index 0).</p>
        </x-ui.tab.panel>
        
        <x-ui.tab.panel>
            <h3 class="text-lg font-semibold mb-2">Second Tab</h3>
            <p>This is the second tab content (index 1).</p>
        </x-ui.tab.panel>
        
        <x-ui.tab.panel>
            <h3 class="text-lg font-semibold mb-2">Third Tab</h3>
            <p>This is the third tab content (index 2).</p>
        </x-ui.tab.panel>
    </x-ui.tabs>
</x-demo>
@endblade

```html
<x-ui.tabs activeTab="1">
    <x-ui.tab.group>
        <x-ui.tab label="First" />
        <x-ui.tab label="Second" />
        <x-ui.tab label="Third" />
    </x-ui.tab.group>
    
    <x-ui.tab.panel>
        <h3 class="text-lg font-semibold mb-2">First Tab</h3>
        <p>This is the first tab content (index 0).</p>
    </x-ui.tab.panel>
    
    <x-ui.tab.panel>
        <h3 class="text-lg font-semibold mb-2">Second Tab</h3>
        <p>This is the second tab content (index 1).</p>
    </x-ui.tab.panel>
    
    <x-ui.tab.panel>
        <h3 class="text-lg font-semibold mb-2">Third Tab</h3>
        <p>This is the third tab content (index 2).</p>
    </x-ui.tab.panel>
</x-ui.tabs>
```

## Customization

### Tab Variants

Customize the appearance of your tabs with different variants:

@blade
<x-demo>
    <x-ui.tabs variant="default">
        <x-ui.tab.group>
            <x-ui.tab label="Overview" />
            <x-ui.tab label="Analytics" />
            <x-ui.tab label="Reports" />
        </x-ui.tab.group>
        
        <x-ui.tab.panel>
            <h3 class="text-lg font-semibold mb-2">Overview</h3>
            <p>High-level overview of your data and metrics.</p>
        </x-ui.tab.panel>
        
        <x-ui.tab.panel>
            <h3 class="text-lg font-semibold mb-2">Analytics</h3>
            <p>Detailed analytics and performance metrics.</p>
        </x-ui.tab.panel>
        
        <x-ui.tab.panel>
            <h3 class="text-lg font-semibold mb-2">Reports</h3>
            <p>Generate and view comprehensive reports.</p>
        </x-ui.tab.panel>
    </x-ui.tabs>
</x-demo>
@endblade

```html
<x-ui.tabs variant="default">
    <x-ui.tab.group>
        <x-ui.tab label="Overview" />
        <x-ui.tab label="Analytics" />
        <x-ui.tab label="Reports" />
    </x-ui.tab.group>
    
    <x-ui.tab.panel>
        <h3 class="text-lg font-semibold mb-2">Overview</h3>
        <p>High-level overview of your data and metrics.</p>
    </x-ui.tab.panel>
    
    <x-ui.tab.panel>
        <h3 class="text-lg font-semibold mb-2">Analytics</h3>
        <p>Detailed analytics and performance metrics.</p>
    </x-ui.tab.panel>
    
    <x-ui.tab.panel>
        <h3 class="text-lg font-semibold mb-2">Reports</h3>
        <p>Generate and view comprehensive reports.</p>
    </x-ui.tab.panel>
</x-ui.tabs>
```

### Custom Tab Content

Use slots for more complex tab labels:

@blade
<x-demo>
    <x-ui.tabs>
        <x-ui.tab.group>
            <x-ui.tab>
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 7 10 10M7 17l10-10"></path>
                </svg>
                Inbox
            </x-ui.tab>
            
            <x-ui.tab>
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                Profile
            </x-ui.tab>
            
            <x-ui.tab>
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                Settings
            </x-ui.tab>
        </x-ui.tab.group>
        
        <x-ui.tab.panel>
            <h3 class="text-lg font-semibold mb-2">Inbox</h3>
            <p>Your messages and notifications.</p>
        </x-ui.tab.panel>
        
        <x-ui.tab.panel>
            <h3 class="text-lg font-semibold mb-2">Profile</h3>
            <p>Your personal information and preferences.</p>
        </x-ui.tab.panel>
        
        <x-ui.tab.panel>
            <h3 class="text-lg font-semibold mb-2">Settings</h3>
            <p>Application settings and configuration.</p>
        </x-ui.tab.panel>
    </x-ui.tabs>
</x-demo>
@endblade

```html
<x-ui.tabs>
    <x-ui.tab.group>
        <x-ui.tab>
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 7 10 10M7 17l10-10"></path>
            </svg>
            Inbox
        </x-ui.tab>
        
        <x-ui.tab>
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
            Profile
        </x-ui.tab>
        
        <x-ui.tab>
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            Settings
        </x-ui.tab>
    </x-ui.tab.group>
    
    <x-ui.tab.panel>
        <h3 class="text-lg font-semibold mb-2">Inbox</h3>
        <p>Your messages and notifications.</p>
    </x-ui.tab.panel>
    
    <x-ui.tab.panel>
        <h3 class="text-lg font-semibold mb-2">Profile</h3>
        <p>Your personal information and preferences.</p>
    </x-ui.tab.panel>
    
    <x-ui.tab.panel>
        <h3 class="text-lg font-semibold mb-2">Settings</h3>
        <p>Application settings and configuration.</p>
    </x-ui.tab.panel>
</x-ui.tabs>
```

## Accessibility Features

The tabs component includes full accessibility support:

- **Keyboard Navigation**: Use arrow keys, Home, End, Page Up, and Page Down to navigate
- **ARIA Attributes**: Proper `role="tablist"` and related ARIA attributes
- **Focus Management**: Automatic focus management when switching tabs
- **Screen Reader Support**: Proper labeling and state announcements

### Keyboard Shortcuts

- **Right Arrow**: Move to next tab
- **Left Arrow**: Move to previous tab
- **Home**: Move to first tab
- **End**: Move to last tab
- **Page Up**: Move to first tab
- **Page Down**: Move to last tab

## Component Structure

The tabs component consists of three main parts:

1. **`<x-ui.tabs>`** - The root container
2. **`<x-ui.tab.group>`** - Contains the tab buttons
3. **`<x-ui.tab>`** - Individual tab buttons
4. **`<x-ui.tab.panel>`** - Tab content panels

## Component Props

### Main Tabs Component (`<x-ui.tabs>`)

| Prop Name | Type | Default | Required | Description |
|-----------|------|---------|----------|-------------|
| `variant` | string | `'default'` | No | Visual variant of the tabs |
| `size` | string | `'default'` | No | Size variant of the tabs |
| `activeTab` | string/int | `null` | No | Initially active tab (name or index) |
| `wire:model` | string | - | No | Livewire property to bind to |
| `x-model` | string | - | No | Alpine.js property to bind to |
| `class` | string | `''` | No | Additional CSS classes |

### Tab Group Component (`<x-ui.tab.group>`)

| Prop Name | Type | Default | Required | Description |
|-----------|------|---------|----------|-------------|
| `variant` | string | `'default'` | No | Visual variant inherited from parent |
| `class` | string | `''` | No | Additional CSS classes use `justify-center, justify-start, justify-end` for alignment control |

### Tab Index Component (`<x-ui.tab>`)

| Prop Name | Type | Default | Required | Description |
|-----------|------|---------|----------|-------------|
| `label` | string | `null` | No | Tab label text (alternative to slot) |
| `name` | string | `null` | No | Tab identifier (for named tabs) |
| `variant` | string | `'default'` | No | Visual variant inherited from parent |
| `class` | string | `''` | No | Additional CSS classes |

### Tab Panel Component (`<x-ui.tab.panel>`)

| Prop Name | Type | Default | Required | Description |
|-----------|------|---------|----------|-------------|
| `name` | string | `null` | No | Panel identifier (must match tab name) |
| `variant` | string | `'default'` | No | Visual variant inherited from parent |
| `class` | string | `''` | No | Additional CSS classes |

## Examples

### Complete Livewire Example

```php
<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TabsExample extends Component
{
    public $activeTab = 'dashboard';
    
    public function render()
    {
        return view('livewire.tabs-example');
    }
}
```

```html
<div>
    <x-ui.tabs wire:model="activeTab">
        <x-ui.tab.group>
            <x-ui.tab label="Dashboard" name="dashboard" />
            <x-ui.tab label="Users" name="users" />
            <x-ui.tab label="Settings" name="settings" />
        </x-ui.tab.group>
        
        <x-ui.tab.panel name="dashboard">
            <h3 class="text-lg font-semibold mb-2">Dashboard</h3>
            <p>Current active tab: {{ $activeTab }}</p>
        </x-ui.tab.panel>
        
        <x-ui.tab.panel name="users">
            <h3 class="text-lg font-semibold mb-2">Users</h3>
            <p>Current active tab: {{ $activeTab }}</p>
        </x-ui.tab.panel>
        
        <x-ui.tab.panel name="settings">
            <h3 class="text-lg font-semibold mb-2">Settings</h3>
            <p>Current active tab: {{ $activeTab }}</p>
        </x-ui.tab.panel>
    </x-ui.tabs>
</div>
```

## Notes

- The component automatically handles tab/panel matching using either names or indices
- If no `activeTab` is specified, the first tab will be active by default
- Named tabs take precedence over indexed tabs when both are present
- The component supports both Livewire's `wire:model` and Alpine.js's `x-model` for two-way binding
- Keyboard navigation follows WAI-ARIA best practices for tab components