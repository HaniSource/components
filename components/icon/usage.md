---
name: icon
---

## Introduction

The `Icon` component is designed to be **headless**, **customizable**, and **easy to use**. It supports two icon providers under the hood:

- [Heroicons](https://heroicons.com)
- [Phosphor Icons](https://phosphoricons.com)

We leverage [WireUI's wrappers](https://wireui.com) for both providers to deliver a simple and expressive interface.

> **Note:** You must install the relevant WireUI wrapper packages based on the icon provider you intend to use.

---
## Installation 

```shell
composer require wireui/heroicons
```

for using phosphor icon you need to install the wuireui's wrapper package

```shell
composer require wireui/phosphoricons
```


```html
    <!-- 24px, outline -->
    <x-components::ui.icon name="ps:airplay"  class="text-white"/> 
```

> Once installed, you can start using the <x-components::ui.icon /> component seamlessly in your views.

## Customization 

### Variants

Each variant offers different sizes and styles:
#### Hero icons
@blade
<x-demo>
    <x-components::ui.icon name="academic-cap"  class="text-white"/> 
    <x-components::ui.icon name="academic-cap" variant="solid" class="text-white"/>
    <x-components::ui.icon name="academic-cap" variant="mini" class="text-white"/>
    <x-components::ui.icon name="academic-cap" variant="micro" class="text-white"/>
</x-demo>
@endblade


```html
    <!-- 24px, outline -->
    <x-components::ui.icon name="academic-cap"  class="text-white"/> 
    <!-- 24px, solid -->
    <x-components::ui.icon name="academic-cap" variant="solid" class="text-white"/> 
    <!-- 20px, solid -->
    <x-components::ui.icon name="academic-cap" variant="mini" class="text-white"/> 
     <!-- 16px, solid -->
    <x-components::ui.icon name="academic-cap" variant="micro" class="text-white"/>
```

#### Phosphor icons

To use Phosphor icons, prefix the name with ps: or phosphor:.
@blade
<x-demo>
    <x-components::ui.icon name="ps:align-top" variant="thin" class="text-white"/>
    <x-components::ui.icon name="ps:align-top" variant="light" class="text-white"/>
    <x-components::ui.icon name="ps:align-top"  class="text-white"/> 
    <x-components::ui.icon name="ps:align-top" variant="duotone" class="text-white"/>
    <x-components::ui.icon name="ps:align-top" variant="bold" class="text-white"/>
    <x-components::ui.icon name="ps:align-top" variant="fill" class="text-white"/>
</x-demo>
@endblade


```html
    <!-- thin variant -->
    <x-components::ui.icon name="ps:align-top" variant="thin" class="text-white"/>
    <!-- light variant -->
    <x-components::ui.icon name="ps:align-top" variant="light" class="text-white"/>
    <!-- regular variant (default) -->
    <x-components::ui.icon name="ps:align-top"  class="text-white"/> 
    <!-- duotone variant  -->
    <x-components::ui.icon name="ps:align-top" variant="duotone" class="text-white"/>
    <!-- bold variant  -->
    <x-components::ui.icon name="ps:align-top" variant="bold" class="text-white"/>
    <!-- fill variant  -->
    <x-components::ui.icon name="ps:align-top" variant="fill" class="text-white"/>
```

### Sizes

@blade
<x-demo>
    <x-components::ui.icon name="cpu-chip"  class="size-12"/> 
    <x-components::ui.icon name="cpu-chip" variant="solid" class="size-12"/>
</x-demo>
@endblade

```html
<x-demo>
    <x-components::ui.icon name="academic-cap"  class="size-12"/> 
    <x-components::ui.icon name="academic-cap" variant="solid" class="size-12"/>
</x-demo>
```

Use Tailwind size utilities or ``size-*`` utilities (required for Phosphor icons).

If you're using **Phosphor icons** and no size is defined, the component applies a default ``size-6``.

> While you’re free to override the icon size, we recommend sticking with the provided variant sizes they’re crafted for optimal balance and clarity.

### Color styles

@blade
<x-demo>
    <x-components::ui.icon name="cpu-chip"  class="text-purple-500"/> 
    <x-components::ui.icon name="cpu-chip" variant="solid" class="bg-purple-300"/>
</x-demo>
@endblade

```html
<x-demo>
    <x-components::ui.icon name="academic-cap"  class="size-12"/> 
    <x-components::ui.icon name="academic-cap" variant="solid" class="size-12"/>
</x-demo>
```

## Component Props

| Prop Name | Type | Default | Required | Description |
|-----------|------|---------|----------|-------------|
| `name` | string | no default | Yes | Icon name. Prefix with ``ps``: or ``phosphor``: for Phosphor Icons |
| `variant` | string | outline | No |Icon style variant.|
| `class` | string | `''` | No | Tailwind class string to style the icon (size, color, etc). |