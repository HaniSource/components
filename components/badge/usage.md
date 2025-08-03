---
name: badge
---

## Introduction

The `Badge` component is a versatile labeling component designed to highlight status, categories, or other important metadata. It provides multiple visual variants, extensive color options, and flexible icon support for creating informative and visually appealing badges.

## Installation

Use the [fluxtor artisan command](/docs/cli-reference#fluxtorinstall) to install the `badge` component easily:

```bash
php artisan fluxtor:install badge
```

> Once installed, you can use the <x-ui.badge /> component in any Blade view.

## Usage

### Basic Badge Variants

The badge component supports two main visual variants with different corner radius styles.

@blade
<x-demo>
    <div class="flex flex-wrap items-center justify-center gap-4">
        <x-components::ui.badge>Default Badge</x-components::ui.badge>
        <x-components::ui.badge variant="pill">Pill Badge</x-components::ui.badge>
    </div>
</x-demo>
@endblade

```html
<!-- Default rounded badge -->
<x-ui.badge>Default Badge</x-ui.badge>

<!-- Pill-shaped badge -->
<x-ui.badge variant="pill">Pill Badge</x-ui.badge>
```

### Badge Sizes

Choose from three different sizes to match your design hierarchy and context.

@blade
<x-demo>
    <div class="flex flex-wrap items-center justify-center gap-4">
        <x-components::ui.badge size="sm">Small Badge</x-components::ui.badge>
        <x-components::ui.badge>Default Badge</x-components::ui.badge>
        <x-components::ui.badge size="lg">Large Badge</x-components::ui.badge>
    </div>
</x-demo>
@endblade

```html
<!-- Small badge -->
<x-ui.badge size="sm">Small Badge</x-ui.badge>

<!-- Default size badge -->
<x-ui.badge>Default Badge</x-ui.badge>

<!-- Large badge -->
<x-ui.badge size="lg">Large Badge</x-ui.badge>
```

### Color Variants - Soft Style (Default)

The soft style provides subtle background colors with high contrast text, perfect for most use cases.

@blade
<x-demo>
    <div class="flex flex-wrap items-center gap-2">
        <x-components::ui.badge>Default</x-components::ui.badge>
        <x-components::ui.badge color="red">Red</x-components::ui.badge>
        <x-components::ui.badge color="orange">Orange</x-components::ui.badge>
        <x-components::ui.badge color="amber">Amber</x-components::ui.badge>
        <x-components::ui.badge color="yellow">Yellow</x-components::ui.badge>
        <x-components::ui.badge color="lime">Lime</x-components::ui.badge>
        <x-components::ui.badge color="green">Green</x-components::ui.badge>
        <x-components::ui.badge color="emerald">Emerald</x-components::ui.badge>
        <x-components::ui.badge color="teal">Teal</x-components::ui.badge>
        <x-components::ui.badge color="cyan">Cyan</x-components::ui.badge>
        <x-components::ui.badge color="sky">Sky</x-components::ui.badge>
        <x-components::ui.badge color="blue">Blue</x-components::ui.badge>
        <x-components::ui.badge color="indigo">Indigo</x-components::ui.badge>
        <x-components::ui.badge color="violet">Violet</x-components::ui.badge>
        <x-components::ui.badge color="purple">Purple</x-components::ui.badge>
        <x-components::ui.badge color="fuchsia">Fuchsia</x-components::ui.badge>
        <x-components::ui.badge color="pink">Pink</x-components::ui.badge>
        <x-components::ui.badge color="rose">Rose</x-components::ui.badge>
    </div>
</x-demo>
@endblade

```html
<!-- Soft style badges (default) -->
<x-ui.badge>Default</x-ui.badge>
<x-ui.badge color="red">Red</x-ui.badge>
<x-ui.badge color="green">Green</x-ui.badge>
<x-ui.badge color="blue">Blue</x-ui.badge>
<x-ui.badge color="purple">Purple</x-ui.badge>
```

### Color Variants - Solid Style

The solid style provides bold, high-contrast badges with white text on colored backgrounds.

@blade
<x-demo>
    <div class="flex flex-wrap items-center gap-2">
        <x-components::ui.badge variant="solid">Default</x-components::ui.badge>
        <x-components::ui.badge variant="solid" color="red">Red</x-components::ui.badge>
        <x-components::ui.badge variant="solid" color="orange">Orange</x-components::ui.badge>
        <x-components::ui.badge variant="solid" color="amber">Amber</x-components::ui.badge>
        <x-components::ui.badge variant="solid" color="yellow">Yellow</x-components::ui.badge>
        <x-components::ui.badge variant="solid" color="lime">Lime</x-components::ui.badge>
        <x-components::ui.badge variant="solid" color="green">Green</x-components::ui.badge>
        <x-components::ui.badge variant="solid" color="emerald">Emerald</x-components::ui.badge>
        <x-components::ui.badge variant="solid" color="teal">Teal</x-components::ui.badge>
        <x-components::ui.badge variant="solid" color="cyan">Cyan</x-components::ui.badge>
        <x-components::ui.badge variant="solid" color="sky">Sky</x-components::ui.badge>
        <x-components::ui.badge variant="solid" color="blue">Blue</x-components::ui.badge>
        <x-components::ui.badge variant="solid" color="indigo">Indigo</x-components::ui.badge>
        <x-components::ui.badge variant="solid" color="violet">Violet</x-components::ui.badge>
        <x-components::ui.badge variant="solid" color="purple">Purple</x-components::ui.badge>
        <x-components::ui.badge variant="solid" color="fuchsia">Fuchsia</x-components::ui.badge>
        <x-components::ui.badge variant="solid" color="pink">Pink</x-components::ui.badge>
        <x-components::ui.badge variant="solid" color="rose">Rose</x-components::ui.badge>
    </div>
</x-demo>
@endblade

```html
<!-- Solid style badges -->
<x-ui.badge variant="solid">Default</x-ui.badge>
<x-ui.badge variant="solid" color="red">Red</x-ui.badge>
<x-ui.badge variant="solid" color="green">Green</x-ui.badge>
<x-ui.badge variant="solid" color="blue">Blue</x-ui.badge>
<x-ui.badge variant="solid" color="purple">Purple</x-ui.badge>
```

### Badges with Icons

Add leading icons to provide visual context and improve recognition.

@blade
<x-demo>
    <div class="flex flex-wrap items-center gap-4">
        <x-components::ui.badge icon="check-circle" color="green">Completed</x-components::ui.badge>
        <x-components::ui.badge icon="clock" color="amber">Pending</x-components::ui.badge>
        <x-components::ui.badge icon="x-circle" color="red">Failed</x-components::ui.badge>
        <x-components::ui.badge icon="star" color="yellow" variant="solid">Featured</x-components::ui.badge>
    </div>
</x-demo>
@endblade

```html
<!-- Badges with leading icons -->
<x-ui.badge icon="check-circle" color="green">Completed</x-ui.badge>
<x-ui.badge icon="clock" color="amber">Pending</x-ui.badge>
<x-ui.badge icon="x-circle" color="red">Failed</x-ui.badge>
<x-ui.badge icon="star" color="yellow" variant="solid">Featured</x-ui.badge>
```

### Badges with Trailing Icons

Use trailing icons for actions like removal or additional information.

@blade
<x-demo>
    <div class="flex flex-wrap items-center gap-4">
        <x-components::ui.badge iconTrailing="x-mark" color="blue">JavaScript</x-components::ui.badge>
        <x-components::ui.badge iconTrailing="chevron-down" color="purple">More Options</x-components::ui.badge>
        <x-components::ui.badge icon="tag" iconTrailing="x-mark" color="green" variant="pill">Design</x-components::ui.badge>
    </div>
</x-demo>
@endblade

```html
<!-- Badges with trailing icons -->
<x-ui.badge iconTrailing="x-mark" color="blue">JavaScript</x-ui.badge>
<x-ui.badge iconTrailing="chevron-down" color="purple">More Options</x-ui.badge>

<!-- Badge with both leading and trailing icons -->
<x-ui.badge icon="tag" iconTrailing="x-mark" color="green" variant="pill">Design</x-ui.badge>
```

### Icon Variants

Control the icon style using the `iconVariant` prop, supporting both micro and outline styles.

@blade
<x-demo>
    <div class="flex flex-wrap items-center gap-4">
        <x-components::ui.badge icon="heart" iconVariant="micro" color="red">Micro Icon</x-components::ui.badge>
        <x-components::ui.badge icon="heart" iconVariant="outline" color="red">Outline Icon</x-components::ui.badge>
    </div>
</x-demo>
@endblade

```html
<!-- Micro icon variant (default) -->
<x-ui.badge icon="heart" iconVariant="micro" color="red">Micro Icon</x-ui.badge>

<!-- Outline icon variant -->
<x-ui.badge icon="heart" iconVariant="outline" color="red">Outline Icon</x-ui.badge>
```

### Interactive Badges

Badges can function as buttons with hover states when appropriate attributes are applied.

@blade
<x-demo>
    <div class="flex flex-wrap items-center gap-4">
        <x-components::ui.badge onclick="alert('Badge clicked!')" color="blue" class="cursor-pointer">Clickable Badge</x-components::ui.badge>
        <x-components::ui.badge onclick="alert('Remove tag')" icon="tag" iconTrailing="x-mark" color="green" variant="pill" class="cursor-pointer">Remove Tag</x-components::ui.badge>
    </div>
</x-demo>
@endblade

```html
<!-- Interactive badges with hover effects -->
<x-ui.badge onclick="alert('Badge clicked!')" color="blue" class="cursor-pointer">
    Clickable Badge
</x-ui.badge>

<x-ui.badge onclick="alert('Remove tag')" icon="tag" iconTrailing="x-mark" color="green" variant="pill" class="cursor-pointer">
    Remove Tag
</x-ui.badge>
```

### Status Badge Examples

Common usage patterns for status indicators and labels.

@blade
<x-demo>
    <div class="space-y-4">
        <div class="flex flex-wrap items-center gap-2">
            <span class="text-sm font-medium">Order Status:</span>
            <x-components::ui.badge icon="truck" color="blue" variant="solid">Shipped</x-components::ui.badge>
        </div>
        
        <div class="flex flex-wrap items-center gap-2">
            <span class="text-sm font-medium">Priority:</span>
            <x-components::ui.badge color="red" size="sm">High</x-components::ui.badge>
            <x-components::ui.badge color="amber" size="sm">Medium</x-components::ui.badge>
            <x-components::ui.badge color="green" size="sm">Low</x-components::ui.badge>
        </div>
        
        <div class="flex flex-wrap items-center gap-2">
            <span class="text-sm font-medium">Tags:</span>
            <x-components::ui.badge variant="pill" iconTrailing="x-mark" color="purple">React</x-components::ui.badge>
            <x-components::ui.badge variant="pill" iconTrailing="x-mark" color="blue">TypeScript</x-components::ui.badge>
            <x-components::ui.badge variant="pill" iconTrailing="x-mark" color="green">Tailwind</x-components::ui.badge>
        </div>
    </div>
</x-demo>
@endblade

```html
<!-- Status indicators -->
<div class="flex items-center gap-2">
    <span class="text-sm font-medium">Order Status:</span>
    <x-ui.badge icon="truck" color="blue" variant="solid">Shipped</x-ui.badge>
</div>

<!-- Priority levels -->
<div class="flex items-center gap-2">
    <span class="text-sm font-medium">Priority:</span>
    <x-ui.badge color="red" size="sm">High</x-ui.badge>
    <x-ui.badge color="amber" size="sm">Medium</x-ui.badge>
    <x-ui.badge color="green" size="sm">Low</x-ui.badge>
</div>

<!-- Removable tags -->
<div class="flex items-center gap-2">
    <span class="text-sm font-medium">Tags:</span>
    <x-ui.badge variant="pill" iconTrailing="x-mark" color="purple">React</x-ui.badge>
    <x-ui.badge variant="pill" iconTrailing="x-mark" color="blue">TypeScript</x-ui.badge>
    <x-ui.badge variant="pill" iconTrailing="x-mark" color="green">Tailwind</x-ui.badge>
</div>
```

## Component Props Reference

### Badge Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `variant` | `string` | `null` | Visual variant: `'pill'` for fully rounded, `null` for default rounded |
| `color` | `string` | `null` | Color theme: `'red'`, `'green'`, `'blue'`, `'purple'`, `'amber'`, `'yellow'`, `'lime'`, `'emerald'`, `'teal'`, `'cyan'`, `'sky'`, `'indigo'`, `'violet'`, `'fuchsia'`, `'pink'`, `'rose'`, `'orange'` |
| `size` | `string` | `null` | Size variant: `'sm'`, `null` (default), `'lg'` |
| `icon` | `string\|mixed` | `null` | Leading icon name or custom icon content |
| `iconTrailing` | `string\|mixed` | `null` | Trailing icon name or custom icon content |
| `iconVariant` | `string` | `'micro'` | Icon style: `'micro'`, `'outline'` |

### Styling Variants

#### Visual Variants

| Variant | Description | Border Radius |
|---------|-------------|---------------|
| `null` (default) | Standard rounded corners | `rounded-md` |
| `'pill'` | Fully rounded pill shape | `rounded-full` |

#### Style Variants

The component automatically applies different styles based on the presence of a `variant` prop:

| Style | When Applied | Appearance |
|-------|--------------|------------|
| **Soft** | Default (no variant specified) | Subtle colored background with darker text |
| **Solid** | When `variant="solid"` | Bold colored background with white text |

#### Size Options

| Size | Text Size | Vertical Padding | Use Case |
|------|-----------|------------------|----------|
| `'sm'` | `text-xs` | `py-1` | Compact spaces, inline with small text |
| `null` (default) | `text-sm` | `py-1` | Standard usage, most common |
| `'lg'` | `text-sm` | `py-1.5` | Emphasis, standalone badges |

### Color Palette

The badge component supports 18 carefully crafted color options, each optimized for both light and dark modes:

**Neutral:** Default (zinc)
**Reds:** Red, Rose, Pink
**Oranges:** Orange, Amber, Yellow
**Greens:** Lime, Green, Emerald, Teal
**Blues:** Cyan, Sky, Blue, Indigo
**Purples:** Violet, Purple, Fuchsia

Each color automatically adjusts for:
- Light and dark mode compatibility
- Proper contrast ratios for accessibility
- Hover states for interactive badges
- Consistent opacity levels for soft variant

## Best Practices

### When to Use Badges

**Good Use Cases:**
- Status indicators (Active, Pending, Completed)
- Category labels and tags
- Notification counts and alerts
- Priority levels and importance markers
- Version numbers and release tags

**Avoid Using Badges For:**
- Primary navigation elements
- Main call-to-action buttons
- Long text content (use cards instead)
- Complex interactive elements

### Color Selection Guidelines

- **Red/Rose:** Errors, urgent status, high priority, destructive actions
- **Orange/Amber:** Warnings, pending status, medium priority
- **Yellow:** Caution, temporary status, highlights
- **Green/Emerald:** Success, completed status, positive indicators
- **Blue/Sky:** Information, neutral status, links
- **Purple/Violet:** Special features, premium content, custom categories
- **Gray (Default):** Neutral information, inactive status

### Accessibility Considerations

- Use sufficient color contrast for text readability
- Don't rely solely on color to convey meaning
- Consider adding icons for better recognition
- Ensure interactive badges have proper focus states
- Use semantic HTML attributes when badges represent status

### Performance Tips

- The component uses efficient CSS class matching for optimal performance
- Color classes are conditionally applied to reduce CSS bundle size
- Icon rendering is optimized with proper slot usage