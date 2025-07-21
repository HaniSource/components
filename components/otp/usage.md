# OTP Input Component

## Introduction

The `otp-input` component provides a secure and user-friendly way to handle one-time password (OTP) and verification code inputs. It features intelligent auto-focus, paste handling, keyboard navigation, pattern validation, and full accessibility support. Perfect for two-factor authentication, SMS verification, email verification, or any multi-digit code input scenario.

## Basic Usage

@blade
<x-ui.otp
    wire:model="otpCode" 
    placeholder="Enter OTP"
/>
@endblade

```html
<x-ui.otp
    wire:model="otpCode" 
    placeholder="Enter OTP"
/>
```

The component creates a 4-digit numeric input by default, with automatic focus management and seamless user experience.

## Customization

### Input Count Variants

Configure the number of input fields based on your OTP requirements.

```html
<!-- 4-digit OTP (default) -->
<x-ui.otp
    wire:model="fourDigitOtp" 
    placeholder="4-digit code"
/>

<!-- 6-digit OTP -->
<x-ui.otp
    wire:model="sixDigitOtp" 
    :input-count="6"
    placeholder="6-digit code"
/>

<!-- 8-digit OTP -->
<x-ui.otp
    wire:model="eightDigitOtp" 
    :input-count="8"
    placeholder="8-digit code"
/>
```

### Size Variants

The component comes in three sizes: `sm`, `md` (default), and `lg`.

```html
<!-- Small size -->
<x-ui.otp
    wire:model="smallOtp" 
    size="sm"
    placeholder="Small OTP"
/>

<!-- Default size (md) -->
<x-ui.otp
    wire:model="defaultOtp" 
    placeholder="Default OTP"
/>

<!-- Large size -->
<x-ui.otp
    wire:model="largeOtp" 
    size="lg"
    placeholder="Large OTP"
/>
```

### Input Patterns

Control what characters are allowed in the OTP input.

```html
<!-- Numeric only (default) -->
<x-ui.otp
    wire:model="numericOtp" 
    allowed-pattern="[0-9]"
    placeholder="Numbers only"
/>

<!-- Alphanumeric -->
<x-ui.otp
    wire:model="alphanumericOtp" 
    allowed-pattern="[0-9A-Za-z]"
    placeholder="Letters & numbers"
/>

<!-- Uppercase letters only -->
<x-ui.otp
    wire:model="uppercaseOtp" 
    allowed-pattern="[A-Z]"
    placeholder="Uppercase letters"
/>

<!-- Hexadecimal -->
<x-ui.otp
    wire:model="hexOtp" 
    allowed-pattern="[0-9A-Fa-f]"
    placeholder="Hex characters"
/>
```

### Visual Styling

Customize the appearance with different visual styles.

```html
<!-- Outlined style (default) -->
<x-ui.otp
    wire:model="outlinedOtp" 
    style="outlined"
    placeholder="Outlined style"
/>

<!-- Filled style -->
<x-ui.otp
    wire:model="filledOtp" 
    style="filled"
    placeholder="Filled style"
/>

<!-- Underlined style -->
<x-ui.otp
    wire:model="underlinedOtp" 
    style="underlined"
    placeholder="Underlined style"
/>

<!-- Borderless style -->
<x-ui.otp
    wire:model="borderlessOtp" 
    style="borderless"
    placeholder="Borderless style"
/>
```

## Advanced Features

### Auto-Submit

Automatically trigger form submission when all fields are filled.

```html
<x-ui.otp
    wire:model="autoSubmitOtp" 
    :auto-submit="true"
    wire:submit="verifyOtp"
    placeholder="Auto-submit when complete"
/>
```

### Timer Integration

Display a countdown timer for OTP expiration.

```html
<x-ui.otp
    wire:model="timedOtp" 
    :show-timer="true"
    :timer-duration="300"
    timer-format="mm:ss"
    placeholder="OTP expires in 5 minutes"
/>
```

### Masking and Security

Control visibility of entered characters for enhanced security.

```html
<!-- Show characters briefly then mask -->
<x-ui.otp
    wire:model="maskedOtp" 
    :mask-after="1000"
    mask-char="•"
    placeholder="Masked after 1 second"
/>

<!-- Always show characters -->
<x-ui.otp
    wire:model="visibleOtp" 
    :mask-after="0"
    placeholder="Always visible"
/>

<!-- Immediately mask -->
<x-ui.otp
    wire:model="hiddenOtp" 
    :mask-after="0"
    mask-char="*"
    placeholder="Immediately masked"
/>
```

### Error Handling

Display validation errors and provide user feedback.

```html
<x-ui.otp
    wire:model="validatedOtp" 
    :show-errors="true"
    error-message="Invalid OTP. Please try again."
    shake-on-error="true"
    placeholder="Validation enabled"
/>
```

## States and Validation

### Disabled State

```html
<x-ui.otp
    wire:model="disabledOtp" 
    disabled
    placeholder="Disabled OTP input"
/>
```

### Loading State

Show loading indicator during verification.

```html
<x-ui.otp
    wire:model="loadingOtp" 
    :loading="true"
    loading-text="Verifying..."
    placeholder="Loading state"
/>
```

### Success State

Display success feedback after successful verification.

```html
<x-ui.otp
    wire:model="successOtp" 
    :success="true"
    success-message="OTP verified successfully!"
    placeholder="Success state"
/>
```

### Error State

Highlight errors with visual feedback.

```html
<x-ui.otp
    wire:model="errorOtp" 
    :error="true"
    error-message="Invalid OTP code"
    placeholder="Error state"
/>
```

## Paste Handling

The component intelligently handles pasted content, filtering and distributing characters across inputs.

```html
<x-ui.otp
    wire:model="pasteOtp" 
    :handle-paste="true"
    paste-separator=""
    placeholder="Paste your OTP here"
/>
```

## Keyboard Navigation

The component supports comprehensive keyboard navigation:

- **Arrow Left/Right**: Navigate between inputs
- **Backspace**: Delete current character or move to previous input
- **Delete**: Clear current input and move to next
- **Home**: Jump to first input
- **End**: Jump to last input
- **Ctrl+A**: Select all characters
- **Ctrl+V**: Paste OTP code
- **Tab**: Natural tab navigation
- **Escape**: Clear all inputs

## Auto-Complete Integration

Enable browser auto-complete for OTP inputs.

```html
<x-ui.otp
    wire:model="autocompleteOtp" 
    autocomplete="one-time-code"
    placeholder="Browser auto-complete enabled"
/>
```

## Accessibility

The component is fully accessible with:

- ARIA labels and descriptions
- Screen reader announcements
- Keyboard-only navigation
- Focus management
- Proper semantic roles
- High contrast support

```html
<x-ui.otp
    wire:model="accessibleOtp" 
    aria-label="Enter verification code"
    aria-description="Enter the 6-digit code sent to your phone"
    placeholder="Accessible OTP input"
/>
```

## Integration Examples

### SMS Verification

```html
<div class="space-y-4">
    <h3 class="text-lg font-semibold">SMS Verification</h3>
    <p class="text-gray-600">Enter the 6-digit code sent to your phone</p>
    
    <x-ui.otp
        wire:model="smsOtp" 
        :input-count="6"
        :auto-submit="true"
        :show-timer="true"
        :timer-duration="300"
        wire:submit="verifySms"
        placeholder="SMS code"
    />
    
    <button wire:click="resendSms" class="text-blue-600 hover:underline">
        Resend code
    </button>
</div>
```

### Email Verification

```html
<div class="space-y-4">
    <h3 class="text-lg font-semibold">Email Verification</h3>
    <p class="text-gray-600">Check your email for the verification code</p>
    
    <x-ui.otp
        wire:model="emailOtp" 
        :input-count="8"
        allowed-pattern="[0-9A-Za-z]"
        :mask-after="2000"
        wire:submit="verifyEmail"
        placeholder="Email code"
    />
</div>
```

### Two-Factor Authentication

```html
<div class="space-y-4">
    <h3 class="text-lg font-semibold">Two-Factor Authentication</h3>
    <p class="text-gray-600">Enter code from your authenticator app</p>
    
    <x-ui.otp
        wire:model="twoFactorOtp" 
        :input-count="6"
        :auto-submit="true"
        :show-timer="true"
        :timer-duration="30"
        timer-format="ss"
        wire:submit="verifyTwoFactor"
        placeholder="2FA code"
    />
</div>
```

### Backup Codes

```html
<div class="space-y-4">
    <h3 class="text-lg font-semibold">Backup Code</h3>
    <p class="text-gray-600">Enter one of your backup codes</p>
    
    <x-ui.otp
        wire:model="backupCode" 
        :input-count="8"
        allowed-pattern="[0-9A-Za-z]"
        style="filled"
        placeholder="Backup code"
    />
</div>
```

## Validation Rules

### Server-Side Validation

```php
// In your Livewire component
public function rules()
{
    return [
        'otpCode' => 'required|string|size:6|regex:/^[0-9]{6}$/',
    ];
}

public function messages()
{
    return [
        'otpCode.required' => 'Please enter the OTP code.',
        'otpCode.size' => 'OTP code must be exactly 6 digits.',
        'otpCode.regex' => 'OTP code must contain only numbers.',
    ];
}
```

### Real-time Validation

```html
<x-ui.otp
    wire:model.live="otpCode" 
    :input-count="6"
    :show-errors="true"
    wire:validation="validateOtp"
    placeholder="Real-time validation"
/>
```

## Security Best Practices

### Rate Limiting

```html
<x-ui.otp
    wire:model="rateLimitedOtp" 
    :max-attempts="3"
    :lockout-duration="300"
    placeholder="Rate limited input"
/>
```

### Session Management

```html
<x-ui.otp
    wire:model="sessionOtp" 
    :session-timeout="600"
    :auto-clear="true"
    placeholder="Session managed"
/>
```

## Component Props

| Prop Name | Type | Default | Required | Description |
|-----------|------|---------|----------|-------------|
| `wire:model` | string | - | Yes | Livewire property to bind to |
| `input-count` | integer | `4` | No | Number of input fields |
| `allowed-pattern` | string | `'[0-9]'` | No | Regex pattern for allowed characters |
| `placeholder` | string | `''` | No | Placeholder text for inputs |
| `size` | string | `'md'` | No | Size variant: `sm`, `md`, `lg` |
| `style` | string | `'outlined'` | No | Visual style: `outlined`, `filled`, `underlined`, `borderless` |
| `disabled` | boolean | `false` | No | Whether the input is disabled |
| `loading` | boolean | `false` | No | Show loading state |
| `success` | boolean | `false` | No | Show success state |
| `error` | boolean | `false` | No | Show error state |
| `auto-submit` | boolean | `false` | No | Auto-submit when complete |
| `auto-focus` | boolean | `true` | No | Auto-focus first input |
| `handle-paste` | boolean | `true` | No | Handle clipboard paste |
| `paste-separator` | string | `''` | No | Character to split pasted content |
| `mask-after` | integer | `0` | No | Milliseconds before masking (0 = no masking) |
| `mask-char` | string | `'•'` | No | Character used for masking |
| `show-timer` | boolean | `false` | No | Show countdown timer |
| `timer-duration` | integer | `300` | No | Timer duration in seconds |
| `timer-format` | string | `'mm:ss'` | No | Timer display format |
| `show-errors` | boolean | `false` | No | Display validation errors |
| `error-message` | string | `''` | No | Custom error message |
| `success-message` | string | `''` | No | Custom success message |
| `loading-text` | string | `'Loading...'` | No | Loading state text |
| `shake-on-error` | boolean | `false` | No | Shake animation on error |
| `auto-clear` | boolean | `false` | No | Auto-clear on session timeout |
| `session-timeout` | integer | `600` | No | Session timeout in seconds |
| `max-attempts` | integer | `null` | No | Maximum input attempts |
| `lockout-duration` | integer | `300` | No | Lockout duration in seconds |
| `autocomplete` | string | `'one-time-code'` | No | Browser autocomplete attribute |
| `aria-label` | string | `'Enter verification code'` | No | ARIA label for accessibility |
| `aria-description` | string | `null` | No | ARIA description |
| `class` | string | `''` | No | Additional CSS classes |

## Events

The component emits several events for integration:

| Event Name | Description | Data |
|------------|-------------|------|
| `otp:complete` | Fired when all inputs are filled | `{value: string}` |
| `otp:change` | Fired when any input changes | `{value: string, index: number}` |
| `otp:clear` | Fired when all inputs are cleared | `{}` |
| `otp:error` | Fired when validation fails | `{error: string}` |
| `otp:success` | Fired when validation succeeds | `{value: string}` |
| `otp:paste` | Fired when content is pasted | `{value: string}` |
| `otp:timeout` | Fired when timer expires | `{}` |

## Browser Support

The component is compatible with:

- Chrome 60+
- Firefox 55+
- Safari 12+
- Edge 79+
- iOS Safari 12+
- Android Browser 81+

## Performance Considerations

- Uses efficient event delegation
- Minimal DOM manipulation
- Optimized for mobile devices
- Lightweight Alpine.js integration
- No external dependencies

## Migration Guide

### From Basic Input

```html
<!-- Before -->
<input type="text" wire:model="otp" placeholder="Enter OTP">

<!-- After -->
<x-ui.otp-input:model="otp" placeholder="Enter OTP" />
```

### From Custom Implementation

```html
<!-- Before -->
<div class="otp-inputs">
    <input type="text" maxlength="1" wire:model="otp1">
    <input type="text" maxlength="1" wire:model="otp2">
    <input type="text" maxlength="1" wire:model="otp3">
    <input type="text" maxlength="1" wire:model="otp4">
</div>

<!-- After -->
<x-ui.otp-input:model="otp" :input-count="4" />
```

## Troubleshooting

### Common Issues

1. **Focus not working**: Ensure Alpine.js is loaded
2. **Paste not working**: Check `handle-paste` prop
3. **Validation errors**: Verify `allowed-pattern` regex
4. **Styling issues**: Check Tailwind CSS classes
5. **Mobile issues**: Test `inputmode` attribute

### Debug Mode

Enable debug mode for development:

```html
<x-ui.otp
    wire:model="debugOtp" 
    :debug="true"
    placeholder="Debug enabled"
/>
```

This comprehensive documentation covers all aspects of the OTP input component, from basic usage to advanced features and integration examples.