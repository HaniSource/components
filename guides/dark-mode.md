# Adding Dark Mode

Fluxtor includes a comprehensive dark mode system that automatically detects user preferences, prevents flickering, and provides smooth theme transitions. The implementation uses Alpine.js for state management and Tailwind CSS for styling.


## Using CLI 
when using our [CLI](./docs/cli) it do most of work for you, but there is some things you must do manually to make your theming system robust, and prevent any flickering on first load page.

when running 

```sh
php artisan fluxtor:init
```

it add ``resources/js/components/theme-switcher.js`` and register that component, but still needs so work to do manually, 

> here's full implementation of adding dark mode to your app 

## Implementation Overview

The dark mode system integrates seamlessly with Fluxtor's ``theme-switcher`` component, which handles all user interactions and theme management automatically. The component fires `theme-changed` events that the theme switcher script listens to, providing a complete theming solution.

## Step 1: Theme Switcher Setup

Create the theme switcher functionality that handles theme detection, storage, and switching:

```javascript
// resources/js/components/theme-switcher.js
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
import themeSwitcher from './components/theme-switcher.js';

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
                
        // Initialize on page load
        loadDarkMode();
        
        // Reinitialize after Livewire navigation (for spa mode)
        document.addEventListener('livewire:navigated', function() {
            loadDarkMode();
        });
    </script>
</head>

<body class="bg-gray-100 dark:bg-black text-gray-800 dark:text-white">
    {{ $slot }}
    
    @livewireScriptConfig
    @vite(['resources/js/app.js'])
    
    <!-- Ensure dark mode is applied after scripts load, this is also required to prevent flickering when many livewire component changes indepently -->
    <script>
        loadDarkMode()
    </script>
</body>
</html>
```
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
> go the official docs of the [theme switcher component](./docs/theme-switcher)

### Testing Themes
Test your components in all three theme modes:
- Light mode
- Dark mode  
- System preference (both light and dark)

## Troubleshooting

### Theme Not Persisting
Ensure localStorage is available and not blocked by privacy settings.

### Flickering on Load
Make sure the flicker prevention script runs before any content renders.

### System Theme Not Detected
Verify that the `prefers-color-scheme` media query is supported in your target browsers.
