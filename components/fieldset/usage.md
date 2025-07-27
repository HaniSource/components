---
name: 'fieldset'
---

## Introduction

The `fieldset` component provides a semantic and visually appealing way to group related form fields. It features automatic spacing management for nested fields, optional labeling with legend support, and consistent styling that works perfectly in both light and dark modes. Perfect for organizing complex forms into logical sections.

## Basic Usage

@blade
<x-demo>
    <x-ui.fieldset label="Personal Information">
        <x-ui.field required>
            <x-ui.label>Full Name</x-ui.label>
            <x-ui.input placeholder="John Doe" />
        </x-ui.field>
        
        <x-ui.field required>
            <x-ui.label>Email Address</x-ui.label>
            <x-ui.input type="email" placeholder="john@example.com" />
        </x-ui.field>
        
        <x-ui.field>
            <x-ui.label>Phone Number</x-ui.label>
            <x-ui.input type="tel" placeholder="+1 (555) 123-4567" />
        </x-ui.field>
    </x-ui.fieldset>
</x-demo>
@endblade

```html
<x-ui.fieldset label="Personal Information">
    <x-ui.field required>
        <x-ui.label>Full Name</x-ui.label>
        <x-ui.input placeholder="John Doe" />
    </x-ui.field>
    
    <x-ui.field required>
        <x-ui.label>Email Address</x-ui.label>
        <x-ui.input type="email" placeholder="john@example.com" />
    </x-ui.field>
    
    <x-ui.field>
        <x-ui.label>Phone Number</x-ui.label>
        <x-ui.input type="tel" placeholder="+1 (555) 123-4567" />
    </x-ui.field>
</x-ui.fieldset>
```

## Without Label

Create fieldsets without visible labels for simple grouping.

@blade
<x-demo>
    <x-ui.fieldset>
        <x-ui.field required>
            <x-ui.label>Username</x-ui.label>
            <x-ui.input placeholder="johndoe" />
        </x-ui.field>
        
        <x-ui.field required>
            <x-ui.label>Password</x-ui.label>
            <x-ui.input type="password" placeholder="••••••••" />
        </x-ui.field>
    </x-ui.fieldset>
</x-demo>
@endblade

```html
<x-ui.fieldset>
    <x-ui.field required>
        <x-ui.label>Username</x-ui.label>
        <x-ui.input placeholder="johndoe" />
    </x-ui.field>
    
    <x-ui.field required>
        <x-ui.label>Password</x-ui.label>
        <x-ui.input type="password" placeholder="••••••••" />
    </x-ui.field>
</x-ui.fieldset>
```
## Multiple Fieldsets

Organize complex forms with multiple fieldsets for different sections.

@blade
<x-demo>
    <div class="space-y-6">
        <x-ui.fieldset label="Account Information">
            <x-ui.field required>
                <x-ui.label>Full Name</x-ui.label>
                <x-ui.input placeholder="John Doe" />
            </x-ui.field>
            
            <x-ui.field required>
                <x-ui.label>Email Address</x-ui.label>
                <x-ui.input type="email" placeholder="john@example.com" />
            </x-ui.field>
        </x-ui.fieldset>
        
        <x-ui.fieldset label="Professional Details">
            <x-ui.field>
                <x-ui.label>Company</x-ui.label>
                <x-ui.input placeholder="Acme Inc." />
            </x-ui.field>
            
            <x-ui.field required>
                <x-ui.label>Role</x-ui.label>
                <x-ui.select>
                    <x-ui.select.option value="developer">Developer</x-ui.select.option>
                    <x-ui.select.option value="designer">Designer</x-ui.select.option>
                    <x-ui.select.option value="manager">Manager</x-ui.select.option>
                </x-ui.select>
            </x-ui.field>
        </x-ui.fieldset>
        

    </div>
</x-demo>
@endblade

```html
<div class="space-y-6">
    <x-ui.fieldset label="Account Information">
        <x-ui.field required>
            <x-ui.label>Full Name</x-ui.label>
            <x-ui.input placeholder="John Doe" />
        </x-ui.field>
        
        <x-ui.field required>
            <x-ui.label>Email Address</x-ui.label>
            <x-ui.input type="email" placeholder="john@example.com" />
        </x-ui.field>
    </x-ui.fieldset>
    
    <x-ui.fieldset label="Professional Details">
        <x-ui.field>
            <x-ui.label>Company</x-ui.label>
            <x-ui.input placeholder="Acme Inc." />
        </x-ui.field>
        
        <x-ui.field required>
            <x-ui.label>Role</x-ui.label>
            <x-ui.select>
                <x-ui.select.option value="developer">Developer</x-ui.select.option>
                <x-ui.select.option value="designer">Designer</x-ui.select.option>
                <x-ui.select.option value="manager">Manager</x-ui.select.option>
            </x-ui.select>
        </x-ui.field>
    </x-ui.fieldset>
</div>
```

## Grid Layout Inside Fieldset

Combine fieldsets with grid layouts for responsive form organization.

@blade
<x-demo>
    <x-ui.fieldset label="Contact Information">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <x-ui.field required>
                <x-ui.label>First Name</x-ui.label>
                <x-ui.input placeholder="John" />
            </x-ui.field>
            
            <x-ui.field required>
                <x-ui.label>Last Name</x-ui.label>
                <x-ui.input placeholder="Doe" />
            </x-ui.field>
        </div>
        
        <x-ui.field required>
            <x-ui.label>Email Address</x-ui.label>
            <x-ui.input type="email" placeholder="john.doe@example.com" />
        </x-ui.field>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <x-ui.field>
                <x-ui.label>Phone</x-ui.label>
                <x-ui.input type="tel" placeholder="+1 (555) 123-4567" />
            </x-ui.field>
            
            <x-ui.field>
                <x-ui.label>Country</x-ui.label>
                <x-ui.select>
                    <x-ui.select.option value="us">United States</x-ui.select.option>
                    <x-ui.select.option value="ca">Canada</x-ui.select.option>
                    <x-ui.select.option value="uk">United Kingdom</x-ui.select.option>
                </x-ui.select>
            </x-ui.field>
        </div>
    </x-ui.fieldset>
</x-demo>
@endblade

```html
<x-ui.fieldset label="Contact Information">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <x-ui.field required>
            <x-ui.label>First Name</x-ui.label>
            <x-ui.input placeholder="John" />
        </x-ui.field>
        
        <x-ui.field required>
            <x-ui.label>Last Name</x-ui.label>
            <x-ui.input placeholder="Doe" />
        </x-ui.field>
    </div>
    
    <x-ui.field required>
        <x-ui.label>Email Address</x-ui.label>
        <x-ui.input type="email" placeholder="john.doe@example.com" />
    </x-ui.field>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <x-ui.field>
            <x-ui.label>Phone</x-ui.label>
            <x-ui.input type="tel" placeholder="+1 (555) 123-4567" />
        </x-ui.field>
        
        <x-ui.field>
            <x-ui.label>Country</x-ui.label>
            <x-ui.select>
                <x-ui.select.option value="us">United States</x-ui.select.option>
                <x-ui.select.option value="ca">Canada</x-ui.select.option>
                <x-ui.select.option value="uk">United Kingdom</x-ui.select.option>
            </x-ui.select>
        </x-ui.field>
    </div>
</x-ui.fieldset>
```

## Complex Form Example

A real-world example showing how fieldsets organize a complete registration form.

@blade
<x-demo>
    <form class="space-y-6">
        <x-ui.fieldset label="Account Information">
            <x-ui.field required>
                <x-ui.label>Full Name</x-ui.label>
                <x-ui.description>Your first and last name as it will appear on your profile</x-ui.description>
                <x-ui.input placeholder="John Doe" />
                <x-ui.error>This field is required</x-ui.error>
            </x-ui.field>

            <x-ui.field required>
                <x-ui.label>Email Address</x-ui.label>
                <x-ui.input type="email" placeholder="john@example.com" />
            </x-ui.field>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <x-ui.field required>
                    <x-ui.label>Password</x-ui.label>
                    <x-ui.input type="password" placeholder="••••••••" />
                </x-ui.field>

                <x-ui.field required>
                    <x-ui.label>Confirm Password</x-ui.label>
                    <x-ui.input type="password" placeholder="••••••••" />
                </x-ui.field>
            </div>
        </x-ui.fieldset>

        <x-ui.fieldset label="Professional Details">
            <x-ui.field>
                <x-ui.label>Company</x-ui.label>
                <x-ui.description>Optional - the company you work for</x-ui.description>
                <x-ui.input placeholder="Acme Inc." />
            </x-ui.field>

            <x-ui.field required>
                <x-ui.label>Role</x-ui.label>
                <x-ui.select>
                    <x-ui.select.option value="developer">Developer</x-ui.select.option>
                    <x-ui.select.option value="designer">Designer</x-ui.select.option>
                    <x-ui.select.option value="manager">Manager</x-ui.select.option>
                    <x-ui.select.option value="other">Other</x-ui.select.option>
                </x-ui.select>
            </x-ui.field>

            <x-ui.field>
                <x-ui.label>Bio</x-ui.label>
                <x-ui.description>Tell us a bit about yourself (optional)</x-ui.description>
                <x-ui.textarea rows="4" placeholder="I'm a passionate developer who loves building..."></x-ui.textarea>
            </x-ui.field>
        </x-ui.fieldset>

        <div class="flex justify-end pt-6">
            <x-ui.button type="submit" variant="primary">
                Create Account
            </x-ui.button>
        </div>
    </form>
</x-demo>
@endblade

```html
<form class="space-y-6">
    <x-ui.fieldset label="Account Information">
        <x-ui.field required>
            <x-ui.label>Full Name</x-ui.label>
            <x-ui.description>Your first and last name as it will appear on your profile</x-ui.description>
            <x-ui.input placeholder="John Doe" />
            <x-ui.error>This field is required</x-ui.error>
        </x-ui.field>

        <x-ui.field required>
            <x-ui.label>Email Address</x-ui.label>
            <x-ui.input type="email" placeholder="john@example.com" />
        </x-ui.field>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <x-ui.field required>
                <x-ui.label>Password</x-ui.label>
                <x-ui.input type="password" placeholder="••••••••" />
            </x-ui.field>

            <x-ui.field required>
                <x-ui.label>Confirm Password</x-ui.label>
                <x-ui.input type="password" placeholder="••••••••" />
            </x-ui.field>
        </div>
    </x-ui.fieldset>

    <x-ui.fieldset label="Professional Details">
        <x-ui.field>
            <x-ui.label>Company</x-ui.label>
            <x-ui.description>Optional - the company you work for</x-ui.description>
            <x-ui.input placeholder="Acme Inc." />
        </x-ui.field>

        <x-ui.field required>
            <x-ui.label>Role</x-ui.label>
            <x-ui.select>
                <x-ui.select.option value="developer">Developer</x-ui.select.option>
                <x-ui.select.option value="designer">Designer</x-ui.select.option>
                <x-ui.select.option value="manager">Manager</x-ui.select.option>
                <x-ui.select.option value="other">Other</x-ui.select.option>
            </x-ui.select>
        </x-ui.field>

        <x-ui.field>
            <x-ui.label>Bio</x-ui.label>
            <x-ui.description>Tell us a bit about yourself (optional)</x-ui.description>
            <x-ui.textarea rows="4" placeholder="I'm a passionate developer who loves building..."></x-ui.textarea>
        </x-ui.field>
    </x-ui.fieldset>

    <div class="flex justify-end pt-6">
        <x-ui.button type="submit" variant="primary">
            Create Account
        </x-ui.button>
    </div>
</form>
```

## Component Props

### Fieldset

| Prop Name | Type | Default | Required | Description |
|-----------|------|---------|----------|-------------|
| `label` | string | `null` | No | The fieldset legend text |
| `labelHidden` | boolean | `false` | No | Whether to visually hide the label (but keep it accessible) |
| `class` | string | `''` | No | Additional CSS classes |

## Features

- **Automatic Spacing**: Intelligent spacing management for nested field components
- **Semantic HTML**: Uses proper `<fieldset>` and `<legend>` elements for accessibility
- **Dark Mode**: Full support for light and dark themes
- **Flexible Layout**: Works with any layout system (grid, flexbox, etc.)
- **Screen Reader Friendly**: Proper ARIA support and semantic structure
- **Nested Support**: Can contain other fieldsets for complex form organization