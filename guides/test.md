# Fluxtor CLI Documentation

The Fluxtor CLI streamlines component installation, theme management, and project setup to accelerate your Laravel development workflow. It provides a seamless way to integrate beautiful, customizable UI components directly into your Laravel project.

## Quick Start

```bash
# Install the CLI
composer require fluxtor/cli

# Initialize your project
php artisan fluxtor:init

# Install your first component
php artisan fluxtor:install button
```

## Installation & Requirements

Install the Fluxtor CLI package in your Laravel project using Composer:

```bash
composer require fluxtor/cli
```

**System Requirements:**

- **Laravel** 10.0 or higher
- **PHP** 8.1 or higher  
- **Tailwind CSS** 4.0 or higher
- **Alpine.js** (auto-installed during initialization)

**Recommended Setup:**
- Node.js 16+ for asset compilation
- Laravel Mix or Vite for build process

---

## Getting Started

### Project Initialization

After installing the CLI, initialize Fluxtor to set up all required dependencies and configurations:

```bash
php artisan fluxtor:init
```

This is a **one-time setup command** that prepares your Laravel project for Fluxtor components.

#### What the Initialization Does

The `fluxtor:init` command transforms your Laravel project by:

**🎨 CSS Theme System**
- Installs CSS custom properties for consistent theming
- Adds utility classes for component styling
- Sets up CSS variable management

**🌙 Dark Mode Support**
- Configures automatic theme switching
- Integrates with Alpine.js for reactive updates
- Provides theme persistence across sessions

**⚡ JavaScript Utilities**
- Installs Alpine.js if not present
- Adds reactive theme management system
- Creates utility functions for component interactions

**📦 Dependencies & Structure**
- Installs required packages automatically
- Creates organized directory structure
- Updates your existing CSS and JS files

#### Interactive Setup Process

The initialization command guides you through configuration:

```bash
php artisan fluxtor:init
```

**Step 1: Dark Mode Configuration**
```
? Enable dark mode support? (Y/n)
```
Choose whether to include dark theme switching capabilities.

**Step 2: Icon Library**
```
? Install Phosphor Icons library? (Y/n)
```
Optionally install the comprehensive Phosphor icon set.

**Step 3: File Locations**
```
? CSS file location: (resources/css/app.css)
? Theme file name: (theme.css)
```
Customize where theme files should be created.

**Step 4: Dependencies**
```
? Install missing packages automatically? (Y/n)
```
Let Fluxtor manage required npm/composer dependencies.

#### Command Options

**Skip Interactive Prompts**
```bash
php artisan fluxtor:init --skip-prompts
```
Uses default settings for all configuration options.

**Include All Features**
```bash
php artisan fluxtor:init --with-dark-mode --with-phosphor
```
Enables dark mode and installs Phosphor icons automatically.

**Force Overwrite**
```bash
php artisan fluxtor:init --force
```
Overwrites existing files without confirmation prompts.

**Custom File Locations**
```bash
php artisan fluxtor:init --css-file=styles/main.css --theme-file=custom-theme
```
Specify custom locations for generated files.

**Complete Example with Options**
```bash
php artisan fluxtor:init \
  --with-dark-mode \
  --with-phosphor \
  --css-file=resources/css/app.css \
  --theme-file=fluxtor-theme \
  --skip-prompts
```

#### Generated File Structure

After initialization, your project will include:

```
resources/
├── css/
│   ├── app.css                 # Updated with Fluxtor imports
│   └── theme.css              # CSS custom properties & variables
└── js/
    ├── app.js                 # Updated with Alpine.js imports
    └── fluxtor/
        ├── utils.js           # Helper functions & utilities
        └── globals/
            └── theme.js       # Dark mode management system
```

#### Including Assets in Your Layout

**Critical:** Update your main layout file to include the compiled assets:

```blade
{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    
    {{-- Include Fluxtor CSS --}}
    @vite(['resources/css/app.css'])
</head>
<body>
    {{-- Your app content --}}
    <main>
        @yield('content')
    </main>
    
    {{-- Include Fluxtor JavaScript --}}
    @vite(['resources/js/app.js'])
</body>
</html>
```

**For Laravel Mix users:**
```blade
{{-- Replace @vite() with mix() --}}
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<script src="{{ mix('js/app.js') }}"></script>
```

---

## Authentication & Account Management

Fluxtor offers both free and premium components. Authentication is required only for premium features.

### Login to Your Account

Authenticate with your Fluxtor account to access premium components:

```bash
php artisan fluxtor:login
```

**Interactive Login Process:**
```
? Email: your-email@example.com
? Password: ********
✓ Authentication successful!
✓ Premium components now available
```

**What Authentication Enables:**
- Access to premium component library
- Priority support and updates  
- Advanced customization options
- Early access to new components

### Check Current Account Status

View your current authentication status:

```bash
php artisan fluxtor:whoami
```

**Example Output:**
```
✓ Authenticated as: john.doe@example.com
✓ Account Type: Premium
✓ Components Available: 47 free, 23 premium
```

**For Non-Authenticated Users:**
```
ℹ Not currently authenticated
ℹ Run 'php artisan fluxtor:login' to access premium features
ℹ Free components: 47 available
```

### Logout from Account

Remove stored authentication credentials:

```bash
php artisan fluxtor:logout
```

**Confirmation Output:**
```
✓ Successfully logged out
ℹ Premium components are no longer available
ℹ You can still install free components
```

---

## Component Management

### Discovering Available Components

Browse the complete Fluxtor component library:

```bash
php artisan fluxtor:list
```

**Example Output:**
```
Free Components:
┌─────────────────┬─────────────┬─────────────────────────────────┐
│ Name            │ Category    │ Description                     │
├─────────────────┼─────────────┼─────────────────────────────────┤
│ button          │ Form        │ Customizable button component   │
│ card            │ Layout      │ Flexible card container         │
│ modal           │ Overlay     │ Accessible modal dialog         │
│ input           │ Form        │ Styled input with validation    │
└─────────────────┴─────────────┴─────────────────────────────────┘

Premium Components:
┌─────────────────┬─────────────┬─────────────────────────────────┐
│ Name            │ Category    │ Description                     │
├─────────────────┼─────────────┼─────────────────────────────────┤
│ data-table      │ Data        │ Advanced sortable data table   │
│ rich-editor     │ Form        │ WYSIWYG content editor          │
│ chart           │ Data        │ Interactive chart components    │
└─────────────────┴─────────────┴─────────────────────────────────┘
```

#### Filtering Components

**List Only Free Components**
```bash
php artisan fluxtor:list --type=free
```

**List Only Premium Components**
```bash
php artisan fluxtor:list --type=premium
```

**Filter by Category**
```bash
php artisan fluxtor:list --category=form
php artisan fluxtor:list --category=layout
php artisan fluxtor:list --category=data
```

**Search Components**
```bash
php artisan fluxtor:list --search=button
php artisan fluxtor:list --search=modal
```

### Installing Components

Install components directly into your project with all dependencies:

```bash
php artisan fluxtor:install [component-name]
```

#### Basic Installation Examples

**Install a Button Component**
```bash
php artisan fluxtor:install button
```

**Install a Modal Component**
```bash
php artisan fluxtor:install modal
```

**Install Multiple Components**
```bash
php artisan fluxtor:install button card modal input
```

#### Installation Process

When you install a component, Fluxtor:

1. **Downloads Component Files**
   - Blade component view: `resources/views/components/ui/button.blade.php`
   - Component class (if needed): `app/View/Components/Ui/Button.php`

2. **Installs Dependencies**
   - Required internal components (automatically)
   - Required external packages (with confirmation)

3. **Updates Project Files**
   - CSS imports added to theme files
   - JavaScript utilities registered
   - Alpine.js directives included

4. **Provides Documentation**
   - Usage examples in terminal
   - Link to online documentation
   - Code snippets for immediate use

#### Installation Options

**Force Overwrite Existing Components**
```bash
php artisan fluxtor:install button --force
```
Replaces existing component files without confirmation.

**Preview Installation (Dry Run)**
```bash
php artisan fluxtor:install button --dry-run
```
Shows what files would be created/modified without making changes.

**Install with All Dependencies**
```bash
php artisan fluxtor:install button --internal-deps --external-deps
```
- `--internal-deps`: Install required Fluxtor components
- `--external-deps`: Install required npm/composer packages

**Skip Dependency Installation**
```bash
php artisan fluxtor:install button --skip-deps
```
Installs only the main component, skipping dependencies.

#### Example Installation Output

```bash
php artisan fluxtor:install button

Installing button component...

✓ Downloaded button.blade.php
✓ Created component class Button.php  
✓ Updated theme.css with button styles
✓ Added Alpine.js utilities

Dependencies installed:
  ✓ icon (internal dependency)
  ✓ @headlessui/vue (external dependency)

Component ready! Usage example:

<x-ui.button variant="primary" size="lg">
    Click Me
</x-ui.button>

📚 Full documentation: https://fluxtor.dev/docs/components/button
```

### Using Installed Components

After installation, components are immediately available in your Blade templates:

#### Basic Component Usage

**Button Component**
```blade
{{-- Basic button --}}
<x-ui.button>Click Me</x-ui.button>

{{-- Button with variants --}}
<x-ui.button variant="primary">Primary Button</x-ui.button>
<x-ui.button variant="secondary">Secondary Button</x-ui.button>
<x-ui.button variant="destructive">Delete</x-ui.button>

{{-- Button sizes --}}
<x-ui.button size="sm">Small</x-ui.button>
<x-ui.button size="lg">Large</x-ui.button>
```

**Card Component**
```blade
<x-ui.card>
    <x-ui.card.header>
        <h3>Card Title</h3>
    </x-ui.card.header>
    
    <x-ui.card.content>
        <p>Card content goes here.</p>
    </x-ui.card.content>
    
    <x-ui.card.footer>
        <x-ui.button>Action</x-ui.button>
    </x-ui.card.footer>
</x-ui.card>
```

**Modal Component**
```blade
<x-ui.modal 
    x-model="showModal"
    title="Confirmation"
    max-width="md"
>
    <p>Are you sure you want to continue?</p>
    
    <x-slot:footer>
        <x-ui.button variant="secondary" @click="showModal = false">
            Cancel
        </x-ui.button>
        <x-ui.button variant="primary" @click="confirm()">
            Confirm
        </x-ui.button>
    </x-slot:footer>
</x-ui.modal>
```

---

## Advanced Usage

### Component Customization

Since components live in your codebase, you have complete control over customization:

**Modifying Component Styles**
```bash
# Components are in your project - edit directly
resources/views/components/ui/button.blade.php
```

**Extending Component Functionality**
```php
<?php
// app/View/Components/Ui/Button.php
namespace App\View\Components\Ui;

use Illuminate\View\Component;

class Button extends Component
{
    public function __construct(
        public string $variant = 'primary',
        public string $size = 'md',
        public ?string $href = null,
        // Add your custom properties
        public bool $loading = false,
    ) {}

    public function render()
    {
        return view('components.ui.button');
    }
}
```

### Batch Operations

**Install Multiple Related Components**
```bash
# Install all form components
php artisan fluxtor:install button input select textarea checkbox radio

# Install layout components
php artisan fluxtor:install card modal dialog drawer
```

**Update All Components**
```bash
# Check for component updates
php artisan fluxtor:update --check

# Update all components
php artisan fluxtor:update --all

# Update specific components
php artisan fluxtor:update button card modal
```

### Development Workflow Integration

**Laravel Sail Integration**
```bash
# Run commands through Sail
./vendor/bin/sail artisan fluxtor:install button
```

**CI/CD Pipeline Integration**
```yaml
# .github/workflows/deploy.yml
- name: Install Fluxtor Components
  run: |
    php artisan fluxtor:login --email=${{ secrets.FLUXTOR_EMAIL }} --password=${{ secrets.FLUXTOR_PASSWORD }}
    php artisan fluxtor:install button card modal --skip-prompts
```

---

## Troubleshooting

### Common Issues

**Authentication Problems**
```bash
# Clear authentication cache
php artisan fluxtor:logout
php artisan fluxtor:login

# Check authentication status
php artisan fluxtor:whoami
```

**Component Installation Failures**
```bash
# Force reinstall with dependencies
php artisan fluxtor:install button --force --internal-deps --external-deps

# Check for conflicts
php artisan fluxtor:install button --dry-run
```

**Missing Dependencies**
```bash
# Manually install dependencies
npm install @headlessui/vue @heroicons/vue
composer require wireui/wireui

# Reinstall with dependencies
php artisan fluxtor:install button --external-deps
```

### Getting Help

**Check Component Documentation**
- Online docs: `https://fluxtor.dev/docs/components/{component-name}`
- Component examples: `https://fluxtor.dev/examples/{component-name}`

**Community Support**
- GitHub Issues: `https://github.com/fluxtor/cli/issues`
- Discord Community: `https://discord.gg/fluxtor`
- Stack Overflow: Tag `fluxtor`

**Debug Mode**
```bash
# Run commands with verbose output
php artisan fluxtor:install button --verbose

# Enable debug logging
php artisan fluxtor:install button --debug
```

---

## Migration Guide

### Upgrading from Previous Versions

**Backup Before Upgrading**
```bash
# Backup your components
cp -r resources/views/components/ui/ backup/components/
cp resources/css/theme.css backup/
```

**Update CLI Package**
```bash
composer update fluxtor/cli
```

**Migrate Components**
```bash
# Check for breaking changes
php artisan fluxtor:migrate --check

# Run automatic migration
php artisan fluxtor:migrate

# Manually resolve conflicts
php artisan fluxtor:migrate --interactive
```

### Best Practices

1. **Version Control**: Always commit your project before running Fluxtor commands
2. **Component Organization**: Keep components in the default `ui/` namespace for consistency
3. **Customization**: Document your customizations for team members
4. **Dependencies**: Regularly update both Fluxtor and its dependencies
5. **Testing**: Test components after installation in your specific use cases

---

## Configuration

### Environment Variables

```bash
# .env file
FLUXTOR_API_URL=https://api.fluxtor.dev
FLUXTOR_TIMEOUT=30
FLUXTOR_CACHE_COMPONENTS=true
```

### Configuration File

Publish the configuration file for advanced customization:

```bash
php artisan vendor:publish --provider="Fluxtor\Cli\FluxeServiceProvider" --tag="config"
```

**config/fluxtor.php**
```php
<?php

return [
    'api' => [
        'url' => env('FLUXTOR_API_URL', 'https://api.fluxtor.dev'),
        'timeout' => env('FLUXTOR_TIMEOUT', 30),
    ],
    
    'paths' => [
        'components' => 'resources/views/components/ui',
        'classes' => 'app/View/Components/Ui',
        'css' => 'resources/css',
        'js' => 'resources/js',
    ],
    
    'cache' => [
        'enabled' => env('FLUXTOR_CACHE_COMPONENTS', true),
        'ttl' => 3600, // 1 hour
    ],
];
```