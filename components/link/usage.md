---
name: 'link'
---

# Link Component

## Introduction

The `link` component provides a flexible and accessible way to create styled links.

## Basic Usage

@blade
<x-demo>
    <x-ui.link href="https://example.com">
        Visit our website
    </x-ui.link>
</x-demo>
@endblade

```html
<x-ui.link href="https://example.com">
    Visit our website
</x-ui.link>
```

### Internal Links

@blade
<x-demo>
    <x-ui.link href="/dashboard">
        Go to Dashboard
    </x-ui.link>
</x-demo>
@endblade

```html
<x-ui.link href="/dashboard">
    Go to Dashboard
</x-ui.link>
```

### External Links

@blade
<x-demo>
    <x-ui.link href="https://github.com" openInNewTab>
        View on GitHub
    </x-ui.link>
</x-demo>
@endblade

```html
<x-ui.link href="https://github.com" openInNewTab>
    View on GitHub
</x-ui.link>
```

## Link Variants

### Default Variant

The default variant shows an underlined link with primary colors.

@blade
<x-demo>
    <p>This is a paragraph with a <x-ui.link href="#">default link</x-ui.link> inside it.</p>
</x-demo>
@endblade

```html
<p>This is a paragraph with a <x-ui.link href="#">default link</x-ui.link> inside it.</p>
```

### Ghost Variant

Ghost links have no underline by default but show underline on hover.

@blade
<x-demo>
    <p>This is a paragraph with a <x-ui.link href="#" variant="ghost">ghost link</x-ui.link> that underlines on hover.</p>
</x-demo>
@endblade

```html
<p>This is a paragraph with a <x-ui.link href="#" variant="ghost">ghost link</x-ui.link> that underlines on hover.</p>
```

### Soft Variant

Soft links have a muted appearance with no underline and Soft hover effects.

@blade
<x-demo>
    <p>This is a paragraph with a <x-ui.link href="#" variant="soft">soft link</x-ui.link> that has Soft styling.</p>
</x-demo>
@endblade

```html
<p>This is a paragraph with a <x-ui.link href="#" variant="soft">soft link</x-ui.link> that has Soft styling.</p>
```

## primary Colors

### With primary (Default)

Links with primary use the primary color scheme.

@blade
<x-demo>
    <div class="space-y-2">
        <p><x-ui.link href="#" :primary="true">primary link (default)</x-ui.link></p>
        <p><x-ui.link href="#" :primary="true" variant="ghost">primary ghost link</x-ui.link></p>
        <p><x-ui.link href="#" :primary="true" variant="soft">primary soft link</x-ui.link></p>
    </div>
</x-demo>
@endblade

```html
<x-ui.link href="#" :primary="true">primary link (default)</x-ui.link>
<x-ui.link href="#" :primary="true" variant="ghost">primary ghost link</x-ui.link>
<x-ui.link href="#" :primary="true" variant="soft">primary soft link</x-ui.link>
```

### Without primary

Links without primary use neutral colors.

@blade
<x-demo>
    <div class="space-y-2">
        <p><x-ui.link href="#" :primary="false">Neutral link</x-ui.link></p>
        <p><x-ui.link href="#" :primary="false" variant="ghost">Neutral ghost link</x-ui.link></p>
        <p><x-ui.link href="#" :primary="false" variant="soft">Neutral soft link</x-ui.link></p>
    </div>
</x-demo>
@endblade

```html
<x-ui.link href="#" :primary="false">Neutral link</x-ui.link>
<x-ui.link href="#" :primary="false" variant="ghost">Neutral ghost link</x-ui.link>
<x-ui.link href="#" :primary="false" variant="soft">Neutral soft link</x-ui.link>
```

## Link Collections

### Navigation Links

@blade
<x-demo>
    <nav class="flex space-x-6">
        <x-ui.link href="#" variant="ghost">Home</x-ui.link>
        <x-ui.link href="#" variant="ghost">About</x-ui.link>
        <x-ui.link href="#" variant="ghost">Services</x-ui.link>
        <x-ui.link href="#" variant="ghost">Contact</x-ui.link>
    </nav>
</x-demo>
@endblade

```html
<nav class="flex space-x-6">
    <x-ui.link href="/" variant="ghost">Home</x-ui.link>
    <x-ui.link href="/about" variant="ghost">About</x-ui.link>
    <x-ui.link href="/services" variant="ghost">Services</x-ui.link>
    <x-ui.link href="/contact" variant="ghost">Contact</x-ui.link>
</nav>
```

### Footer Links

@blade
<x-demo>
    <footer class="space-y-2">
        <div class="flex space-x-4">
            <x-ui.link href="#" variant="soft" :primary="false">Privacy Policy</x-ui.link>
            <x-ui.link href="#" variant="soft" :primary="false">Terms of Service</x-ui.link>
            <x-ui.link href="#" variant="soft" :primary="false">Cookie Policy</x-ui.link>
        </div>
        <div class="flex space-x-4">
            <x-ui.link href="#" variant="soft" :primary="false">Help Center</x-ui.link>
            <x-ui.link href="#" variant="soft" :primary="false">Support</x-ui.link>
            <x-ui.link href="#" variant="soft" :primary="false">Contact Us</x-ui.link>
        </div>
    </footer>
</x-demo>
@endblade

```html
<footer class="space-y-2">
    <div class="flex space-x-4">
        <x-ui.link href="/privacy" variant="soft" :primary="false">Privacy Policy</x-ui.link>
        <x-ui.link href="/terms" variant="soft" :primary="false">Terms of Service</x-ui.link>
        <x-ui.link href="/cookies" variant="soft" :primary="false">Cookie Policy</x-ui.link>
    </div>
    <div class="flex space-x-4">
        <x-ui.link href="/help" variant="soft" :primary="false">Help Center</x-ui.link>
        <x-ui.link href="/support" variant="soft" :primary="false">Support</x-ui.link>
        <x-ui.link href="/contact" variant="soft" :primary="false">Contact Us</x-ui.link>
    </div>
</footer>
```

## Inline Links

### In Paragraph Text

@blade
<x-demo>
    <div class="prose prose-neutral dark:prose-invert max-w-none">
        <p>
            Welcome to our platform! Please read our 
            <x-ui.link href="#">terms of service</x-ui.link> 
            and 
            <x-ui.link href="#">privacy policy</x-ui.link> 
            before continuing. If you need help, 
            <x-ui.link href="#" variant="ghost">contact our support team</x-ui.link> 
            or visit our 
            <x-ui.link href="#" variant="soft">help center</x-ui.link>.
        </p>
    </div>
</x-demo>
@endblade

```html
<p>
    Welcome to our platform! Please read our 
    <x-ui.link href="/terms">terms of service</x-ui.link> 
    and 
    <x-ui.link href="/privacy">privacy policy</x-ui.link> 
    before continuing. If you need help, 
    <x-ui.link href="/contact" variant="ghost">contact our support team</x-ui.link> 
    or visit our 
    <x-ui.link href="/help" variant="soft">help center</x-ui.link>.
</p>
```

### Call-to-Action Links

@blade
<x-demo>
    <div class="text-center space-y-4">
        <h3 class="text-lg font-semibold">Ready to get started?</h3>
        <p>
            <x-ui.link href="#" class="text-lg">Sign up for free today</x-ui.link>
        </p>
        <p class="text-sm">
            Already have an account? 
            <x-ui.link href="#" variant="ghost">Sign in here</x-ui.link>
        </p>
    </div>
</x-demo>
@endblade

```html
<div class="text-center space-y-4">
    <h3 class="text-lg font-semibold">Ready to get started?</h3>
    <p>
        <x-ui.link href="/signup" class="text-lg">Sign up for free today</x-ui.link>
    </p>
    <p class="text-sm">
        Already have an account? 
        <x-ui.link href="/login" variant="ghost">Sign in here</x-ui.link>
    </p>
</div>
```

## External Links

### Social Media Links

@blade
<x-demo>
    <div class="flex space-x-4">
        <x-ui.link href="https://twitter.com/example" openInNewTab variant="ghost" :primary="false">
            Twitter
        </x-ui.link>
        <x-ui.link href="https://github.com/example" openInNewTab variant="ghost" :primary="false">
            GitHub
        </x-ui.link>
        <x-ui.link href="https://linkedin.com/in/example" openInNewTab variant="ghost" :primary="false">
            LinkedIn
        </x-ui.link>
    </div>
</x-demo>
@endblade

```html
<div class="flex space-x-4">
    <x-ui.link href="https://twitter.com/example" openInNewTab variant="ghost" :primary="false">
        Twitter
    </x-ui.link>
    <x-ui.link href="https://github.com/example" openInNewTab variant="ghost" :primary="false">
        GitHub
    </x-ui.link>
    <x-ui.link href="https://linkedin.com/in/example" openInNewTab variant="ghost" :primary="false">
        LinkedIn
    </x-ui.link>
</div>
```

### Resource Links

@blade
<x-demo>
    <div class="space-y-2">
        <p>
            <x-ui.link href="https://docs.example.com" openInNewTab>
                Read the documentation
            </x-ui.link>
        </p>
        <p>
            <x-ui.link href="https://api.example.com" openInNewTab variant="ghost">
                View API reference
            </x-ui.link>
        </p>
        <p>
            <x-ui.link href="https://blog.example.com" openInNewTab variant="soft">
                Visit our blog
            </x-ui.link>
        </p>
    </div>
</x-demo>
@endblade

```html
<div class="space-y-2">
    <p>
        <x-ui.link href="https://docs.example.com" openInNewTab>
            Read the documentation
        </x-ui.link>
    </p>
    <p>
        <x-ui.link href="https://api.example.com" openInNewTab variant="ghost">
            View API reference
        </x-ui.link>
    </p>
    <p>
        <x-ui.link href="https://blog.example.com" openInNewTab variant="soft">
            Visit our blog
        </x-ui.link>
    </p>
</div>
```

## Accessibility Features

### ARIA Labels

@blade
<x-demo>
    <div class="space-y-2">
        <p>
            <x-ui.link 
                href="https://example.com" 
                openInNewTab 
                aria-label="Visit our main website (opens in new tab)"
            >
                Visit Website
            </x-ui.link>
        </p>
        <p>
            <x-ui.link 
                href="/download" 
                aria-describedby="download-info"
            >
                Download App
            </x-ui.link>
            <span id="download-info" class="sr-only">Downloads a 50MB installer file</span>
        </p>
    </div>
</x-demo>
@endblade

```html
<x-ui.link 
    href="https://example.com" 
    openInNewTab 
    aria-label="Visit our main website (opens in new tab)"
>
    Visit Website
</x-ui.link>

<x-ui.link 
    href="/download" 
    aria-describedby="download-info"
>
    Download App
</x-ui.link>
<span id="download-info" class="sr-only">Downloads a 50MB installer file</span>
```

## Component Props

| Prop Name | Type | Default | Required | Description |
|-----------|------|---------|----------|-------------|
| `href` | string | - | Yes | Link destination URL |
| `variant` | string | `null` | No | Link style: `default`, `ghost`, `soft` |
| `primary` | boolean | `true` | No | Whether to use primary colors |
| `openInNewTab` | boolean | `false` | No | Whether link opens in new tab |
| `download` | boolean/string | `false` | No | Whether link triggers download |
| `class` | string | `''` | No | Additional CSS classes |

## Variant Styles

| Variant | Underline | Hover Behavior | Use Case |
|---------|-----------|----------------|----------|
| `default` | Always visible | Color change | Primary content links |
| `ghost` | Only on hover | Underline appears | Navigation, secondary links |
| `soft` | Never | Soft color change | Footer links, muted references |
