---
name: alerts
---

## Introduction

The `Alerts` component is a versatile notification component designed to communicate important information to users. It provides multiple semantic types, customizable icons, and flexible content areas for headings, descriptions, and actions.


## Installation

Use the [sheaf artisan command](/docs/guides/cli-installation#content-component-management) to install the `alerts` component easily:

```bash
php artisan sheaf:install alerts
```

> Once installed, you can use the <x-ui.alerts /> component in any Blade view.

## Usage

### Basic Alert Types

The alert component supports multiple semantic types, each with its own color scheme and default icon.

@blade
<x-demo>
    <div class="w-full space-y-4">
        <x-components::ui.alerts>
            <x-slot:heading>Default alert message</x-slot:heading>
        </x-components::ui.alerts>
        <x-components::ui.alerts type="info">
            <x-slot:heading>This is an info alert</x-slot:heading>
        </x-components::ui.alerts>
        <x-components::ui.alerts type="success">
            <x-slot:heading>This is a success alert</x-slot:heading>
        </x-components::ui.alerts>
        <x-components::ui.alerts type="warning">
            <x-slot:heading>This is a warning alert</x-slot:heading>
        </x-components::ui.alerts>
        <x-components::ui.alerts type="error">
            <x-slot:heading>This is an error alert</x-slot:heading>
        </x-components::ui.alerts>
    </div>
</x-demo>
@endblade

```html
<!-- Default (info) alert -->
<x-ui.alerts>
    <x-slot:heading>Default alert message</x-slot:heading>
</x-ui.alerts>

<!-- Info alert -->
<x-ui.alerts type="info">
    <x-slot:heading>This is an info alert</x-slot:heading>
</x-ui.alerts>

<!-- Success alert -->
<x-ui.alerts type="success">
    <x-slot:heading>This is a success alert</x-slot:heading>
</x-ui.alerts>

<!-- Warning alert -->
<x-ui.alerts type="warning">
    <x-slot:heading>This is a warning alert</x-slot:heading>
</x-ui.alerts>

<!-- Error alert -->
<x-ui.alerts type="error">
    <x-slot:heading>This is an error alert</x-slot:heading>
</x-ui.alerts>
```

### Alert with Content

Add descriptive content below the heading to provide additional context or details.

@blade
<x-demo>
    <div class="w-full">
        <x-components::ui.alerts type="info">
            <x-slot:heading>Account verification required</x-slot:heading>
            <x-slot:content>
                <p>We've sent a verification email to your inbox. Please check your email and click the verification link to activate your account.</p>
            </x-slot:content>
        </x-components::ui.alerts>
    </div>
</x-demo>
@endblade

```html
<x-ui.alerts type="info">
    <x-slot:heading>Account verification required</x-slot:heading>
    <x-slot:content>
        <p>We've sent a verification email to your inbox. Please check your email and click the verification link to activate your account.</p>
    </x-slot:content>
</x-ui.alerts>
```

### Alert with Actions

Include action buttons to allow users to respond to the alert directly.

@blade
<x-demo>
    <div class="w-full">
        <x-components::ui.alerts type="warning">
            <x-slot:heading>Your subscription expires soon</x-slot:heading>
            <x-slot:content>
                <p>Your premium subscription will expire in 3 days. Renew now to continue enjoying all premium features.</p>
            </x-slot:content>
            <x-slot:actions>
                <div class="flex gap-2">
                    <x-components::ui.button size="sm">Renew Now</x-components::ui.button>
                    <x-components::ui.button size="sm" variant="outline">Remind Later</x-components::ui.button>
                </div>
            </x-slot:actions>
        </x-components::ui.alerts>
    </div>
</x-demo>
@endblade

```html
<x-ui.alerts type="warning">
    <x-slot:heading>Your subscription expires soon</x-slot:heading>
    <x-slot:content>
        <p>Your premium subscription will expire in 3 days. Renew now to continue enjoying all premium features.</p>
    </x-slot:content>
    <x-slot:actions>
        <x-ui.button size="sm">Renew Now</x-ui.button>
        <x-ui.button size="sm" variant="outline">Remind Later</x-ui.button>
    </x-slot:actions>
</x-ui.alerts>
```

### Custom Icons

Override the default icon with a custom one that better fits your specific use case.

@blade
<x-demo>
    <div class="w-full space-y-4">
        <x-components::ui.alerts type="info" iconName="cog-6-tooth">
            <x-slot:heading>System configuration updated</x-slot:heading>
            <x-slot:content>
                <p>Your system settings have been successfully updated and are now in effect.</p>
            </x-slot:content>
        </x-components::ui.alerts>

        <x-components::ui.alerts type="success" iconName="trophy" iconClass="text-yellow-500">
            <x-slot:heading>Achievement unlocked!</x-slot:heading>
            <x-slot:content>
                <p>Congratulations! You've completed all the beginner tutorials.</p>
            </x-slot:content>
        </x-components::ui.alerts>
    </div>
</x-demo>
@endblade

```html
<!-- Custom icon with default color -->
<x-ui.alerts type="info" iconName="cog-6-tooth">
    <x-slot:heading>System configuration updated</x-slot:heading>
    <x-slot:content>
        <p>Your system settings have been successfully updated and are now in effect.</p>
    </x-slot:content>
</x-ui.alerts>

<!-- Custom icon with custom color -->
<x-ui.alerts type="success" iconName="trophy" iconClass="text-yellow-500">
    <x-slot:heading>Achievement unlocked!</x-slot:heading>
    <x-slot:content>
        <p>Congratulations! You've completed all the beginner tutorials.</p>
    </x-slot:content>
</x-ui.alerts>
```

### Complex Alert Example

A comprehensive example showing all features working together.

@blade
<x-demo>
    <div class="w-full">
        <x-components::ui.alerts type="error" iconName="shield-exclamation">
            <x-slot:heading>Security Alert: Suspicious Activity Detected</x-slot:heading>
            <x-slot:content>
                <p>We've detected unusual login attempts from an unrecognized location. If this wasn't you, please secure your account immediately.</p>
                <ul class="mt-2 list-disc list-inside text-sm space-y-1">
                    <li>Location: San Francisco, CA</li>
                    <li>Time: Today at 2:15 PM</li>
                    <li>Device: Unknown mobile device</li>
                </ul>
            </x-slot:content>
            <x-slot:actions>
                <div class="flex gap-2">
                    <x-components::ui.button size="sm" variant="danger">Secure Account</x-components::ui.button>
                    <x-components::ui.button size="sm" variant="outline">This Was Me</x-components::ui.button>
                    <x-components::ui.button size="sm" variant="info">Learn More</x-components::ui.button>
                </div>
            </x-slot:actions>
        </x-components::ui.alerts>
    </div>
</x-demo>
@endblade

```html
<x-ui.alerts type="error" iconName="shield-exclamation">
    <x-slot:heading>Security Alert: Suspicious Activity Detected</x-slot:heading>
    <x-slot:content>
        <p>We've detected unusual login attempts from an unrecognized location. If this wasn't you, please secure your account immediately.</p>
        <ul class="mt-2 list-disc list-inside text-sm space-y-1">
            <li>Location: San Francisco, CA</li>
            <li>Time: Today at 2:15 PM</li>
            <li>Device: Unknown mobile device</li>
        </ul>
    </x-slot:content>
    <x-slot:actions>
        <x-ui.button size="sm" variant="danger">Secure Account</x-ui.button>
        <x-ui.button size="sm" variant="outline">This Was Me</x-ui.button>
        <x-ui.button size="sm" variant="info">Learn More</x-ui.button>
    </x-slot:actions>
</x-ui.alerts>
```

## Component Props Reference

### Alert Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `type` | `string` | `'info'` | Alert semantic type: `'info'`, `'success'`, `'warning'`, `'error'` |
| `icon` | `boolean` | `true` | Whether to display an icon |
| `iconName` | `string` | `null` | Custom icon name (overrides default type-based icon) |
| `iconClass` | `string` | `null` | Additional CSS classes for the icon |

### Slot Reference

| Slot | Required | Description |
|------|----------|-------------|
| `heading` | **Yes** | The main alert message or title |
| `content` | No | Additional descriptive content below the heading |
| `actions` | No | Action buttons or interactive elements |

## Default Icons by Type

Each alert type comes with a carefully selected default icon that reinforces the semantic meaning:

| Type | Default Icon | Color |
|------|--------------|-------|
| `info` | `information-circle` | Blue |
| `success` | `check-circle` | Green |
| `warning` | `exclamation-triangle` | Orange |
| `error` | `exclamation-circle` | Red |
