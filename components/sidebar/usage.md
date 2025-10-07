---
name: sidebar component 
---

## Introduction

The `Sidebar` component is a **responsive**, **collapsible** navigation sidebar designed for modern web applications. It features smooth transitions, touch-friendly interactions, and intelligent behavior across mobile, tablet, and desktop viewports. When combined with the layout system, it provides a complete application shell with seamless responsive behavior.

## Installation

Use the [sheaf artisan command](/docs/guides/cli-installation#content-component-management) to install the `sidebar` component easily:

```bash
php artisan sheaf:install sidebar
```

## Usage

@blade
<x-md.cta                                                            
    href="/docs/layouts/layout#content-variants"                                    
    label="this sidebar can be used in two variants, read more about it"
    ctaLabel="Visit Docs"
/>
@endblade


### Basic Sidebar Layout

The simplest implementation combining layout, sidebar, and main content:

```blade
<x-ui.layout>
    <x-ui.sidebar brand="My App">
        <x-ui.navlist>
            <x-ui.navlist.item 
                label="Dashboard"
                icon="home"
                href="/dashboard"
            />
            <x-ui.navlist.item 
                label="Settings"
                icon="cog"
                href="/settings"
            />
        </x-ui.navlist>
    </x-ui.sidebar>

    <x-ui.layout.main>
        <!-- Your main content here -->
        <h1>Welcome to Dashboard</h1>
    </x-ui.layout.main>
</x-ui.layout>
```

### Custom Brand Area

Customize the brand/logo area in the sidebar header:

```blade
<x-ui.sidebar>
    <x-slot:brand>
        <div class="flex items-center gap-2">
            <img src="/logo.svg" alt="Logo" class="size-8" />
            <span class="font-bold text-lg">Company</span>
        </div>
    </x-slot:brand>

    <x-ui.navlist>
        <!-- Navigation items -->
    </x-ui.navlist>
</x-ui.sidebar>
```


### Sidebar with Footer Content

Use the `push` component to position content at the bottom:

```blade
<x-ui.sidebar brand="My App">
    <x-ui.navlist>
        <x-ui.navlist.item 
            label="Dashboard"
            icon="home"
            href="/dashboard"
        />
        <x-ui.navlist.item 
            label="Projects"
            icon="folder"
            href="/projects"
        />
    </x-ui.navlist>

    <!-- this is what pushes that content below  -->
    <x-ui.sidebar.push />

    <!-- Footer content pushed to bottom -->
    <div>
        <!--  -->
    </div>
</x-ui.sidebar>
```

### Complete Application Layout

A full example with header, navigation, and content:

```blade
<x-ui.layout>
    <x-ui.sidebar brand="Dashboard Pro">
        <x-ui.navlist>
            <x-ui.navlist.group label="Main">
                <x-ui.navlist.item 
                    label="Dashboard"
                    icon="home"
                    href="/dashboard"
                    :active="request()->is('dashboard')"
                />
                <x-ui.navlist.item 
                    label="Analytics"
                    icon="chart-bar"
                    href="/analytics"
                />
            </x-ui.navlist.group>

            <x-ui.navlist.group 
                label="Management"
                collapsable
            >
                <x-ui.navlist.item 
                    label="Users"
                    icon="users"
                    href="/users"
                    badge="12"
                />
                <x-ui.navlist.item 
                    label="Products"
                    icon="cube"
                    href="/products"
                />
            </x-ui.navlist.group>
        </x-ui.navlist>

        <x-ui.sidebar.push />

        <div class="p-4">
            <x-ui.button variant="ghost" class="w-full">
                <x-ui.icon name="arrow-right-on-rectangle" />
                <span class="[:has([data-collapsed]_&)_&]:hidden">Logout</span>
            </x-ui.button>
        </div>
    </x-ui.sidebar>

    <x-ui.layout.main>
        <header class="sticky top-0 bg-white dark:bg-neutral-950 border-b dark:border-white/5 border-black/5 p-4">
            <h1 class="text-2xl font-bold">Page Title</h1>
        </header>
        
        <div class="p-6">
            <!-- Your page content -->
        </div>
    </x-ui.layout.main>
</x-ui.layout>
```

## Responsive Behavior

The sidebar automatically adapts to different screen sizes:

### Mobile (< 768px)
- Sidebar appears as an overlay
- Hidden by default
- Toggle opens/closes the overlay
- Backdrop appears when open
- Click outside closes the sidebar

### Tablet (768px - 1024px)
- Sidebar is always visible
- Automatically collapsed to icon-only view
- Hover over items shows tooltips
- Cannot be expanded to full width

### Desktop (≥ 1024px)
- Sidebar is visible by default
- Toggle switches between full and collapsed states
- State persists across page loads
- Smooth transitions between states
- Touch devices: click anywhere on sidebar to toggle

## Touch-Friendly Interaction

On touch devices (tablets and phones), the sidebar includes enhanced touch targets:

- The entire sidebar area acts as a toggle on touch devices (desktop only)
- Brand area and toggle button are excluded from this behavior
- 48px minimum touch targets on all interactive elements
- Optimized for thumb-friendly interaction

## Component Props

### Layout Component

| Prop Name     | Type    | Default | Required | Description                                    |
| ------------- | ------- | ------- | -------- | ---------------------------------------------- |
| `collapsible` | boolean | `true`  | No       | Whether the layout supports sidebar collapse   |
| `slot`        | mixed   | `''`    | Yes      | Contains sidebar and main content              |

### Sidebar Component

| Prop Name     | Type    | Default        | Required | Description                                          |
| ------------- | ------- | -------------- | -------- | ---------------------------------------------------- |
| `brand`       | string  | `'Brand Name'` | No       | Brand text displayed in sidebar header               |
| `scrollable`  | boolean | `false`        | No       | Whether sidebar content should be scrollable         |
| `collapsable` | boolean | `true`         | No       | Whether sidebar can be collapsed (inherits from layout) |
| `slot`        | mixed   | `''`           | Yes      | Navigation and content within sidebar                |

**Note:** When using the `brand` slot, it overrides the `brand` prop.

### Sidebar Push Component

| Prop Name | Type  | Default | Required | Description                                    |
| --------- | ----- | ------- | -------- | ---------------------------------------------- |
| `slot`    | mixed | `''`    | No       | Pushes subsequent content to bottom of sidebar |

### Sidebar Toggle Component

| Prop Name | Type   | Default | Required | Description                           |
| --------- | ------ | ------- | -------- | ------------------------------------- |
| `tooltip` | string | `null`  | No       | Custom tooltip text for toggle button |

**Note:** The toggle is automatically hidden when `collapsable="false"`.

### Layout Main Component

| Prop Name | Type  | Default | Required | Description            |
| --------- | ----- | ------- | -------- | ---------------------- |
| `slot`    | mixed | `''`    | Yes      | Main application content |

## Component Structure

The sidebar system is built with multiple components working together:

- **Layout Container**: `<x-ui.layout>` - The root grid container managing responsive behavior
- **Sidebar**: `<x-ui.sidebar>` - The sidebar navigation area
- **Sidebar Brand**: Uses `brand` prop or `brand` slot for header content
- **Sidebar Toggle**: `<x-ui.sidebar.toggle>` - Collapse/expand button (internal, auto-included)
- **Sidebar Push**: `<x-ui.sidebar.push>` - Spacer to push content to bottom
- **Main Content**: `<x-ui.layout.main>` - The primary content area

## Advanced Examples

### Multi-Section Sidebar with User Profile

```blade
<x-ui.sidebar>
    <x-slot:brand>
        <img src="/logo.svg" alt="Logo" class="size-8" />
        <span class="[:has([data-collapsed]_&)_&]:hidden font-bold">AppName</span>
    </x-slot:brand>

    <!-- Navigation -->
    <x-ui.navlist>
        <x-ui.navlist.group label="Dashboard">
            <x-ui.navlist.item label="Overview" icon="home" href="/" />
            <x-ui.navlist.item label="Analytics" icon="chart-bar" href="/analytics" />
        </x-ui.navlist.group>

        <x-ui.navlist.group label="Content" collapsable>
            <x-ui.navlist.item label="Posts" icon="document-text" href="/posts" />
            <x-ui.navlist.item label="Media" icon="photo" href="/media" />
        </x-ui.navlist.group>
    </x-ui.navlist>

    <x-ui.sidebar.push />

    <!-- User Profile Footer -->
    <div class="p-4 border-t dark:border-white/5">
        <div class="flex items-center gap-3">
            <img src="{{ auth()->user()->avatar }}" class="size-10 rounded-full" />
            <div class="[:has([data-collapsed]_&)_&]:hidden flex-1 min-w-0">
                <p class="font-medium truncate">{{ auth()->user()->name }}</p>
                <p class="text-sm text-neutral-500 truncate">{{ auth()->user()->email }}</p>
            </div>
        </div>
    </div>
</x-ui.sidebar>
```

### Sidebar with Quick Actions

```blade
<x-ui.sidebar brand="Project Manager">
    <!-- Quick Actions -->
    <div class="p-4 border-b dark:border-white/5">
        <x-ui.button variant="primary" class="w-full">
            <x-ui.icon name="plus" />
            <span class="[:has([data-collapsed]_&)_&]:hidden">New Project</span>
        </x-ui.button>
    </div>

    <!-- Navigation -->
    <x-ui.navlist>
        <x-ui.navlist.item label="Projects" icon="folder" href="/projects" />
        <x-ui.navlist.item label="Team" icon="users" href="/team" />
        <x-ui.navlist.item label="Calendar" icon="calendar" href="/calendar" />
    </x-ui.navlist>

    <x-ui.sidebar.push />

    <!-- Help Section -->
    <div class="p-4 border-t dark:border-white/5">
        <x-ui.navlist>
            <x-ui.navlist.item label="Help & Support" icon="question-mark-circle" href="/help" />
            <x-ui.navlist.item label="Settings" icon="cog" href="/settings" />
        </x-ui.navlist>
    </div>
</x-ui.sidebar>
```

### Conditional Sidebar Content

```blade
<x-ui.sidebar scrollable>
    <x-slot:brand>
        <div class="flex items-center gap-2">
            <x-ui.icon name="cube" class="size-6 text-primary" />
            <span class="[:has([data-collapsed]_&)_&]:hidden font-bold">Admin</span>
        </div>
    </x-slot:brand>

    <x-ui.navlist>
        <!-- Always visible -->
        <x-ui.navlist.item label="Dashboard" icon="home" href="/dashboard" />
        
        <!-- Admin only -->
        @can('admin')
            <x-ui.navlist.group label="Administration">
                <x-ui.navlist.item label="Users" icon="users" href="/admin/users" />
                <x-ui.navlist.item label="Roles" icon="shield-check" href="/admin/roles" />
                <x-ui.navlist.item label="Logs" icon="document-text" href="/admin/logs" />
            </x-ui.navlist.group>
        @endcan

        <!-- Manager and above -->
        @can('manage')
            <x-ui.navlist.group label="Management">
                <x-ui.navlist.item label="Reports" icon="chart-bar" href="/reports" />
                <x-ui.navlist.item label="Analytics" icon="chart-pie" href="/analytics" />
            </x-ui.navlist.group>
        @endcan
    </x-ui.navlist>
</x-ui.sidebar>
```
