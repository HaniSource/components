# Adding Dark Mode

Fluxtor includes a comprehensive dark mode system that automatically detects user preferences, prevents flickering, and provides smooth theme transitions. The implementation uses Alpine.js for state management and Tailwind CSS for styling.

## Implementation Overview

The dark mode system integrates seamlessly with Fluxtor's theme-switcher component, which handles all user interactions and theme management automatically. The component fires `theme-changed` events that the theme switcher script listens to, providing a complete theming solution.

## Step 1: Theme Switcher Setup

Create the theme switcher functionality that handles theme detection, storage, and switching:

```javascript
// resources/js/theme-switcher.js
export default () => {
    // Get initial theme from localStorage or default to system
    const theme = localStorage.getItem("theme") ?? "system";
    
    // Initialize Alpine store with current theme
    window.Alpine.store(
        "theme",
        theme === "dark" ||
            (theme === "system" &&
                window.matchMedia("(prefers-color-scheme: dark)").matches)
            ? "dark"
            : "light"
    );

    // Listen for manual theme changes
    window.addEventListener("theme-changed", (event) => {
        let theme = event.detail;
        
        // Persist theme preference
        localStorage.setItem("theme", theme);
        
        // Handle system theme detection
        if (theme === "system") {
            theme = window.matchMedia("(prefers-color-scheme: dark)").matches
                ? "dark"
                : "light";
        }
        
        // Update Alpine store
        window.Alpine.store("theme", theme);
    });

    // Listen for system theme changes
    window
        .matchMedia("(prefers-color-scheme: dark)")
        .addEventListener("change", (event) => {
            // Only update if user has system preference selected
            if (localStorage.getItem("theme") === "system") {
                window.Alpine.store("theme", event.matches ? "dark" : "light");
            }
        });

    // React to theme changes and update DOM
    window.Alpine.effect(() => {
        const theme = window.Alpine.store("theme");
        
        theme === "dark"
            ? document.documentElement.classList.add("dark")
            : document.documentElement.classList.remove("dark");
    });
};
```

## Step 2: Register the Theme Switcher

Register the theme switcher when Alpine.js initializes:

```javascript
// resources/js/app.js
import themeSwitcher from './theme-switcher.js';

// Register theme switcher with Alpine
document.addEventListener("alpine:init", themeSwitcher);
```

## Step 3: Prevent Flickering

Add flicker prevention scripts directly in your HTML head to ensure themes load before content renders:

```html
<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Your App {{ isset($title) ? '| ' . $title : '' }}</title>
    
    @vite(['resources/css/app.css'])
    
    <script>
        // Load dark mode before page renders to prevent flicker
        const loadDarkMode = () => {
            const theme = localStorage.getItem('theme') ?? 'system'
            
            if (
                theme === 'dark' ||
                (theme === 'system' &&
                    window.matchMedia('(prefers-color-scheme: dark)')
                    .matches)
            ) {
                document.documentElement.classList.add('dark')
            }
        }
        
        // Additional utility for sidebar scroll persistence
        const manageSidebar = () => {
            const sidebar = document.querySelector("#sidebar");
            
            if (sidebar) {
                const savedScroll = sessionStorage.getItem("sidebarScroll");
                if (savedScroll !== null) {
                    sidebar.scrollTop = parseInt(savedScroll, 10);
                }
                
                window.addEventListener("beforeunload", function() {
                    sessionStorage.setItem("sidebarScroll", sidebar.scrollTop);
                });
            }
        }
        
        // Initialize on page load
        loadDarkMode();
        
        // Reinitialize after Livewire navigation
        document.addEventListener('livewire:navigated', function() {
            manageSidebar();
            loadDarkMode();
        });
    </script>
</head>

<body class="bg-gray-100 dark:bg-black text-gray-800 dark:text-white">
    {{ $slot }}
    
    @livewireScriptConfig
    @vite(['resources/js/app.js'])
    
    <!-- Ensure dark mode is applied after scripts load -->
    <script>
        loadDarkMode()
    </script>
</body>
</html>
```

## Step 4: Initialize Theme Switcher

Initialize the Fluxtor theme system using the CLI:

```bash
php artisan fluxtor:init
```

This command sets up the necessary JavaScript integration and ensures the theme-switcher component works properly.

## Step 5: Add Theme Switcher Component

Fluxtor includes a comprehensive theme-switcher component with multiple variants. Add it to your layout or navigation:

```blade
{{-- Basic dropdown theme switcher --}}
<x-ui.theme-switcher variant="dropdown" />

{{-- Stacked toggle variant --}}
<x-ui.theme-switcher variant="stacked" />

{{-- Inline buttons variant --}}
<x-ui.theme-switcher variant="inline" />
```

### Theme Switcher Variants

The component supports three different layouts:

**Dropdown Variant (default)**
```blade
<x-ui.theme-switcher variant="dropdown" />
```
Displays the current theme icon as a button that opens a dropdown menu with all theme options.

**Stacked Variant**
```blade
<x-ui.theme-switcher variant="stacked" />
```
Shows a simple toggle button that switches between dark/light themes, automatically handling system preference.

**Inline Variant**
```blade
<x-ui.theme-switcher variant="inline" />
```
Displays all three theme options (light, dark, system) as inline buttons.

### Customization Options

You can customize the icons and styling:

```blade
<x-ui.theme-switcher
    variant="stacked"
    dark-icon="moon"
    light-icon="sun"
    system-icon="computer-desktop"
    icon-variant="outline"
/>
```

## Step 6: Configure Tailwind CSS

Ensure your Tailwind configuration supports dark mode:

```javascript
// tailwind.config.js
module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: 'class', // Enable class-based dark mode
    theme: {
        extend: {
            colors: {
                // Define your custom dark mode colors
                gray: {
                    50: '#f9fafb',
                    // ... other gray shades
                    900: '#111827',
                    950: '#030712',
                }
            }
        },
    },
    plugins: [],
}
```

## Step 7: Style Components for Dark Mode

Apply dark mode styles to your Fluxtor components:

```blade
{{-- Example: Button component with dark mode --}}
<button {{ $attributes->merge([
    'class' => '
        px-4 py-2 rounded-lg font-medium transition-colors
        bg-blue-600 hover:bg-blue-700 text-white
        dark:bg-blue-500 dark:hover:bg-blue-600
        focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2
        dark:focus:ring-offset-gray-900
    '
]) }}>
    {{ $slot }}
</button>
```

## Component Integration

| Prop Name      | Type   | Default            | Description                                   |
| -------------- | ------ | ------------------ | --------------------------------------------- |
| `variant`      | string | `dropdown`         | Layout style: `dropdown`, `stacked`, `inline` |
| `dark-icon`    | string | `moon`             | Icon name for dark theme                      |
| `light-icon`   | string | `sun`              | Icon name for light theme                     |
| `system-icon`  | string | `computer-desktop` | Icon name for system theme                    |
| `icon-variant` | string | `mini`             | Variant style for icons                       |

The theme-switcher component automatically handles:
- Theme persistence in localStorage
- System preference detection
- Smooth transitions between themes
- Accessibility features
- Event dispatching to update the global theme state

## Best Practices

### Component Styling
Always provide dark mode variants for your components:

```blade
<div class="
    bg-white dark:bg-gray-900 
    text-gray-900 dark:text-white
    border border-gray-200 dark:border-gray-700
">
    Content
</div>
```

### Testing Themes
Test your components in all three theme modes:
- Light mode
- Dark mode  
- System preference (both light and dark)

### Performance
The theme system is optimized for performance:
- Minimal JavaScript footprint
- No layout shifts or flickering
- Efficient DOM updates using Alpine's reactivity

## Troubleshooting

### Theme Not Persisting
Ensure localStorage is available and not blocked by privacy settings.

### Flickering on Load
Make sure the flicker prevention script runs before any content renders.

### System Theme Not Detected
Verify that the `prefers-color-scheme` media query is supported in your target browsers.

## Advanced Usage

### Custom Theme Variants
Extend the system to support custom themes:

```javascript
// Add custom theme support
const themes = ['light', 'dark', 'system', 'purple', 'green'];
```

### Theme Transitions
Add smooth transitions between themes:

```css
/* Add to your CSS */
* {
    transition: background-color 0.2s ease, border-color 0.2s ease;
}
```