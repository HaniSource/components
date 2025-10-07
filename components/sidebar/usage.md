---
name: sidebar component 
---

## Introduction

The `Sidebar` component is a **responsive**, **collapsible** navigation sidebar designed for modern web applications. It features smooth transitions, touch-friendly interactions, and intelligent behavior across mobile, tablet, and desktop viewports.
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
    <x-ui.sidebar>
        <x-slot:brand>
            <x-ui.brand  
                name="Sheaf UI"
                href="/test"
            >
                <x-slot:logo>
                        <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 100 100"
                        class="size-5">
                        <rect x="15" y="10" width="80" height="15" fill="currentColor" rx="5" ry="0" />
                        <rect x="15" y="30" width="60" height="15" fill="currentColor" />
                        <rect x="15" y="50" width="30" height="15" fill="currentColor" />
                        <rect x="15" y="55" width="10" height="30" fill="currentColor" />
                    </svg>
                </x-slot:logo>
            </x-ui.brand>
        </x-slot:brand>

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

### manage brand on the sidebar
the best way to manage your brand on the sidebar is to use the [brand component](/docs/components/brand) then pass your logo name to the name prop, and the logo to `<slot:logo>`, so when the sidebar is expanded the full name will be shown,

```blade
<x-ui.sidebar>
    <x-slot:brand>
        <x-ui.brand  
            name="Sheaf UI"
            href="#"
        >
            <x-slot:logo>
                    <svg xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 100 100"
                    class="size-5">
                    <rect x="15" y="10" width="80" height="15" fill="currentColor" rx="5" ry="0" />
                    <rect x="15" y="30" width="60" height="15" fill="currentColor" />
                    <rect x="15" y="50" width="30" height="15" fill="currentColor" />
                    <rect x="15" y="55" width="10" height="30" fill="currentColor" />
                </svg>
            </x-slot:logo>
        </x-ui.brand>
    </x-slot:brand>

    <x-ui.navlist>
        <!-- Navigation items -->
    </x-ui.navlist>
</x-ui.sidebar>
```
if your logo doesn't have the pattern of logo svg and raw text name, you can have full control over the state of the sidebar, let's suppose you have big logo you want to show when the sidebar is expanded, and a logo variant collapsed state this is how you can manage this state
```blade
<x-ui.sidebar>
    <x-slot:brand>
        <x-long-logo class="[:not(:has([data-collapsed]_&))_&]:inline-flex [:has([data-collapsed]_&)_&]:hidden"/>
        <x-short-logo  class="[:not(:has([data-collapsed]_&))_&]:hidden [:has([data-collapsed]_&)_&]:inline-flex"/>
    </x-slot:brand>

    <x-ui.navlist>
        <!-- Navigation items -->
    </x-ui.navlist>
</x-ui.sidebar>
```

this means when the sidebar the sidebar is expanded show the `<x-long-logo />` logo, otherwise shows the `<x-short-logo />` logo   




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


## Component Structure

The sidebar system is built with multiple components working together:

- **Layout Container**: `<x-ui.layout>` - The root grid container managing responsive behavior
- **Sidebar**: `<x-ui.sidebar>` - The sidebar navigation area
- **Sidebar Brand**: Uses `brand` prop or `brand` slot for header content
- **Sidebar Toggle**: `<x-ui.sidebar.toggle>` - Collapse/expand button (internal, auto-included)
- **Sidebar Push**: `<x-ui.sidebar.push>` - Spacer to push content to bottom
- **Main Content**: `<x-ui.layout.main>` - The primary content area

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
