---
name: select
---

## Introduction

The `Select` component is a **versatile**, **accessible** dropdown selection component with advanced features like search, multi-selection, and customizable styling. It provides a modern alternative to native select elements with enhanced user experience and seamless Livewire integration.

## Installation
Use the [sheaf artisan command](/docs/guides/cli-installation#content-component-management) to install the `select` component easily:

```bash
php artisan sheaf:install select
```

> Once installed, you can use the `<x-ui.select />` component in any Blade view.

## Usage

@blade
<x-demo class="flex justify-center">
     <div
        class="w-full max-w-[17rem] mx-auto"
        x-data="{
            members:[]
        }"
    >
        <x-ui.select 
            placeholder="Team members"
            icon="users"
            x-model="members"
            searchable
            multiple
            clearable
            description="Search and select team members"
            >
                <x-ui.select.option value="john" icon="user">John Doe</x-ui.select.option>
                <x-ui.select.option value="jane" icon="user">Jane Smith</x-ui.select.option>
                <x-ui.select.option value="mike" icon="user">Mike Johnson</x-ui.select.option>
                <x-ui.select.option value="sarah" icon="user">Sarah Wilson</x-ui.select.option>
                <x-ui.select.option value="david" icon="user">David Brown</x-ui.select.option>
                <x-ui.select.option value="lisa" icon="user">Lisa Davis</x-ui.select.option>
        </x-ui.select>
    </div>
</x-demo>
@endblade

### Bind To Livewire

To use with Livewire you only need to use `wire:model="property"` to bind your input state:

```html
<x-ui.select 
    wire:model="country"
    placeholder="Choose a country..."
    >
        <x-ui.select.option value="us">United States</x-ui.select.option>
        <x-ui.select.option value="uk">United Kingdom</x-ui.select.option>
        <x-ui.select.option value="ca">Canada</x-ui.select.option>
        <x-ui.select.option value="au">Australia</x-ui.select.option>
        <x-ui.select.option value="de">Germany</x-ui.select.option>
        <x-ui.select.option value="fr">France</x-ui.select.option>
</x-ui.select>
```

### Using it within Blade & Alpine

You can use it outside Livewire with just Alpine (and Blade):

```html
<div x-data="{ country: '' }">
    <x-ui.select 
        x-model="country"
        placeholder="Choose a country..."
        >
            <x-ui.select.option value="us">United States</x-ui.select.option>
            <x-ui.select.option value="uk">United Kingdom</x-ui.select.option>
            <x-ui.select.option value="ca">Canada</x-ui.select.option>
            <x-ui.select.option value="au">Australia</x-ui.select.option>
            <x-ui.select.option value="de">Germany</x-ui.select.option>
            <x-ui.select.option value="fr">France</x-ui.select.option>
    </x-ui.select>
</div>
```

### Select with Icons

Enhance the select with leading icons and option-specific icons for better visual communication.

@blade
<x-demo class="flex justify-center">
    <div class="w-full max-w-[17rem] mx-auto">
        <x-ui.select 
            placeholder="Choose status..."
            icon="flag"
           >
                <x-ui.select.option value="active" icon="check-circle">Active</x-ui.select.option>
                <x-ui.select.option value="pending" icon="clock">Pending</x-ui.select.option>
                <x-ui.select.option value="inactive" icon="x-circle">Inactive</x-ui.select.option>
                <x-ui.select.option value="archived" icon="archive-box">Archived</x-ui.select.option>
        </x-ui.select>
    </div>
</x-demo>
@endblade

```html
<x-ui.select 
    placeholder="Choose status..."
    icon="flag"
    wire:model="selectedStatus">
        <x-ui.select.option value="active" icon="check-circle">Active</x-ui.select.option>
        <x-ui.select.option value="pending" icon="clock">Pending</x-ui.select.option>
        <x-ui.select.option value="inactive" icon="x-circle">Inactive</x-ui.select.option>
        <x-ui.select.option value="archived" icon="archive-box">Archived</x-ui.select.option>
</x-ui.select>
```

### Searchable Select

Add search functionality to easily find options in large lists.

@blade
<x-demo class="flex justify-center">
    <div class="w-full max-w-[17rem] mx-auto">
        <x-ui.select 
            placeholder="Find a city..."
            icon="map-pin"
            searchable
            description="Search through cities worldwide"
            >
                <x-ui.select.option value="nyc">New York City</x-ui.select.option>
                <x-ui.select.option value="london">London</x-ui.select.option>
                <x-ui.select.option value="paris">Paris</x-ui.select.option>
                <x-ui.select.option value="tokyo">Tokyo</x-ui.select.option>
                <x-ui.select.option value="sydney">Sydney</x-ui.select.option>
                <x-ui.select.option value="berlin">Berlin</x-ui.select.option>
        </x-ui.select>
    </div>
</x-demo>
@endblade

```html
<x-ui.select 
    placeholder="Find a city..."
    icon="map-pin"
    searchable
    description="Search through cities worldwide"
    wire:model="selectedCity">
        <x-ui.select.option value="nyc">New York City</x-ui.select.option>
        <x-ui.select.option value="london">London</x-ui.select.option>
        <x-ui.select.option value="paris">Paris</x-ui.select.option>
        <x-ui.select.option value="tokyo">Tokyo</x-ui.select.option>
        <x-ui.select.option value="sydney">Sydney</x-ui.select.option>
        <x-ui.select.option value="berlin">Berlin</x-ui.select.option>
</x-ui.select>
```

### Multiple Selection

Allow users to select multiple options with visual feedback.

@blade
<x-demo class="flex justify-center">
    <div
        class="w-full max-w-[17rem] mx-auto"
        x-data="{
            selectedSkills:[]
        }"
    >
        <x-ui.select 
            placeholder="Choose your skills..."
            icon="academic-cap"
            multiple
            x-model="selectedSkills"
            clearable
            description="Select all skills that apply"
            >
                <x-ui.select.option value="php" icon="code-bracket">PHP</x-ui.select.option>
                <x-ui.select.option value="javascript" icon="bolt">JavaScript</x-ui.select.option>
                <x-ui.select.option value="python" icon="variable">Python</x-ui.select.option>
                <x-ui.select.option value="react" icon="cube">React</x-ui.select.option>
                <x-ui.select.option value="vue" icon="sparkles">Vue.js</x-ui.select.option>
                <x-ui.select.option value="laravel" icon="academic-cap">Laravel</x-ui.select.option>
        </x-ui.select>
    </div>
</x-demo>
@endblade

```html
<x-ui.select 
    placeholder="Choose your skills..."
    icon="academic-cap"
    multiple
    clearable
    description="Select all skills that apply"
    wire:model="selectedSkills">
        <x-ui.select.option value="php" icon="code-bracket">PHP</x-ui.select.option>
        <x-ui.select.option value="javascript" icon="bolt">JavaScript</x-ui.select.option>
        <x-ui.select.option value="python" icon="variable">Python</x-ui.select.option>
        <x-ui.select.option value="react" icon="cube">React</x-ui.select.option>
        <x-ui.select.option value="vue" icon="sparkles">Vue.js</x-ui.select.option>
        <x-ui.select.option value="laravel" icon="academic-cap">Laravel</x-ui.select.option>
</x-ui.select>reduxui
```

### Searchable Multiple Selection

Combine search functionality with multiple selection for the best user experience.

@blade
<x-demo class="flex justify-center">
    <div
        class="w-full max-w-[17rem] mx-auto"
        x-data="{
            members:[]
        }"
    >
        <x-ui.select 
            placeholder="Search and select members..."
            icon="users"
            x-model="members"
            searchable
            multiple
            clearable
            description="Search and select team members"
            >
                <x-ui.select.option value="john" icon="user">John Doe</x-ui.select.option>
                <x-ui.select.option value="jane" icon="user">Jane Smith</x-ui.select.option>
                <x-ui.select.option value="mike" icon="user">Mike Johnson</x-ui.select.option>
                <x-ui.select.option value="sarah" icon="user">Sarah Wilson</x-ui.select.option>
                <x-ui.select.option value="david" icon="user">David Brown</x-ui.select.option>
                <x-ui.select.option value="lisa" icon="user">Lisa Davis</x-ui.select.option>
        </x-ui.select>
    </div>
</x-demo>
@endblade

```html
<x-ui.select 
    placeholder="Search and select members..."
    icon="users"
    searchable
    multiple
    clearable
    description="Search and select team members"
    wire:model="selectedMembers">
        <x-ui.select.option value="john" icon="user">John Doe</x-ui.select.option>
        <x-ui.select.option value="jane" icon="user">Jane Smith</x-ui.select.option>
        <x-ui.select.option value="mike" icon="user">Mike Johnson</x-ui.select.option>
        <x-ui.select.option value="sarah" icon="user">Sarah Wilson</x-ui.select.option>
        <x-ui.select.option value="david" icon="user">David Brown</x-ui.select.option>
        <x-ui.select.option value="lisa" icon="user">Lisa Davis</x-ui.select.option>
</x-ui.select>
```

### Validation States

Show different states for validation feedback.

@blade
<x-demo class="flex justify-center">
    <div class="w-full max-w-[17rem] mx-auto space-y-4">
        <x-ui.select 
            placeholder="Choose option..."
            icon="exclamation-circle"
            :invalid="true"
            description="Please select a valid option"
            >
                <x-ui.select.option value="option1">Option 1</x-ui.select.option>
                <x-ui.select.option value="option2">Option 2</x-ui.select.option>
        </x-ui.select>
    </div>
</x-demo>
@endblade

```html
<!-- Invalid state -->
<x-ui.select 
    placeholder="Choose option..."
    icon="exclamation-circle"
    invalid="true"
    description="Please select a valid option"
    wire:model="invalidSelection">
        <x-ui.select.option value="option1">Option 1</x-ui.select.option>
        <x-ui.select.option value="option2">Option 2</x-ui.select.option>
</x-ui.select>
```

### Disabled State

@blade
<x-demo class="flex justify-center">
    <div class="w-full max-w-[17rem] mx-auto">
        <x-ui.select 
            placeholder="This is disabled..."
            disabled
            >
                <x-ui.select.option value="option1">Option 1</x-ui.select.option>
                <x-ui.select.option value="option2">Option 2</x-ui.select.option>
        </x-ui.select>
    </div>
</x-demo>
@endblade

```html
<x-ui.select 
    placeholder="This is disabled..."
    disabled
    wire:model="disabledValue">
        <x-ui.select.option value="option1">Option 1</x-ui.select.option>
        <x-ui.select.option value="option2">Option 2</x-ui.select.option>
</x-ui.select>
```
## Customization

## Component Props

### Select Component

| Prop Name        | Type    | Default              | Required | Description                                                          |
| ---------------  | ------- | -------------------- | -------- | -------------------------------------------------------------------- |
| `name`           | string  | `wire:model`         | No       | Name attribute (auto-detected from wire:model)                       |
| `placeholder`    | string  | `'select...'`        | No       | Placeholder text for the trigger button                              |
| `searchable`     | boolean | `false`              | No       | Whether to enable search functionality                               |
| `multiple`       | boolean | `false`              | No       | Whether to allow multiple selections                                 |
| `clearable`      | boolean | `false`              | No       | Whether to show a clear button                                       |
| `disabled`       | boolean | `false`              | No       | Whether the select is disabled                                       |
| `icon`           | string  | `''`                 | No       | Leading icon name                                                    |
| `checkIcon`      | string  | `check`              | No       | Icon shown when option is selected                                   |
| `checkIconClass` | string  | `''`                 | No       | Additional CSS classes for the check icon                            |
| `iconAfter`   | string  | `'chevron-up-down'`  | No       | Trailing icon name                                                   |
| `invalid`        | boolean | `null`               | No       | Whether to show invalid/error state styling                          |
| `triggerClass`   | string  | `''`                 | No       | Additional CSS classes for the trigger button                        |
| `slot`           | mixed   | `''`                 | Yes      | Select options using `<x-ui.select.option>` components               |

### Select Option Component

| Prop Name        | Type   | Default | Required | Description                                           |
| ---------------- | ------ | ------- | -------- | ----------------------------------------------------- |
| `value`          | string | `''`    | Yes      | Value of the option                                   |
| `icon`           | string | `''`    | No       | Leading icon for the option                           |
| `iconClass`      | string | `''`    | No       | Additional CSS classes for the option icon            |
| `slot`           | mixed  | `''`    | No       | Option content (used as value if no value specified)  |

## Component Structure

The select component is built with multiple sub-components:

- **Main Component**: `<x-ui.select>` - The wrapper component
- **Options Container**: `<x-ui.select.options>` - Contains all option items
- **Option Item**: `<x-ui.select.option>` - Individual selectable option
- **Trigger**: `<x-ui.select.trigger>` - The clickable trigger button (internal)

## Advanced Examples

### Dynamic Options with Livewire

```php
// In your Livewire component
public $selectedCategories = [];
public $categories = [
    'web' => 'Web Development',
    'mobile' => 'Mobile Development',
    'design' => 'UI/UX Design',
    'backend' => 'Backend Development',
];
```

```html
<x-ui.select 
    placeholder="Choose categories..."
    multiple
    searchable
    clearable
    wire:model="selectedCategories">
        @endforeach
</x-ui.select>
```

### Conditional Options

```html
<x-ui.select 
    placeholder="Choose a plan..."
    wire:model="selectedPlan">
        <x-ui.select.option value="free" icon="gift">Free Plan</x-ui.select.option>
        <x-ui.select.option value="pro" icon="star">Pro Plan</x-ui.select.option>
        @if($user->isEnterprise())
            <x-ui.select.option value="enterprise" icon="building-office">Enterprise Plan</x-ui.select.option>
        @endif
</x-ui.select>
```