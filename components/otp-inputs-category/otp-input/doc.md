---
name: "otp-input"
files:
  index: resources/views/components/inputs/otp.blade.php
  usage: resources/views/usage.blade.php
---

# OTP Input Component

When it comes to building secure and user-friendly authentication flows, the OTP (One-Time Password) input component plays a crucial role. This component is designed to provide a seamless experience for users entering verification codes, typically received via email or SMS. The following documentation walks through the functionality and usage of the OTP input component, guiding you through its structure, behavior, and customization.

## Overview

The OTP input component is powered by Alpine.js and provides an intuitive way to collect short numeric codes from users. Whether you're implementing multi-factor authentication or verifying transactions, this component ensures an optimized user experience by automatically focusing on the next input, handling pasting, and managing user input efficiently.

At its core, the component consists of multiple input fields that together form the complete OTP code. By default, the number of input fields is set to four, but this can be easily customized based on requirements.

## Features

- **Auto-focus Navigation:** The component intelligently moves focus to the next input when a digit is entered.
- **Paste Support:** Users can paste the entire OTP code at once, and the component will distribute it across the inputs.
- **Backspace Handling:** Pressing backspace clears the current input and shifts focus to the previous one.
- **Live State Management:** The input state is maintained and updated dynamically to reflect the user's input.

## How It Works

When the OTP input component initializes, it automatically focuses on the first input field, allowing users to start entering their code without any extra clicks. As users type into an input box, the component ensures that:

1. Only single numeric characters are allowed.
2. Input values are limited to one character.
3. The focus shifts to the next input upon successful entry.

Should users paste their OTP code, the component processes the entire string and populates the fields accordingly. If the code is shorter than the available fields, the remaining inputs will stay empty. On the other hand, pressing backspace clears the current field and moves the focus to the previous input, improving user-friendliness.

## Component Structure

Here's how the OTP input component is structured:

```html
@props(['inputCount' => 4])

<div x-data="{
    state: [],
    length: @js($inputCount),
    type: 'text',
    init: function(){
        this.$refs[1].focus();
    },
    handleInput(e, i) {
        const input = e.target;

        if(typeof input.value ==! 'number'){
            return 
        }

        if(input.value.length > 1){
            input.value = input.value.substring(0, 1);
        }

        this.state = Array.from(Array(this.length), (element, i) => {
            const el = this.$refs[(i + 1)];
            return el.value ? el.value : '';
        }).join('');


        if (i < this.length) {
            this.$refs[i+1].focus();
            this.$refs[i+1].select();
        }
    },

    handlePaste(e) {
        const paste = e.clipboardData.getData('text');
        this.value = paste;
        const inputs = Array.from(Array(this.length));

        inputs.forEach((element, i) => {
            this.$refs[i+1].focus();
            this.$refs[i+1].value = paste[i] || '';
        });

        this.state = paste;
    },

    handleBackspace(e) {
        const ref = e.target.getAttribute('x-ref');
        e.target.value = '';
        const previous = ref - 1;
        this.$refs[previous] && this.$refs[previous].focus();
        this.$refs[previous] && this.$refs[previous].select();
        e.preventDefault();
    },
}"
x-modelable="state"
{{ $attributes->whereStartsWith('wire:model') }}
>
<div class="flex justify-between gap-6 pt-3 pb-2 h-16">

    @foreach (range(1, $inputCount) as $column)
        <div class="input-wrapper flex items-center rounded-lg bg-white/5 shadow-sm ring-1 ring-gray-950/10 transition duration-75 focus-within:ring-2 focus-within:ring-violet-600 dark:ring-white/20 dark:focus-within:ring-violet-500'"
        >
            <input
                type="text"
                maxlength="1"
                x-ref="{{ $column }}"
                required
                class="fi-input block w-full border-none text-base text-gray-950 transition duration-75 placeholder:text-gray-400 focus:ring-0 dark:text-white dark:placeholder:text-gray-500 sm:leading-6 bg-white/0 text-center"
                x-on:input="handleInput($event, {{ $column }})"
                x-on:paste="handlePaste($event)"
                x-on:keydown.backspace="handleBackspace($event)"
            />

        </x-div>
    @endforeach
</div>
</div>
```

## Explanation of the Script

- **`init` function:**
  - Automatically focuses on the first input field when the component loads, improving the user experience.

- **`handleInput` function:**
  - Ensures that only a single numeric character is entered into each field.
  - Trims input to one character if more than one is typed.
  - Updates the `state` array with current values of the OTP inputs.
  - Moves the focus to the next field if the current one is filled.

- **`handlePaste` function:**
  - Retrieves the pasted text and splits it into individual characters.
  - Populates the input fields sequentially with the pasted values.
  - Updates the `state` array with the pasted value.

- **`handleBackspace` function:**
  - Clears the current input field.
  - Moves focus to the previous input field when the backspace key is pressed.
  - Prevents the default backspace action to avoid unwanted page navigation.

## Customization

The component allows for easy customization by adjusting the `inputCount` prop to change the number of OTP fields:

```html
<x-inputs.otp inputCount="6" />
```

You can also modify styles, error handling, and Livewire integration as needed.

## Livewire Integration

To capture the OTP value in a Livewire component, bind the state to a Livewire property and let livewire binding with the internal state using `x-modelable` Api:

```php
    <x-inputs.otp 
        inputCount="6" 
        wire:model.live="otp" 
    />
```
This assumes that your Livewire class has an array property defined as:

```php
public string $otp;
```

### Usage Example

here's full card example  uses otp

```html
<div 
    class="max-w-md mx-auto text-center dark:bg-white/5 bg-white px-4 sm:px-8 py-10 rounded-xl shadow"
>
    <header class="mb-8">
        <h1 class="text-2xl font-bold mb-1 text-black dark:text-white">Mobile Phone Verification</h1>
        <p class="text-[15px] text-slate-500 dark:text-slate-300 ">Enter the verification code that was sent to your phone number.</p>
    </header>
    <form x-on:submit.prevent="verify" >
        <x-inputs.otp wire:model.live="otp"/>
        <div class="max-w-[260px] basis-1 mx-auto mt-4">
            <button
                type="button"
                class="w-full inline-flex justify-center whitespace-nowrap rounded-lg bg-violet-500 px-3.5 py-2.5 text-sm font-medium text-white shadow-sm shadow-violet-950/10 hover:bg-violet-600 focus:outline-none focus:ring focus:ring-violet-300 focus-visible:outline-none focus-visible:ring focus-visible:ring-violet-300 transition-colors duration-150"
            >
            Verify Account
        </button>
    </div>
    </form>
</div>
```
## Conclusion

The OTP input component offers a robust solution for collecting short verification codes with an excellent user experience. With features like auto-focus, paste handling, and Alpine.js reactivity, integrating it into your Laravel project is seamless and efficient.

