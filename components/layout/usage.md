---
name: Layout Component
---

## Introduction

The Layout component is the foundation of Sheaf UI's layout system. It orchestrates the entire application structure by managing viewport detection, sidebar collapse state, and coordinating child components (Sidebar, Header, Main) across different screen sizes.

Think of it as the conductor of an orchestra—it doesn't make much noise itself, but it ensures every component works together harmoniously.

### Installation

```bash
php artisan sheaf:install layout
```

This installs the layout component along with its required sub-components (main, runtime).

---

## Basic Usage

The Layout component wraps your entire application structure:

```blade
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
            @yield('content')
        </div>
    </x-ui.layout.main>
</x-ui.layout>
```

---

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `variant` | string | `'sidebar-main'` | Layout pattern to use: `sidebar-main` or `header-sidebar` |
| `collapsible` | boolean | `true` | Allow sidebar to collapse on desktop (typo accepted: `collapsable`) |

### Variant Prop

Determines the layout structure:

**`sidebar-main`** (default)
- Sidebar is the primary navigation element
- Header is secondary, inside the main content area
- Best for dashboards and admin panels

**`header-sidebar`**
- Header spans full width at the top
- Sidebar is secondary below the header
- Best for content platforms and marketplaces

```blade
<!-- Sidebar-main variant -->
<x-ui.layout variant="sidebar-main">
    <!-- ... -->
</x-ui.layout>

<!-- Header-sidebar variant -->
<x-ui.layout variant="header-sidebar">
    <!-- ... -->
</x-ui.layout>
```

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

**Grid:**
```css
grid-cols-1
grid-template-areas: 'main'
```

---

### 📱 Tablet (768px - 1024px)

**Sidebar:**
- Always collapsed (icon-only)
- Visible alongside main content
- Tap to toggle on touch devices
- Hover shows tooltips

**State:**
- Forced `collapsedSidebar: true`
- Prevents expanded state

**Grid:**
```css
grid-cols-[var(--sidebar-width) 1fr]
grid-template-areas: 'sidebar main'
```

---

### 🖥️ Desktop (≥ 1024px)

**Sidebar:**
- Fully collapsible/expandable
- State persists via localStorage
- Smooth width transitions
- Keyboard shortcuts supported

**State:**
- Uses `collapsedSidebar` (boolean)
- Persisted in localStorage as `_x_collapsedSidebar`

**Grid:**
```css
/* Expanded */
grid-cols-[16rem 1fr]

/* Collapsed */
grid-cols-[4rem 1fr]
```

---

## CSS Custom Properties

The Layout component exposes CSS variables that child components can use:

| Variable | Default | Collapsed | Description |
|----------|---------|-----------|-------------|
| `--sidebar-width` | `16rem` (256px) | `4rem` (64px) | Sidebar width |
| `--header-height` | `4rem` (64px) | Same | Header height |

### Usage in Child Components

```blade
<!-- Sidebar uses the variable for its width -->
<div style="width: var(--sidebar-width)">...</div>

<!-- Main content accounts for header height -->
<div style="min-height: calc(100vh - var(--header-height))">...</div>
```

You can override these in your CSS:

```css
[data-slot="layout"] {
    --sidebar-width: 20rem; /* Wider sidebar */
    --header-height: 5rem;  /* Taller header */
}

[data-slot="layout"][data-collapsed] {
    --sidebar-width: 3rem; /* Narrower when collapsed */
}
```

---

## Data Attributes API

The Layout component sets data attributes that you can use for styling:

| Attribute | Values | When Present |
|-----------|--------|--------------|
| `data-collapsed` | `true` / (absent) | Sidebar is collapsed (desktop only) |
| `data-sidebar-open` | `true` / (absent) | Sidebar overlay is open (mobile only) |
| `data-in-mobile` | `true` / (absent) | Viewport is mobile (< 768px) |
| `data-in-tablet` | `true` / (absent) | Viewport is tablet (768-1024px) |

### Custom Styling Examples

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

---

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

---

## Examples

### Complete Application Layout

```blade
<x-ui.layout variant="sidebar-main">
    <x-ui.sidebar>
        <x-slot:brand>
            <x-ui.brand name="My App" href="/" />
        </x-slot:brand>
        
        <x-ui.navlist>
            <x-ui.navlist.item label="Dashboard" icon="home" href="/" />
            <x-ui.navlist.item label="Settings" icon="cog" href="/settings" />
        </x-ui.navlist>
    </x-ui.sidebar>
    
    <x-ui.layout.main>
        <x-ui.layout.header>
            <x-ui.sidebar.toggle class="md:hidden" />
            
            <x-ui.navbar class="flex-1">
                <x-ui.navbar.item label="Home" icon="home" />
            </x-ui.navbar>
            
            <div class="ml-auto">
                <x-ui.avatar src="/user.png" />
            </div>
        </x-ui.layout.header>
        
        <div class="p-6">
            <h1>Welcome to My App</h1>
            <p>This is your dashboard.</p>
        </div>
    </x-ui.layout.main>
</x-ui.layout>
```

### Header-Sidebar Variant

```blade
<x-ui.layout variant="header-sidebar">
    <x-ui.layout.header>
        <x-slot:brand>
            <x-ui.brand name="My Platform" />
        </x-slot:brand>
        
        <x-ui.navbar class="flex-1">
            <x-ui.navbar.item label="Home" />
            <x-ui.navbar.item label="Features" />
        </x-ui.navbar>
        
        <x-ui.avatar src="/user.png" />
    </x-ui.layout.header>
    
    <x-ui.sidebar>
        <x-ui.navlist>
            <x-ui.navlist.item label="Dashboard" href="/" />
            <x-ui.navlist.item label="Projects" href="/projects" />
        </x-ui.navlist>
    </x-ui.sidebar>
    
    <x-ui.layout.main>
        <div class="p-6">
            @yield('content')
        </div>
    </x-ui.layout.main>
</x-ui.layout>
```

### Non-Collapsible Sidebar

```blade
<x-ui.layout :collapsible="false">
    <x-ui.sidebar>
        <!-- Sidebar content -->
        <!-- Toggle button will be hidden automatically -->
    </x-ui.sidebar>
    
    <x-ui.layout.main>
        <!-- Main content -->
    </x-ui.layout.main>
</x-ui.layout>
```

---

## Customization

### Override Default Widths

```css
/* In your CSS file */
[data-slot="layout"] {
    --sidebar-width: 18rem;      /* Wider default */
}

[data-slot="layout"][data-collapsed] {
    --sidebar-width: 3.5rem;     /* Custom collapsed width */
}
```

### Custom Breakpoints

While the component uses fixed breakpoints (768px, 1024px), you can override behaviors with CSS:

```css
/* Make tablet behavior start earlier */
@media (max-width: 900px) {
    [data-slot="layout"] {
        /* Your custom styles */
    }
}
```

### Disable Transitions

```css
[data-slot="layout"] * {
    transition: none !important;
}
```

---

## Accessibility

The Layout component includes several accessibility features:

- **Keyboard Navigation:** ESC key closes mobile sidebar
- **Focus Management:** Focus trap when mobile sidebar is open
- **ARIA Labels:** Proper labeling on toggle buttons
- **Screen Reader Support:** Announcements for state changes

### Keyboard Shortcuts

| Key | Action |
|-----|--------|
| `ESC` | Close mobile sidebar overlay |

---

## Performance

### Pre-hydration Script

The runtime script is tiny (~200 bytes minified) and runs synchronously before Alpine loads. This ensures:
- Zero layout shift (CLS score = 0)
- No flicker or flash
- Instant correct state

### State Persistence

The layout uses Alpine's `$persist` magic for efficient localStorage management:
- Automatic serialization/deserialization
- Only writes when state actually changes
- Minimal overhead

---

## Troubleshooting

### Sidebar Flickers on Load

**Problem:** Sidebar briefly shows expanded then collapses  
**Solution:** Ensure the runtime component is included (it's automatic in the layout component)

### State Not Persisting

**Problem:** Sidebar collapse state resets on page reload  
**Solution:** Check that Alpine.js `persist` plugin is loaded:

```html
<script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
```

### Mobile Sidebar Won't Close

**Problem:** Tapping backdrop doesn't close sidebar  
**Solution:** Ensure no other elements are blocking clicks (check z-index stacking)

### Wrong Layout on Tablet

**Problem:** Sidebar isn't collapsed on tablet  
**Solution:** Check that the runtime script is running. Open console and look for "Init layout failed" warnings.

---

## Related Components

@blade
<div class="grid md:grid-cols-2 gap-4 my-8">
    <x-ui.card>
        <x-ui.heading level="h4" size="xs" class="mb-2">Sidebar Component</x-ui.heading>
        <p class="text-sm text-neutral-600 dark:text-neutral-400 mb-4">
            Navigation sidebar that adapts to layout state
        </p>
        <x-md.cta href="/docs/layouts/sidebar" label="View Sidebar Docs" variant="expand" />
    </x-ui.card>
    
    <x-ui.card>
        <x-ui.heading level="h4" size="xs" class="mb-2">Header Component</x-ui.heading>
        <p class="text-sm text-neutral-600 dark:text-neutral-400 mb-4">
            Top bar for branding and actions
        </p>
        <x-md.cta href="/docs/layouts/header" label="View Header Docs" variant="expand" />
    </x-ui.card>
</div>
@endblade

---

## Next Steps

- Learn about [Layout Variants](/docs/layouts/overview#layout-variants) in detail
- Explore [Sidebar Component](/docs/layouts/sidebar) features
- Check out [Common Patterns](/docs/layouts/overview#common-patterns)