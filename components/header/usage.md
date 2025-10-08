---
name: header
---

## Introduction


The `Header` component is a **sticky**, **responsive** application header designed to sit at the top of your main content area. It provides a consistent navigation bar with mobile menu toggle integration and seamless integration with the sidebar layout system.

## Installation


@blade
<x-md.cta                                                            
    href="/docs/layouts/layout"                                    
    label="this component cames with the layout component"
    variant="slide"                                               
/>
@endblade


> Once installed, you can use the `<x-ui.layout.header>` component within your layout's main area.

## Usage

### Basic Header

The simplest implementation with a navbar and user actions:

```blade
<x-ui.layout.main>
    <x-ui.layout.header>
        <x-ui.navbar class="flex-1">
            <x-ui.navbar.item icon="home" label="Home" href="/" />
            <x-ui.navbar.item icon="cog-6-tooth" label="Settings" href="/settings" />
        </x-ui.navbar>
        
        <div class="flex gap-x-3 items-center">
            <x-ui.avatar size="sm" src="/avatar.png" circle />
            <x-ui.theme-switcher variant="inline" />
        </div>
    </x-ui.layout.header>

    <div class="p-6">
        <!-- Your page content -->
    </div>
</x-ui.layout.main>
```

### Header with Navigation Only

A simple header focused on navigation:

```blade
<x-ui.layout.header>
    <x-ui.navbar class="flex-1">
        <x-ui.navbar.item icon="home" label="Dashboard" href="/dashboard" />
        <x-ui.navbar.item icon="chart-bar" label="Analytics" href="/analytics" />
        <x-ui.navbar.item icon="users" label="Team" href="/team" />
        <x-ui.navbar.item icon="folder" label="Projects" href="/projects" />
    </x-ui.navbar>
</x-ui.layout.header>
```

### Header with Search and Actions

Add search functionality and action buttons:

```blade
<x-ui.layout.header>
    <x-ui.navbar class="flex-1">
        <x-ui.navbar.item icon="home" label="Home" href="/" />
        <x-ui.navbar.item icon="document-text" label="Docs" href="/docs" />
    </x-ui.navbar>

    <div class="flex items-center gap-x-4">
        <x-ui.input 
            placeholder="Search..." 
            icon="magnifying-glass"
            class="w-64"
        />
        <x-ui.button variant="solid" size="sm" icon="plus">
            New Project
        </x-ui.button>
        <x-ui.avatar src="/mohamed.png" circle size="sm" />
    </div>
</x-ui.layout.header>
```

### Mobile Menu Toggle

the toggler appears automatically next to the brand on larger screens. On mobile, add it manually inside your header.

```blade
<x-ui.layout.header>
    <x-ui.sidebar.toggle class="md:hidden" />
    <!-- navbar -->
</x-ui.layout.header>
```

Use `md:hidden` to show it only on mobile. The variant handles everything else automatically on larger screens.


## Component Props

### Header Component

| Prop Name | Type  | Default | Required | Description                      |
| --------- | ----- | ------- | -------- | -------------------------------- |
| `slot`    | mixed | `''`    | Yes      | Header content (navbar, actions) |

## Component Structure

The header component consists of:

- **Main Container**: `<x-ui.layout.header>` - The header wrapper with border and padding
- **Mobile Toggle**: Auto-included button for mobile sidebar control (internal)
- **Content Area**: Flexible space for navigation and actions

## Styling & Layout

The header component includes:

- Fixed minimum height matching sidebar brand area (`--header-height: 4rem`)
- Bottom border for visual separation
- Automatic flexbox layout for content alignment
- Responsive padding that adapts to viewport size
- Dark mode support with appropriate border colors

## Advanced Examples

### Header with User Menu

```blade
<x-ui.layout.header>
    <x-ui.navbar class="flex-1">
        <x-ui.navbar.item icon="home" label="Dashboard" href="/dashboard" />
        <x-ui.navbar.item icon="chart-bar" label="Reports" href="/reports" />
    </x-ui.navbar>

    <div class="flex items-center gap-x-4">
        <x-ui.dropdown>
            <x-slot:trigger>
                <x-ui.button variant="ghost">
                    <x-ui.avatar src="/user.jpg" size="sm" circle />
                    <span>John Doe</span>
                    <x-ui.icon name="chevron-down" class="size-4" />
                </x-ui.button>
            </x-slot:trigger>

            <x-ui.dropdown.item icon="user" label="Profile" href="/profile" />
            <x-ui.dropdown.item icon="cog" label="Settings" href="/settings" />
            <x-ui.dropdown.divider />
            <x-ui.dropdown.item icon="arrow-right-on-rectangle" label="Logout" href="/logout" />
        </x-ui.dropdown>
    </div>
</x-ui.layout.header>
```

### Header with Notifications

```blade
<x-ui.layout.header>
    <x-ui.navbar class="flex-1">
        <x-ui.navbar.item icon="home" label="Home" href="/" />
    </x-ui.navbar>

    <div class="flex items-center gap-x-3">
        <x-ui.button variant="ghost" icon="bell" class="relative">
            <span class="absolute top-1 right-1 size-2 bg-red-500 rounded-full"></span>
        </x-ui.button>
        
        <x-ui.button variant="ghost" icon="envelope" />
        
        <x-ui.avatar src="/user.jpg" circle size="sm" />
    </div>
</x-ui.layout.header>
```

### Conditional Header Content

```blade
<x-ui.layout.header>
    <x-ui.navbar class="flex-1">
        <x-ui.navbar.item icon="home" label="Home" href="/" />
        
        @auth
            <x-ui.navbar.item icon="folder" label="My Projects" href="/projects" />
            <x-ui.navbar.item icon="star" label="Favorites" href="/favorites" />
        @endauth
    </x-ui.navbar>

    <div class="flex items-center gap-x-3">
        @auth
            <x-ui.avatar src="{{ auth()->user()->avatar }}" circle size="sm" />
        @else
            <x-ui.button variant="primary" href="/login">Sign In</x-ui.button>
        @endauth
    </div>
</x-ui.layout.header>
```
