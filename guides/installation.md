# Fluxtor CLI Documentation

The CLI tool streamlines component installation, theme management, and project setup to accelerate your Laravel development workflow.

## Installation

Install the Fluxtor CLI package in your Laravel project using Composer:

```bash
composer require fluxtor/cli
```

**Requirements:**

- Laravel 10.0 or higher
- PHP 8.1 or higher
- Alpine.js (auto-installed if not present)
- Tailwindcss 4.0 or higher

## Package Initialization

After installing the CLI, initialize Fluxtor with all required dependencies and configurations:

```bash
php artisan fluxtor:init
```

### What This Command Does

The initialization command sets up your Laravel project with:

- **CSS Theme System** - Installs CSS custom properties and utility classes
- **Dark Mode Support** - Configures theme switching with Alpine.js integration
- **JavaScript Utilities** - Adds reactive theme management system
- **Package Dependencies** - Installs required packages (Alpine.js, WireUI, etc.)
- **File Organization** - Creates proper directory structure for components

### Interactive Configuration

The command will guide you through configuration options:

1. **Dark Mode Setup** - Choose whether to include dark theme support
2. **Phosphor Icons** - Optionally install the comprehensive icon library
3. **File Locations** - Customize CSS and JavaScript file locations
4. **Dependency Management** - Select which packages to install

### Command Options

```bash
# Initialize with dark mode and Phosphor Icons
php artisan fluxtor:init --with-dark-mode --with-phosphor

# Skip interactive prompts (use defaults)
php artisan fluxtor:init --skip-prompts

# Force overwrite existing files
php artisan fluxtor:init --force

# Only create JavaScript files
php artisan fluxtor:init --js-only --with-dark-mode

# Custom file locations
php artisan fluxtor:init --css-file=custom.css --theme-file=my-theme
```

### Generated Files

After initialization, you'll have:

```
resources/
├── css/
│   ├── app.css (updated with theme import)
│   └── theme.css (CSS custom properties)
└── js/
    └── fluxtor/
        ├── utils.js (Alpine.js utilities)
        ├── app.js (updated with imports)
        └── globals/
            └── theme.js (Dark mode system)
```

### Important: Include Assets in Your Layout

Make sure your main layout file includes the compiled CSS and JavaScript assets:

```html
{{-- In your main layout file (e.g., resources/views/layouts/app.blade.php) --}}
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Your App</title>

    {{-- Include main CSS File --}} {+ @vite(['resources/css/app.css']) +}
  </head>
  <body>
    {{-- Your content --}} {{-- Include main JavaScript File --}} {+
    @vite(['resources/js/app.js']) +}
  </body>
</html>
```

## Authentication

### Login to Your Account

Access premium components and features by authenticating with your Fluxtor account:

```bash
php artisan fluxtor:login
```

This command will:

- Prompt for your Fluxtor credentials
- Store authentication tokens securely
- Enable access to premium components and features

**Note:** Authentication is required for premium components but optional for free components.

### View Current Account

Check which account is currently authenticated:

```bash
php artisan fluxtor:whoami
```

This command displays:

- **Email Address** - Your registered Fluxtor account email

**Example Output:**
```
You're login as john.doe@example.com
```

### Logout from Your Account

Remove stored authentication credentials and logout:

```bash
php artisan fluxtor:logout
```

This command will:

- Clear stored authentication tokens
- Remove cached account information
- Confirm successful logout

**Note:** After logout, you'll need to authenticate again using `fluxtor:login` to install premium components.

## Component Management

### Installing Components

Install individual components with all their dependencies:

```bash
php artisan fluxtor:install component-name
```

**Examples:**

```bash
# Install a button component
php artisan fluxtor:install button

# Install a modal component (may include dependencies)
php artisan fluxtor:install modal
```

### What Happens During Installation

1. **Component Files** - Blade components are added to `resources/views/components/ui/`
2. **Dependencies** - Required components and packages are automatically installed
3. **Assets** - CSS and JavaScript assets are integrated
4. **Documentation** - Usage examples are available at `https://fluxtor.dev/docs/components/component-name`

### Installation Options

```bash
# Force overwrite existing components
php artisan fluxtor:install button --force

# Install without dependencies
php artisan fluxtor:install button --no-deps

# Preview what will be installed
php artisan fluxtor:install button --dry-run
```

## Discovering Components

### List Available Components

Browse all available components in the Fluxtor library:

```bash
php artisan fluxtor:list
```

### Filtering Options

```bash
# List only free components
php artisan fluxtor:list --type=free

# List only premium components
php artisan fluxtor:list --type=premium
```
