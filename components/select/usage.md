---
name: select
---

## Introduction

The `Select` component is a **versatile**, **accessible** dropdown selection component with advanced features like search, multi-selection, and customizable styling. It provides a modern alternative to native select elements with enhanced user experience and seamless Livewire integration.

**Key Features:**
- Single and multiple selection modes
- Searchable dropdown with real-time filtering
- Livewire integration with wire:model
- Clearable selection option
- Icon support (leading, trailing, and option icons)
- Dark mode ready
- Accessible dropdown with proper ARIA attributes
- Keyboard navigation support
- Customizable styling and validation states

## Installation
Use the [fluxtor artisan command](/docs/cli-reference#fluxtorinstall) to install the `select` component easily:

```bash
php artisan fluxtor:install select
```

> Once installed, you can use the `<x-ui.select />` component in any Blade view.

### Real-world Example
@blade
<x-demo>
    <div class="grid gap-6 md:grid-cols-2">
        <x-components::ui.card size="lg">
            <x-components::ui.heading level="h3" class="mb-4">User Role Selection</x-components::ui.heading>
            <x-components::ui.select 
                label="Select Role" 
                placeholder="Choose user role..." 
                icon="user" 
                clearable
                description="Select the appropriate role for this user"
                >
                    <x-ui.select.option value="admin" icon="shield-check">Administrator</x-ui.select.option>
                    <x-ui.select.option value="editor" icon="pencil">Editor</x-ui.select.option>
                    <x-ui.select.option value="viewer" icon="eye">Viewer</x-ui.select.option>
                    <x-ui.select.option value="guest" icon="user">Guest</x-ui.select.option>
            </x-components::ui.select>
        </x-components::ui.card>
        <x-components::ui.card size="lg">
            <x-components::ui.heading level="h3" class="mb-4">Technology Stack</x-components::ui.heading>
            <x-components::ui.select 
                label="Select Technologies" 
                placeholder="Choose technologies..." 
                icon="code-bracket" 
                searchable
                multiple
                clearable
                description="Select multiple technologies for your project"
                >
                    <x-ui.select.option value="laravel" icon="academic-cap">Laravel</x-ui.select.option>
                    <x-ui.select.option value="vue" icon="cube">Vue.js</x-ui.select.option>
                    <x-ui.select.option value="react" icon="bolt">React</x-ui.select.option>
                    <x-ui.select.option value="tailwind" icon="paint-brush">Tailwind CSS</x-ui.select.option>
                    <x-ui.select.option value="alpine" icon="variable">Alpine.js</x-ui.select.option>
            </x-components::ui.select>
        </x-components::ui.card>
    </div>
</x-demo>
@endblade

## Usage

### Basic Select

@blade
<x-demo>
    <div class="w-full max-w-md mx-auto">
        <x-components::ui.select 
            label="Select Country" 
            placeholder="Choose a country..."
            >
                <x-ui.select.option value="us">United States</x-ui.select.option>
                <x-ui.select.option value="uk">United Kingdom</x-ui.select.option>
                <x-ui.select.option value="ca">Canada</x-ui.select.option>
                <x-ui.select.option value="au">Australia</x-ui.select.option>
                <x-ui.select.option value="de">Germany</x-ui.select.option>
                <x-ui.select.option value="fr">France</x-ui.select.option>
        </x-components::ui.select>
    </div>
</x-demo>
@endblade

```html
<x-ui.select 
    label="Select Country" 
    placeholder="Choose a country..."
    wire:model="selectedCountry">
        <x-ui.select.option value="us">United States</x-ui.select.option>
        <x-ui.select.option value="uk">United Kingdom</x-ui.select.option>
        <x-ui.select.option value="ca">Canada</x-ui.select.option>
        <x-ui.select.option value="au">Australia</x-ui.select.option>
        <x-ui.select.option value="de">Germany</x-ui.select.option>
        <x-ui.select.option value="fr">France</x-ui.select.option>
</x-ui.select>
```

### Select with Icons

Enhance the select with leading icons and option-specific icons for better visual communication.

@blade
<x-demo>
    <div class="w-full max-w-md mx-auto">
        <x-components::ui.select 
            label="Select Status" 
            placeholder="Choose status..."
            icon="flag"
           >
                <x-ui.select.option value="active" icon="check-circle">Active</x-ui.select.option>
                <x-ui.select.option value="pending" icon="clock">Pending</x-ui.select.option>
                <x-ui.select.option value="inactive" icon="x-circle">Inactive</x-ui.select.option>
                <x-ui.select.option value="archived" icon="archive-box">Archived</x-ui.select.option>
        </x-components::ui.select>
    </div>
</x-demo>
@endblade

```html
<x-ui.select 
    label="Select Status" 
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
<x-demo>
    <div class="w-full max-w-md mx-auto">
        <x-components::ui.select 
            label="Search Cities" 
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
        </x-components::ui.select>
    </div>
</x-demo>
@endblade

```html
<x-ui.select 
    label="Search Cities" 
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
<x-demo>
    <div class="w-full max-w-md mx-auto">
        <x-components::ui.select 
            label="Select Skills" 
            placeholder="Choose your skills..."
            icon="academic-cap"
            multiple
            clearable
            description="Select all skills that apply"
            >
                <x-ui.select.option value="php" icon="code-bracket">PHP</x-ui.select.option>
                <x-ui.select.option value="javascript" icon="bolt">JavaScript</x-ui.select.option>
                <x-ui.select.option value="python" icon="variable">Python</x-ui.select.option>
                <x-ui.select.option value="react" icon="cube">React</x-ui.select.option>
                <x-ui.select.option value="vue" icon="sparkles">Vue.js</x-ui.select.option>
                <x-ui.select.option value="laravel" icon="academic-cap">Laravel</x-ui.select.option>
        </x-components::ui.select>
    </div>
</x-demo>
@endblade

```html
<x-ui.select 
    label="Select Skills" 
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
</x-ui.select>
```

### Searchable Multiple Selection

Combine search functionality with multiple selection for the best user experience.

@blade
<x-demo>
    <div class="w-full max-w-md mx-auto">
        <x-components::ui.select 
            label="Select Team Members" 
            placeholder="Search and select members..."
            icon="users"
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
        </x-components::ui.select>
    </div>
</x-demo>
@endblade

```html
<x-ui.select 
    label="Select Team Members" 
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
<x-demo>
    <div class="w-full max-w-md mx-auto space-y-4">
        <x-components::ui.select 
            label="Valid Selection" 
            placeholder="Choose option..."
            icon="check-circle"
            >
                <x-ui.select.option value="option1">Valid Option 1</x-ui.select.option>
                <x-ui.select.option value="option2">Valid Option 2</x-ui.select.option>
        </x-components::ui.select>
        <x-components::ui.select 
            label="Invalid Selection" 
            placeholder="Choose option..."
            icon="exclamation-circle"
            invalid="true"
            description="Please select a valid option"
            >
                <x-ui.select.option value="option1">Option 1</x-ui.select.option>
                <x-ui.select.option value="option2">Option 2</x-ui.select.option>
        </x-components::ui.select>
    </div>
</x-demo>
@endblade

```html
<!-- Valid state -->
<x-ui.select 
    label="Valid Selection" 
    placeholder="Choose option..."
    icon="check-circle"
    wire:model="validSelection">
        <x-ui.select.option value="option1">Valid Option 1</x-ui.select.option>
        <x-ui.select.option value="option2">Valid Option 2</x-ui.select.option>
</x-ui.select>

<!-- Invalid state -->
<x-ui.select 
    label="Invalid Selection" 
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
<x-demo>
    <div class="w-full max-w-md mx-auto">
        <x-components::ui.select 
            label="Disabled Select" 
            placeholder="This is disabled..."
            disabled
            >
                <x-ui.select.option value="option1">Option 1</x-ui.select.option>
                <x-ui.select.option value="option2">Option 2</x-ui.select.option>
        </x-components::ui.select>
    </div>
</x-demo>
@endblade

```html
<x-ui.select 
    label="Disabled Select" 
    placeholder="This is disabled..."
    disabled
    wire:model="disabledValue">
        <x-ui.select.option value="option1">Option 1</x-ui.select.option>
        <x-ui.select.option value="option2">Option 2</x-ui.select.option>
</x-ui.select>
```

## Keyboard Navigation

The select component supports the following keyboard interactions:

- **Arrow Up/Down**: Navigate through dropdown options
- **Enter**: Select the highlighted option
- **Escape**: Close the dropdown
- **Tab**: Close dropdown and move to next field
- **Typing**: Filter options in real-time (when searchable)

## Accessibility Features

- **ARIA attributes**: Proper labeling and roles for screen readers
- **Keyboard navigation**: Full keyboard support
- **Focus management**: Proper focus handling and focus trapping
- **Screen reader support**: Announces selections and changes
- **High contrast support**: Works with high contrast modes

## Customization

### Custom Trigger Classes

```html
<x-ui.select 
    label="Custom Styled" 
    triggerClass="bg-blue-50 border-blue-200 focus:border-blue-500"
    placeholder="Choose option..."
    wire:model="customValue">
        <x-ui.select.option value="option1">Option 1</x-ui.select.option>
        <x-ui.select.option value="option2">Option 2</x-ui.select.option>
</x-ui.select>
```

### Custom Option Icons

```html
<x-ui.select 
    label="Priority Level" 
    placeholder="Select priority..."
    wire:model="priority">
        <x-ui.select.option value="high" icon="exclamation-triangle" checkIcon="star">High Priority</x-ui.select.option>
        <x-ui.select.option value="medium" icon="minus-circle" checkIcon="check">Medium Priority</x-ui.select.option>
        <x-ui.select.option value="low" icon="chevron-down" checkIcon="check">Low Priority</x-ui.select.option>
</x-ui.select>
```

## Component Props

### Select Component

| Prop Name       | Type    | Default              | Required | Description                                                          |
| --------------- | ------- | -------------------- | -------- | -------------------------------------------------------------------- |
| `name`          | string  | `wire:model`         | No       | Name attribute (auto-detected from wire:model)                      |
| `label`         | string  | `''`                 | No       | Label text displayed above the select                                |
| `placeholder`   | string  | `'select...'`        | No       | Placeholder text for the trigger button                             |
| `description`   | string  | `''`                 | No       | Helper text displayed below the select                               |
| `variant`       | string  | `'native'`           | No       | Visual variant (currently only `native` supported)                  |
| `error`         | string  | `''`                 | No       | Error message to display                                             |
| `searchable`    | boolean | `false`              | No       | Whether to enable search functionality                               |
| `filter`        | boolean | `false`              | No       | Whether to enable filtering (legacy prop)                           |
| `multiple`      | boolean | `false`              | No       | Whether to allow multiple selections                                 |
| `clearable`     | boolean | `false`              | No       | Whether to show a clear button                                       |
| `disabled`      | boolean | `false`              | No       | Whether the select is disabled                                       |
| `icon`          | string  | `''`                 | No       | Leading icon name                                                    |
| `iconTrailing`  | string  | `'chevron-up-down'`  | No       | Trailing icon name                                                   |
| `invalid`       | boolean | `null`               | No       | Whether to show invalid/error state styling                          |
| `triggerClass`  | string  | `''`                 | No       | Additional CSS classes for the trigger button                        |
| `slot`          | mixed   | `''`                 | Yes      | Select options using `<x-ui.select.option>` components              |

### Select Option Component

| Prop Name        | Type   | Default | Required | Description                                           |
| ---------------- | ------ | ------- | -------- | ----------------------------------------------------- |
| `value`          | string | `''`    | Yes      | Value of the option                                   |
| `label`          | string | `null`  | No       | Label for the option (defaults to slot content)      |
| `checkIcon`      | string | `check` | No       | Icon shown when option is selected                    |
| `checkIconClass` | string | `''`    | No       | Additional CSS classes for the check icon             |
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
    label="Select Categories" 
    placeholder="Choose categories..."
    multiple
    searchable
    clearable
    wire:model="selectedCategories">
        @foreach($categories as $value => $label)
            <x-ui.select.option value="{{ $value }}">{{ $label }}</x-ui.select.option>
        @endforeach
</x-ui.select>
```

### Conditional Options

```html
<x-ui.select 
    label="Select Plan" 
    placeholder="Choose a plan..."
    wire:model="selectedPlan">
        <x-ui.select.option value="free" icon="gift">Free Plan</x-ui.select.option>
        <x-ui.select.option value="pro" icon="star">Pro Plan</x-ui.select.option>
        @if($user->isEnterprise())
            <x-ui.select.option value="enterprise" icon="building-office">Enterprise Plan</x-ui.select.option>
        @endif
</x-ui.select>
```