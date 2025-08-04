---
name: 'otp'
---

# OTP Input Component

## Introduction

The `otp` component provides a secure and user-friendly way to handle One-Time Password (OTP) input. It features automatic focus progression, paste handling, validation with custom patterns, accessibility support, and seamless integration with both Livewire and Alpine.js. Perfect for authentication flows, verification codes, and any multi-digit input scenarios.

## Basic Usage

@blade
<x-demo class="flex justify-center !text-start" x-data="{ code: null }">
    <x-ui.otp 
        x-model="code" 
    />
</x-demo>
@endblade

```html
<x-ui.otp 
    wire:model="verificationCode"
/>
```

### Bind To Livewire

To use with Livewire you need to only use `wire:model="code"` to bind your OTP state:
```php
<!--
    this asume you have $verificationCode in your class component
-->

<div class="max-w-md mx-auto">
    <x-ui.otp 
        wire:model="verificationCode"
    />
</div>
```

### Using it within Blade & Alpine

You can use it outside Livewire with just Alpine (with Blade):

```html
<div class="max-w-md mx-auto" x-data="{ code: null }">
    <x-ui.otp 
        x-model="code" 
    />
</div>
```

Because we're making this possible using (like) the `x-modelable` API, so you can't use `state` as a variable name because the component uses it internally.

## Customization

### Custom Length

Control the number of input fields with the `length` parameter.

@blade
<x-demo class="flex justify-center !text-start" x-data="{ code4: null, code6: null, code8: null }">
    <div class="space-y-4">
        <div>
            <label class="block text-sm font-medium mb-2">4-digit code (default)</label>
            <x-ui.otp 
                x-model="code4"
                :length="4"
            />
        </div>
        <div>
            <label class="block text-sm font-medium mb-2">6-digit code</label>
            <x-ui.otp 
                x-model="code6"
                :length="6"
            />
        </div>
        <div>
            <label class="block text-sm font-medium mb-2">8-digit code</label>
            <x-ui.otp 
                x-model="code8"
                :length="8"
            />
        </div>
    </div>
</x-demo>
@endblade

```html
<x-ui.otp 
    wire:model="code4"
    :length="4"
/>
<x-ui.otp 
    wire:model="code6"
    :length="6"
/>
<x-ui.otp 
    wire:model="code8"
    :length="8"
/>
```

### Sloted Inputs
you can pass the individual inputs as a slot and you tweack it as you need 

> note we're using `<x-ui.otp.input>` not the native input 
 
@blade
<x-demo class="flex justify-center !text-start">
    <div 
        x-data="{
            code: null,
        }" 
        class="max-w-md mx-auto">
        <x-ui.otp x-model="code">
            <x-ui.otp.input class="rounded-full m-2" />
            <x-ui.otp.input class="rounded-full m-2"/>
            <x-ui.otp.input class="rounded-full m-2"/>
            <x-ui.otp.input class="rounded-full m-2"/>
            <x-ui.otp.input class="rounded-full m-2"/>
        </x-ui.otp>    
    </div>
</x-demo>
@endblade

```html
<x-ui.otp
    wire:model="code"
>
    <x-ui.otp.input class="rounded-full m-2" />
    <x-ui.otp.input class="rounded-full m-2"/>
    <x-ui.otp.input class="rounded-full m-2"/>
    <x-ui.otp.input class="rounded-full m-2"/>
    <x-ui.otp.input class="rounded-full m-2"/>
</x-ui.otp>    
```


### Separator 

@blade
<x-demo class="flex justify-center !text-start">
    <div 
        x-data="{
            code: null,
        }" 
        class="max-w-md mx-auto">
        <x-ui.otp x-model="code">
            <x-ui.otp.input />
            <x-ui.otp.input  />
            <x-ui.otp.separator/>
            <x-ui.otp.input />
            <x-ui.otp.input />
            <x-ui.otp.separator/>
            <x-ui.otp.input />
            <x-ui.otp.input />
        </x-ui.otp>    
    </div>
</x-demo>
@endblade

```html
<x-ui.otp
    wire:model="code"
>
    <x-ui.otp.input />
    <x-ui.otp.input/>
    
    <x-ui.otp.separator/>
    
    <x-ui.otp.input />
    <x-ui.otp.input />
    
    <x-ui.otp.separator/>
    
    <x-ui.otp.input />
    <x-ui.otp.input />
</x-ui.otp>    
```


### Input Types and Validation

Control what characters are allowed with different input types and patterns.

@blade
<x-demo class="flex justify-center !text-start" x-data="{ numericCode: null, alphanumericCode: null, customCode: null }">
    <div class="space-y-4">
        <div>
            <label class="block text-sm font-medium mb-2">Numeric only (default)</label>
            <x-ui.otp 
                x-model="numericCode"
                type="text"
                allowedPattern="[0-9]"
            />
        </div>
        <div>
            <label class="block text-sm font-medium mb-2">Alphanumeric</label>
            <x-ui.otp 
                x-model="alphanumericCode"
                type="text"
                allowedPattern="[A-Za-z0-9]"
            />
        </div>
        <div>
            <label class="block text-sm font-medium mb-2">Letters only</label>
            <x-ui.otp 
                x-model="customCode"
                type="text"
                allowedPattern="[A-Za-z]"
            />
        </div>
    </div>
</x-demo>
@endblade


```html
<x-ui.otp 
    wire:model="numericCode"
    type="text"
    allowedPattern="[0-9]"
/>
<x-ui.otp 
    wire:model="alphanumericCode"
    type="text"
    allowedPattern="[A-Za-z0-9]"
/>
<x-ui.otp 
    wire:model="letterCode"
    type="text"
    allowedPattern="[A-Za-z]"
/>
```

## Advanced Features

### Pre-filled Values

The component automatically handles external state synchronization and can display pre-filled values.

@blade
<x-demo class="flex justify-center !text-start" x-data="{ prefilledCode: '1234' }">
    <div>
        <label class="block text-sm font-medium mb-2">Pre-filled code</label>
        <x-ui.otp 
            x-model="prefilledCode"
        />
        <p class="text-sm text-gray-600 mt-2">Current value: <span x-text="prefilledCode"></span></p>
    </div>
</x-demo>
@endblade

```html
<div x-data="{ code: '1234' }">
    <x-ui.otp x-model="code" />
</div>
```

### Paste Handling

The component intelligently handles pasted content, filtering valid characters and auto-filling inputs.

@blade
<x-demo class="flex justify-center !text-start" x-data="{ pasteCode: null }">
    <div>
        <label class="block text-sm font-medium mb-2">Try pasting "12345678" or "abc123xyz"</label>
        <x-ui.otp 
            x-model="pasteCode"
            :length="6"
        />
        <p class="text-sm text-gray-600 mt-2">The component will extract valid digits and fill the inputs automatically.</p>
    </div>
</x-demo>
@endblade

### Real-time Validation

Monitor input changes in real-time with Alpine.js effects.

@blade
<x-demo class="flex justify-center !text-start">
    <div 
        x-data="{
            code: null,
            isValid: false,
        }"
        x-init="
            queueMicrotask(() => {
                Alpine.effect(() => {
                   console.log('here')
                    isValid = code && code.length === 4;
                });
            });
        "
    >
        <label class="block text-sm font-medium mb-2">Enter 4-digit code</label>
        <x-ui.otp x-model="code" />
        <div class="mt-2">
            <span x-show="isValid" style="display: none;" class="text-green-600 text-sm">✓ Valid code entered</span>
            <span x-show="!isValid" style="display: none;" class="text-red-600 text-sm">Please enter a complete 4-digit code</span>
        </div>
    </div>
</x-demo>
@endblade

```html
<div 
    x-data="{
        code: null,
        isValid: false,
    }"
    x-init="
         queueMicrotask(() => {
            Alpine.effect(() => {
                console.log('here')
                isValid = code && code.length === 4;
            });
        });
    "
>
    <label class="block text-sm font-medium mb-2">Enter 4-digit code</label>
    <x-ui.otp x-model="code" />
    <div class="mt-2">
        <span x-show="isValid" style="display: none;" class="text-green-600 text-sm">✓ Valid code entered</span>
        <span x-show="!isValid" style="display: none;" class="text-red-600 text-sm">Please enter a complete 4-digit code</span>
    </div>
</div>
```

## Component Props

| Prop Name | Type | Default | Required | Description |
|-----------|------|---------|----------|-------------|
| `length` | integer | `4` | No | Number of input fields to render |
| `type` | string | `'text'` | No | HTML input type attribute |
| `allowedPattern` | string | `'[0-9]'` | No | Regex pattern for allowed characters |
| `wire:model` | string | - | Yes* | Livewire property to bind to |
| `x-model` | string | - | Yes* | Alpine.js property to bind to |
| `class` | string | `'contents'` | No | Additional CSS classes for container |

*Either `wire:model` or `x-model` is required

## Technical Notes

- Uses `queueMicrotask()` to prevent race conditions during DOM updates
- Synchronizes external state changes automatically
- Handles edge cases like partial pastes and invalid character filtering