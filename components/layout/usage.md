---
name: Layout Component
---

## Introduction

The Layout component is the foundation of Sheaf UI's layout system. It orchestrates the entire application structure by managing viewport detection, sidebar collapse state, and coordinating child components (Sidebar, Header, Main) across different screen sizes.

Think of it as the conductor of an orchestra, it doesn't make much noise itself, but it ensures every component works together harmoniously.

### Installation

```bash
php artisan sheaf:install layout
```

## Basic Usage

The Layout component wraps your entire application structure:

```blade
<head>
<!-- vite.. -->
</head>
<body>
<x-ui.layout>
    <x-ui.sidebar>
        <!-- Sidebar content -->
    </x-ui.sidebar>
    
    <x-ui.layout.main>
        <x-ui.layout.header>
            <!-- Header content -->
        </x-ui.layout.header>
        
        <!-- Page content -->
        <div class="p-6">
            {{ $slot }}
        </div>
    </x-ui.layout.main>
</x-ui.layout>
</body>
```
> this is layout isn't the master layout, to use it you need to wrap it with a base layout like `<x-layouts.base>...<x-layouts.base> who has the javascript and css imports `


## Variants

### Sidebar-Main Layout

The classic dashboard pattern with a prominent sidebar containing primary navigation. The sidebar spans the full height and can collapse to icon-only mode.

#### Usage

```blade
<x-ui.layout>
    <x-ui.sidebar>
        <x-slot:brand>
            <x-ui.brand name="Your App" href="/" />
        </x-slot:brand>
        
        <x-ui.navlist>
            <x-ui.navlist.item label="Dashboard" icon="home" href="/" />
            <x-ui.navlist.item label="Settings" icon="cog-6-tooth" href="/settings" />
        </x-ui.navlist>
    </x-ui.sidebar>
    
    <x-ui.layout.main>
        <x-ui.layout.header>
            <x-ui.navbar>
                <x-ui.navbar.item label="Home" icon="home" />
            </x-ui.navbar>
            
            <!-- User menu, search, etc. -->
        </x-ui.layout.header>
        
        <!-- Your page content -->
        <div class="p-6">
            {{ $slot }}
        </div>
    </x-ui.layout.main>
</x-ui.layout>
```

#### Visual Example

@blade
<x-md.image                                                            
    src="/images/demos/light/sidebar-main.png"                                    
    dark-src="/images/demos/dark/sidebar-main.png"                                    
    alt="Sidebar-main layout showing prominent sidebar navigation"                                               
    caption="Sidebar-main layout: Navigation-first dashboard pattern"                                   
/>
@endblade

@blade
<x-md.cta                                                            
    href="/demos/sidebar"                                    
    label="Try Sidebar-Main Layout in Action"
    variant="slide"                                               
/>
@endblade

### Header-Sidebar Layout

An application-style layout with a top header containing branding and primary actions, with a secondary sidebar for navigation. The header spans the full width above both the sidebar and main content.


#### Usage

```blade
<x-ui.layout variant="header-sidebar">
    <x-ui.layout.header>
        <x-slot:brand>
            <x-ui.brand name="Your App" href="/" />
        </x-slot:brand>
        
        <x-ui.navbar class="flex-1">
            <x-ui.navbar.item label="Home" icon="home" />
            <x-ui.navbar.item label="Products" icon="shopping-bag" />
        </x-ui.navbar>
        
        <!-- User menu, notifications, etc. -->
        <div class="ml-auto flex items-center gap-4">
            <x-ui.avatar src="/user.png" />
        </div>
    </x-ui.layout.header>
    
    <x-ui.sidebar>
        <x-ui.navlist>
            <x-ui.navlist.item label="Dashboard" icon="home" href="/" />
            <x-ui.navlist.group label="Content">
                <x-ui.navlist.item label="Posts" icon="document" />
                <x-ui.navlist.item label="Pages" icon="folder" />
            </x-ui.navlist.group>
        </x-ui.navlist>
    </x-ui.sidebar>

    <x-ui.layout.main>
        <!-- Your page content -->
        <div class="p-6">
            {{ $slot }}
        </div>
    </x-ui.layout.main>
</x-ui.layout>
```

#### Visual Example

@blade
<x-md.image                                                            
    src="/images/demos/light/header-sidebar.png"                                    
    dark-src="/images/demos/dark/header-sidebar.png"                                    
    alt="Header-sidebar layout with top header and secondary sidebar"                                               
    caption="Header-sidebar layout: Application-style with prominent header"                                   
/>
@endblade

@blade
<x-md.cta                                                            
    href="/demos/sidebar/layout-header-sidebar"                                    
    label="Try Header-Sidebar Layout in Action"
    variant="slide"                                               
/>
@endblade

---


### Collapsible Prop

Controls whether users can collapse the sidebar to icon-only mode on desktop:

```blade
<!-- Collapsible sidebar (default) -->
<x-ui.layout :collapsible="true">
    <!-- ... -->
</x-ui.layout>

<!-- Fixed-width sidebar -->
<x-ui.layout :collapsible="false">
    <!-- ... -->
</x-ui.layout>
```

**Note:** This only affects desktop (≥1024px). Mobile and tablet behaviors are fixed.



---

## Responsive Behavior

The Layout component automatically adapts across three breakpoints:

### 📱 Mobile (< 768px)

**Sidebar:**
- Overlay mode (slides in from left)
- Hidden by default
- Toggle with hamburger button
- Backdrop overlay when open

**State:**
- Uses `sidebarOpen` (boolean)
- Not persisted (resets on page load)

### 📱 Tablet (768px - 1024px)

**Sidebar:**
- Always collapsed (icon-only)
- Visible alongside main content
- Tap to toggle on touch devices
- Hover shows tooltips

**State:**
- Forced `collapsedSidebar: true`
- Prevents expanded state


### 🖥️ Desktop (≥ 1024px)

**Sidebar:**
- Fully collapsible/expandable
- State persists via localStorage
- Smooth width transitions
- Keyboard shortcuts supported

**State:**
- Uses `collapsedSidebar` (boolean)
- Persisted in localStorage as `_x_collapsedSidebar`

## Essentiels CSS Variables

The Layout component exposes CSS variables that child components can use:

| Variable | Default | Collapsed | Description |
|----------|---------|-----------|-------------|
| `--sidebar-width` | `16rem` (256px) | `4rem` (64px) | Sidebar width |
| `--header-height` | `4rem` (64px) | Same | Header height |

to change the values go to desired layout variant (eg,`ui/layout/sidebar-main.blade.php`) and in the top classes you may find something like this 
```php
    $classes = [
        '[--sidebar-width:16rem]',                      
        'data-[collapsed]:[--sidebar-width:4rem]',      
        
        '[--header-height:4rem]',
        
        // 'data-[collapsed]:[--header-height:4rem]',

        'grid',                                        
        'h-screen overflow-hidden',                     
        'min-h-screen text-slate-950 dark:text-slate-50', 
        // more and more classes
    ]
```
here you can tweack the values as needed, `[--sidebar-width:16rem]` tells the width of the sidebar if it not collapsed, when the sidebar is collapsed the ``'data-[collapsed]:[--sidebar-width:4rem]'`` tailwind variant takes place so there one variable and can be changed selon
according to  the sidebar state, the same can be done with the height (we keep the same height for both states but you can change it if you need)

## Data Attributes API

The Layout component sets data attributes that you can use for styling:

| Attribute | Values | When Present |
|-----------|--------|--------------|
| `data-collapsed` | `true` / (absent) | Sidebar is collapsed (desktop only) |
| `data-sidebar-open` | `true` / (absent) | Sidebar overlay is open (mobile only) |
| `data-in-mobile` | `true` / (absent) | Viewport is mobile (< 768px) |
| `data-in-tablet` | `true` / (absent) | Viewport is tablet (768-1024px) |

using data-attributes give the best and the cleaneset way to style complex element, as well as it bridge the gap between **tailwindcss**,**alpinejs** and **vanilla js**, (we need vanilla js because alpines hit's its limits in some cases) 


### Using DATA Attributes API to style child component
you can these data attributes as custom tailwind variants like what you do with focus and hover ...


- `[:has([data-collapsed]_&)_&]:*`: this can be used to add style when the sidebar is collapsed,(adding more to the container: `[:has([data-collapsed]_&)_&]:p-4`).

- `[:not(:has([data-collapsed]_&))_&]:*`: adding styles when the sidebar is expanded.  

or in raw css like so
```css
/* Style when sidebar is collapsed */
[data-slot="layout"][data-collapsed] .some-element {
    margin-left: 4rem;
}

/* Style when on mobile */
[data-slot="layout"][data-in-mobile] .desktop-only {
    display: none;
}

/* Style when sidebar is open on mobile */
[data-slot="layout"][data-sidebar-open] {
    overflow: hidden; /* Prevent body scroll */
}
```


## Alpine.js State

The Layout component manages several Alpine.js reactive properties:

```javascript
{
    // Sidebar collapse state (desktop)
    collapsedSidebar: false,  // Persisted via $persist
    
    // Sidebar open state (mobile)
    sidebarOpen: false,       // Not persisted
    
    // Viewport detection
    isMobile: false,          // < 768px
    isTablet: false,          // 768-1024px
    
    // Methods
    toggle(),                 // Toggle sidebar (context-aware)
    closeSidebar(),          // Close mobile sidebar
    updateBreakpoints()      // Detect viewport changes
}
```

### Accessing State from Child Components

Child components can access parent state via Alpine's magic properties:

```blade
<!-- In a child component -->
<div x-show="!$data.collapsedSidebar">
    This shows when sidebar is expanded
</div>
```

---

## Main Component

The `<x-ui.layout.main>` component wraps your page content and assigns it to the grid area:

### Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| (none) | - | - | Accepts all standard HTML attributes |

### Features

- Assigned to `grid-area: main`
- Vertically scrollable (`overflow-y-auto`)
- Flexbox column layout for children
- Smart padding: No padding if contains a header

### Usage

```blade
<x-ui.layout.main>
    <!-- With header: no padding on wrapper -->
    <x-ui.layout.header>
        <!-- Header content -->
    </x-ui.layout.header>
    
    <!-- Your content with manual padding -->
    <div class="p-6">
        @yield('content')
    </div>
</x-ui.layout.main>
```

```blade
<x-ui.layout.main>
    <!-- Without header: automatic padding -->
    @yield('content')
</x-ui.layout.main>
```

### Keyboard Shortcuts

| Key | Action |
|-----|--------|
| `ESC` | Close mobile sidebar overlay |


## How It Works

The Layout component is actually a **component dispatcher** that:

1. **Selects the variant** based on the `variant` prop
2. **Renders the appropriate layout** (`sidebar-main` or `header-sidebar`)
3. **Includes the runtime script** to prevent Alpine.js flicker

### Component Structure

```
ui/layout/
├── index.blade.php          # Main dispatcher
├── main.blade.php           # Main content area wrapper
├── runtime.blade.php        # Pre-hydration script
└── variant/
    ├── sidebar-main.blade.php
    └── header-sidebar.blade.php
```

### The Runtime Script

The layout includes a clever pre-hydration script that solves a common Alpine.js problem:

**The Problem:** When Alpine.js initializes, there's a brief moment where the component renders in the wrong state (expanded sidebar when it should be collapsed), causing a visible "flash" or "jump".

**The Solution:** The runtime script runs **before** Alpine initializes and:
- Reads the sidebar collapse state from localStorage (`_x_collapsedSidebar`)
- Detects the current viewport (mobile, tablet, desktop)
- Sets data attributes on the layout immediately
- Alpine then hydrates with the correct state already applied

Result: **Zero flicker, perfect initial render** ✨
