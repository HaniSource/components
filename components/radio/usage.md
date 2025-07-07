---
name: card
---

## Introduction

The `Radio` component is a responsive, accessible form control component designed for single-choice selection. It provides a clean foundation for building radio button groups with consistent styling, multiple variants, and seamless dark mode support.

**Key Features:**
- Multiple variants: default, segmented
- Horizontal and vertical layouts
- Icon support
- Optional descriptions
- Dark mode ready
- Accessible HTML structure with proper ARIA attributes
- Tailwind CSS integration

## Installation

Use the [fluxtor artisan command](/docs/cli-reference#fluxtorinstall) to install the `radio` component easily:

```bash
php artisan fluxtor:install radio
```

> Once installed, you can use the <x-ui.radio.group /> and <x-ui.radio.item /> components in any Blade view.

## Usage

### Basic Radio Group
@blade
<x-demo>
    <div class="w-full">
        <x-components::ui.radio.group label="Roles" >
            <x-components::ui.radio.item name="roles" value="backend" label="Back end" checked />
            <x-components::ui.radio.item name="roles" value="frontend" label="Front end" />
            <x-components::ui.radio.item name="roles" value="devops" label="DevOps" />
        </x-components::ui.radio.group>
    </div>
</x-demo>
@endblade

```html
    <x-ui.radio.group label="Roles">
        <x-ui.radio.item name="roles" value="backend" label="Back end" checked />
        <x-ui.radio.item name="roles" value="frontend" label="Front end" />
        <x-ui.radio.item name="roles" value="devops" label="DevOps" />
    </x-ui.radio.group>
```

### Radio with description

Add helpful descriptions to provide additional context for each option.

@blade
<x-demo>
    <div class="w-full">
        <x-components::ui.radio.group label="Permissions">
            <x-components::ui.radio.item name="permissions" value="administrator" label="Administrator" description="Administrator users can perform any action." checked />
            <x-components::ui.radio.item name="permissions" value="editor" label="Editor" description="Editor users have the ability to read, create, and update." />
            <x-components::ui.radio.item name="permissions" value="viewer" label="Viewer" description="Viewer users only have the ability to read. Create, and update are restricted." />
        </x-components::ui.radio.group>
    </div>
</x-demo>
@endblade

```html
<x-ui.radio.group label="Permissions">
    <x-ui.radio.item name="permissions" value="administrator" label="Administrator" description="Administrator users can perform any action." checked />
    <x-ui.radio.item name="permissions" value="editor" label="Editor" description="Editor users have the ability to read, create, and update." />
    <x-ui.radio.item name="permissions" value="viewer" label="Viewer" description="Viewer users only have the ability to read. Create, and update are restricted." />
</x-ui.radio.group>
```


### Segmented Radio (Horizontal)
Create a more compact, button-like appearance with the segmented variant.
@blade
<x-demo>
    <div class="w-full max-w-md mx-auto">
        <x-components::ui.radio.group label="View Mode"  variant="segmented" direction="horizontal">
            <x-components::ui.radio.item
            name="view-mode"
            value="list"
            label="List"
            />
            <x-components::ui.radio.item
            name="view-mode"
            value="grid"
            label="Grid"
            />
            <x-components::ui.radio.item
            name="view-mode"
            value="table"
            label="Table"
            checked
            />
        </x-components::ui.radio.group>
    </div>
</x-demo>
@endblade

```html
<x-ui.radio.group label="View Mode" variant="segmented" direction="horizontal">
    <x-ui.radio.item
    name="view-mode"
    value="list"
    label="List"
    />
    <x-ui.radio.item
    name="view-mode"
    value="grid"
    label="Grid"
    checked
    />
    <x-ui.radio.item
    name="view-mode"
    value="table"
    label="Table"
    />
</x-ui.radio.group>
```

### Segmented Radio with Icons
Enhance the segmented variant with icons for better visual communication.
@blade
<x-demo>
    <div class="w-full max-w-md mx-auto">
        <x-components::ui.radio.group label="Deployment Environment" variant="segmented" direction="horizontal">
            <x-components::ui.radio.item
            icon="code-bracket"
            name="environment"
            value="development"
            label="Development"
            />
            <x-components::ui.radio.item
            icon="beaker"
            name="environment"
            value="staging"
            label="Staging"
            checked
            />
            <x-components::ui.radio.item
            icon="globe-alt"
            name="environment"
            value="production"
            label="Production"
            />
        </x-components::ui.radio.group>
    </div>
</x-demo>
@endblade


```html
<x-ui.radio.group label="Deployment Environment" variant="segmented" direction="horizontal">
    <x-ui.radio.item
    icon="code-bracket"
    name="environment"
    value="development"
    label="Development"
    />
    <x-ui.radio.item
    icon="beaker"
    name="environment"
    value="staging"
    label="Staging"
    checked
    />
    <x-ui.radio.item
    icon="globe-alt"
    name="environment"
    value="production"
    label="Production"
    />
</x-ui.radio.group>
```