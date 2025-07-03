---
name: heading
---

## Introduction

The `Heading` component is a **responsive**, **unstyled** heading component designed for content encapsulation. It's built to provide sensible default spacing, consistent border styling, and dark mode support without enforcing layout or design opinion.

You can drop it in and immediately start composing UIs with clarity and structure—no need to reinvent wrappers every time.

---

## Installation
Use the [fluxtor artisan command](/docs/cli-reference#fluxtorinstall) to install the `heading` component easily:

```bash
php artisan fluxtor:install heading
```

> Once installed, you can use the <x-ui.heading /> component in any Blade view.

## Usage

@blade
<x-demo>
    <div class="w-full">
        <x-components::ui.heading class="mt-4 mb-4 leading-0 " level="h2" size="sm">
            Welcome to Fluxtor.
        </x-components::ui.heading>
    </div>
</x-demo>
@endblade

```html
    <x-ui.heading level="h2" size="sm">
        Welcome to Fluxtor.
    </x-ui.heading>
```

## Customization

#### Size
The `size` prop controls the sizer of the heading. Default is `sm`.

@blade
<x-demo>
    <div class="w-full space-y-2">
        <x-components::ui.heading size="xs">Extra Small heading</x-components::ui.heading>
        <x-components::ui.heading size="sm">Small heading</x-components::ui.heading>
        <x-components::ui.heading size="md">Medium heading</x-components::ui.heading>
        <x-components::ui.heading size="lg">Large heading</x-components::ui.heading>
        <x-components::ui.heading size="xl">Extra Large heading</x-components::ui.heading>
    </div>
</x-demo>
@endblade

```html
<x-ui.heading size="xs">Extra Small heading</x-ui.heading>
<x-ui.heading size="sm">Small heading</x-ui.heading>
<x-ui.heading size="md">Medium heading</x-ui.heading>
<x-ui.heading size="lg">Large heading</x-ui.heading>
<x-ui.heading size="xl">Extra Large heading</x-ui.heading>
```

## Component Props

| Prop Name | Type   | Default | Required | Description                                               |
| --------- | ------ | ------- | -------- | --------------------------------------------------------- |
| `size`    | string | `sm`    | No       | Sets max-width constraint (`xs`, `sm`, `md`, `lg`, `xl`)  |
| `level`   | string | `h2`    | No       | set the heading tag (from `h2` to `h6`)                   |
| `class`   | string | `''`    | No       | Additional Tailwind classes applied to the card container |
