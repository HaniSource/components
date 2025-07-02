---
name: card
---

## Introduction

The `Card` component is a **responsive**, **unstyled** container component designed for content encapsulation. It's built to provide sensible default spacing, consistent border styling, and dark mode support without enforcing layout or design opinion.

You can drop it in and immediately start composing UIs with clarity and structure—no need to reinvent wrappers every time.

---

## Installation
Use the [fluxtor artisan command](/docs/cli-reference#fluxtorinstall) to install the `card` component easily:

```bash
php artisan fluxtor:install card
```

> Once installed, you can use the <x-ui.card /> component in any Blade view.

## Usage

@blade
<x-demo>
    <x-components::ui.card>
        <x-components::ui.heading level="h3" size="md">
            Welcome to Fluxtor.
        </x-components::ui.heading>
    </x-components::ui.card>
</x-demo>
@endblade

```html
    <x-ui.card>
        <x-ui.heading level="h3" size="md">
            Welcome to Fluxtor.
        </x-ui.heading>
    </x-ui.card>
```

## Customization

#### Size
The `size` prop controls the max width of the card and helps enforce layout constraints in a flexible way. Default is `md`.

@blade
<x-demo>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <x-components::ui.card size="xs">Extra Small Card</x-components::ui.card>
        <x-components::ui.card size="sm">Small Card</x-components::ui.card>
        <x-components::ui.card size="md">Medium Card</x-components::ui.card>
        <x-components::ui.card size="lg">Large Card</x-components::ui.card>
        <x-components::ui.card size="xl">Extra Large Card</x-components::ui.card>
    </div>
</x-demo>
@endblade

```html
<x-ui.card size="xs">Extra Small Card</x-ui.card>
<x-ui.card size="sm">Small Card</x-ui.card>
<x-ui.card size="md">Medium Card</x-ui.card>
<x-ui.card size="lg">Large Card</x-ui.card>
<x-ui.card size="xl">Extra Large Card</x-ui.card>
```

## Component Props

| Prop Name | Type   | Default | Required | Description                                               |
| --------- | ------ | ------- | -------- | --------------------------------------------------------- |
| `size`    | string | `md`    | No       | Sets max-width constraint (`xs`, `sm`, `md`, `lg`, `xl`)  |
| `class`   | string | `''`    | No       | Additional Tailwind classes applied to the card container |
