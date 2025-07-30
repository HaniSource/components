---
name: accordion
---

## Introduction

The `Accordion` component is a collapsible content component designed to organize information in an expandable format. It allows users to show and hide sections of related content, making it perfect for FAQs, product details, settings panels, and other scenarios where space-efficient content organization is needed.

## Installation

Use the [fluxtor artisan command](/docs/cli-reference#fluxtorinstall) to install the `accordion` component easily:

```bash
php artisan fluxtor:install accordion
```

> Once installed, you can use the <x-ui.accordion />, <x-ui.accordion.item />, <x-ui.accordion.item.trigger />, and <x-ui.accordion.item.content /> components in any Blade view.

## Usage

### Basic Accordion

@blade
<x-demo>
    <div class="w-full">
        <x-components::ui.accordion>
            <x-components::ui.accordion.item>
                <x-components::ui.accordion.item.trigger>
                    What is your return policy?
                </x-components::ui.accordion.item.trigger>
                <x-components::ui.accordion.item.content>
                    <p>We offer a 30-day return policy for all unused items in their original packaging. Simply contact our customer service team to initiate a return.</p>
                </x-components::ui.accordion.item.content>
            </x-components::ui.accordion.item>

            <x-components::ui.accordion.item>
                <x-components::ui.accordion.item.trigger>
                    How long does shipping take?
                </x-components::ui.accordion.item.trigger>
                <x-components::ui.accordion.item.content>
                    <p>Standard shipping typically takes 3-5 business days, while express shipping takes 1-2 business days. International orders may take 7-14 business days depending on the destination.</p>
                </x-components::ui.accordion.item.content>
            </x-components::ui.accordion.item>

            <x-components::ui.accordion.item>
                <x-components::ui.accordion.item.trigger>
                    Do you offer international shipping?
                </x-components::ui.accordion.item.trigger>
                <x-components::ui.accordion.item.content>
                    <p>Yes, we ship to over 50 countries worldwide. Shipping costs and delivery times vary by destination. You can see the exact cost and estimated delivery time at checkout.</p>
                </x-components::ui.accordion.item.content>
            </x-components::ui.accordion.item>
        </x-components::ui.accordion>
    </div>
</x-demo>
@endblade

```html
<x-ui.accordion>
    <x-ui.accordion.item>
        <x-ui.accordion.item.trigger>
            What is your return policy?
        </x-ui.accordion.item.trigger>
        <x-ui.accordion.item.content>
            <p>We offer a 30-day return policy for all unused items in their original packaging. Simply contact our customer service team to initiate a return.</p>
        </x-ui.accordion.item.content>
    </x-ui.accordion.item>

    <x-ui.accordion.item>
        <x-ui.accordion.item.trigger>
            How long does shipping take?
        </x-ui.accordion.item.trigger>
        <x-ui.accordion.item.content>
            <p>Standard shipping typically takes 3-5 business days, while express shipping takes 1-2 business days.</p>
        </x-ui.accordion.item.content>
    </x-ui.accordion.item>
</x-ui.accordion>
```

### Shorthand Syntax

For simple accordions, you can use the shorthand syntax with the `trigger` prop.

@blade
<x-demo>
    <div class="w-full">
        <x-components::ui.accordion>
            <x-components::ui.accordion.item trigger="Account Settings">
                <p>Manage your account preferences, update your profile information, and configure notification settings.</p>
                <div class="mt-3 space-y-2">
                    <div class="flex items-center justify-between">
                        <span>Email notifications</span>
                        <span class="text-green-600">Enabled</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span>Two-factor authentication</span>
                        <span class="text-green-600">Enabled</span>
                    </div>
                </div>
            </x-components::ui.accordion.item>

            <x-components::ui.accordion.item trigger="Privacy & Security">
                <p>Control your privacy settings and security preferences to keep your account safe.</p>
                <ul class="mt-3 space-y-1 list-disc list-inside">
                    <li>Password requirements</li>
                    <li>Login history</li>
                    <li>Data sharing preferences</li>
                </ul>
            </x-components::ui.accordion.item>
        </x-components::ui.accordion>
    </div>
</x-demo>
@endblade

```html
<x-ui.accordion>
    <x-ui.accordion.item trigger="Account Settings">
        <p>Manage your account preferences, update your profile information, and configure notification settings.</p>
        <div class="mt-3 space-y-2">
            <div class="flex items-center justify-between">
                <span>Email notifications</span>
                <span class="text-green-600">Enabled</span>
            </div>
            <div class="flex items-center justify-between">
                <span>Two-factor authentication</span>
                <span class="text-green-600">Enabled</span>
            </div>
        </div>
    </x-ui.accordion.item>

    <x-ui.accordion.item trigger="Privacy & Security">
        <p>Control your privacy settings and security preferences to keep your account safe.</p>
        <ul class="mt-3 space-y-1 list-disc list-inside">
            <li>Password requirements</li>
            <li>Login history</li>
            <li>Data sharing preferences</li>
        </ul>
    </x-ui.accordion.item>
</x-ui.accordion>
```

### Expanded by Default

Set an accordion item to be expanded when the component loads.

@blade
<x-demo>
    <div class="w-full">
        <x-components::ui.accordion>
            <x-components::ui.accordion.item expanded trigger="Getting Started">
                <p>Welcome! This section is expanded by default to help you get started quickly.</p>
                <div class="mt-3 p-3 bg-blue-50 dark:bg-blue-900/20 rounded">
                    <p class="text-sm">💡 <strong>Tip:</strong> Use the <code>expanded</code> prop to open important sections by default.</p>
                </div>
            </x-components::ui.accordion.item>

            <x-components::ui.accordion.item trigger="Advanced Features">
                <p>Explore advanced features and customization options for power users.</p>
            </x-components::ui.accordion.item>

            <x-components::ui.accordion.item trigger="Troubleshooting">
                <p>Common issues and solutions to help you resolve problems quickly.</p>
            </x-components::ui.accordion.item>
        </x-components::ui.accordion>
    </div>
</x-demo>
@endblade

```html
<x-ui.accordion>
    <x-ui.accordion.item 
        expanded
        trigger="Getting Started">
        <p>Welcome! This section is expanded by default to help you get started quickly.</p>
        <div class="mt-3 p-3 bg-blue-50 dark:bg-blue-900/20 rounded">
            <p class="text-sm">💡 <strong>Tip:</strong> Use the <code>expanded</code> prop to open important sections by default.</p>
        </div>
    </x-ui.accordion.item>

    <x-ui.accordion.item trigger="Advanced Features">
        <p>Explore advanced features and customization options for power users.</p>
    </x-ui.accordion.item>
</x-ui.accordion>
```

### Disabled Items

Disable specific accordion items to prevent user interaction.

@blade
<x-demo>
    <div class="w-full">
        <x-components::ui.accordion>
            <x-components::ui.accordion.item trigger="Available Features">
                <p>These features are currently available and ready to use.</p>
                <ul class="mt-3 space-y-1 list-disc list-inside">
                    <li>User management</li>
                    <li>Basic reporting</li>
                    <li>Email notifications</li>
                </ul>
            </x-components::ui.accordion.item>

            <x-components::ui.accordion.item disabled trigger="Premium Features (Coming Soon)">
                <p>This content is not yet available.</p>
            </x-components::ui.accordion.item>

            <x-components::ui.accordion.item trigger="Documentation">
                <p>Access comprehensive documentation and guides for all features.</p>
            </x-components::ui.accordion.item>
        </x-components::ui.accordion>
    </div>
</x-demo>
@endblade

```html
<x-ui.accordion>
    //
    <x-ui.accordion.item 
        disabled 
        trigger="Premium Features (Coming Soon)">
        <p>This content is not yet available.</p>
    </x-ui.accordion.item>
    //
</x-ui.accordion>
```

### Reverse Layout

Use the reverse layout to position chevron icons on the left side.

@blade
<x-demo>
    <div class="w-full">
        <x-components::ui.accordion reverse>
            <x-components::ui.accordion.item trigger="System Requirements">
                <div class="space-y-3">
                    <div>
                        <h4 class="font-semibold">Minimum Requirements:</h4>
                        <ul class="mt-1 space-y-1 list-disc list-inside text-sm">
                            <li>4GB RAM</li>
                            <li>2GB available storage</li>
                            <li>Internet connection</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold">Recommended:</h4>
                        <ul class="mt-1 space-y-1 list-disc list-inside text-sm">
                            <li>8GB RAM or more</li>
                            <li>5GB available storage</li>
                            <li>High-speed internet</li>
                        </ul>
                    </div>
                </div>
            </x-components::ui.accordion.item>

            <x-components::ui.accordion.item trigger="Supported Platforms">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <h4 class="font-semibold">Desktop</h4>
                        <ul class="mt-1 space-y-1 text-sm">
                            <li>Windows 10+</li>
                            <li>macOS 10.15+</li>
                            <li>Linux (Ubuntu 18+)</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold">Mobile</h4>
                        <ul class="mt-1 space-y-1 text-sm">
                            <li>iOS 13+</li>
                            <li>Android 8+</li>
                        </ul>
                    </div>
                </div>
            </x-components::ui.accordion.item>
        </x-components::ui.accordion>
    </div>
</x-demo>
@endblade

```html
<x-ui.accordion reverse>
    //..
</x-ui.accordion>
```

### Complex Content

Accordion items can contain rich content including forms, buttons, and other interactive elements.

@blade
<x-demo>
    <div class="w-full">
        <x-components::ui.accordion>
            <x-components::ui.accordion.item>
                <x-components::ui.accordion.item.trigger>
                    Contact Information
                </x-components::ui.accordion.item.trigger>
                <x-components::ui.accordion.item.content>
                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-1">First Name</label>
                                <input type="text" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="John">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Last Name</label>
                                <input type="text" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Doe">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Email</label>
                            <input type="email" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="john@example.com">
                        </div>
                        <div class="flex justify-end gap-2">
                            <x-components::ui.button size="sm" variant="outline">Cancel</x-components::ui.button>
                            <x-components::ui.button size="sm">Save Changes</x-components::ui.button>
                        </div>
                    </div>
                </x-components::ui.accordion.item.content>
            </x-components::ui.accordion.item>

            <x-components::ui.accordion.item>
                <x-components::ui.accordion.item.trigger>
                    Notification Preferences
                </x-components::ui.accordion.item.trigger>
                <x-components::ui.accordion.item.content>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span>Email notifications</span>
                            <input type="checkbox" checked class="rounded">
                        </div>
                        <div class="flex items-center justify-between">
                            <span>SMS notifications</span>
                            <input type="checkbox" class="rounded">
                        </div>
                        <div class="flex items-center justify-between">
                            <span>Push notifications</span>
                            <input type="checkbox" checked class="rounded">
                        </div>
                    </div>
                </x-components::ui.accordion.item.content>
            </x-components::ui.accordion.item>
        </x-components::ui.accordion>
    </div>
</x-demo>
@endblade

```html
<x-ui.accordion>
    <x-ui.accordion.item>
        <x-ui.accordion.item.trigger>
            Contact Information
        </x-ui.accordion.item.trigger>
        <x-ui.accordion.item.content>
            <div class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">First Name</label>
                        <input type="text" class="w-full px-3 py-2 border rounded" placeholder="John">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Last Name</label>
                        <input type="text" class="w-full px-3 py-2 border rounded" placeholder="Doe">
                    </div>
                </div>
                <div class="flex justify-end gap-2">
                    <x-ui.button size="sm" variant="outline">Cancel</x-ui.button>
                    <x-ui.button size="sm">Save Changes</x-ui.button>
                </div>
            </div>
        </x-ui.accordion.item.content>
    </x-ui.accordion.item>
</x-ui.accordion>
```

## Component Props Reference

### Accordion Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `reverse` | `boolean` | `false` | Whether to reverse the trigger layout (chevron on left) |

### Accordion Item Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `disabled` | `boolean` | `false` | Whether the accordion item is disabled |
| `trigger` | `string` | `null` | Shorthand trigger content (alternative to using trigger slot) |
| `expanded` | `boolean` | `false` | Whether the item is expanded by default |

### Inherited Props (Accordion Item)

These props are automatically inherited from the parent `accordion` component:

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `reverse` | `boolean` | `false` | Reverse layout inherited from parent accordion |

### Accordion Item Trigger Props

| Prop | Type | Description |
|------|------|-------------|
| `disabled` | `boolean` | Disabled state inherited from parent item |
| `reverse` | `boolean` | Reverse layout inherited from accordion |
