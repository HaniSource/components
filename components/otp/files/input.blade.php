@aware(['type' => 'text'])
@php
$classes = [
    '[:where(&:first-child)]:rounded-l-box [:where(&:last-child)]:rounded-r-box', // default rounding with zero specificity, allows external classes to override without !
    'text-center text-base max-w-12 w-full h-12',
    'bg-white dark:bg-neutral-900', // subtle background
    'text-neutral-900 dark:text-neutral-100 placeholder:text-neutral-400 dark:placeholder:text-neutral-500',
    'border border-black/10 dark:border-white/10', // base border
    'focus:outline-none focus:ring-0 focus:border-2 focus:border-white/15 ',
    'transition duration-300 ease-in-out',
    'shadow-sm'
];
@endphp

<input
    {{ $attributes->class($classes) }}
    type="text"
    maxlength="1"
    required
    data-slot="otp-input"
    x-on:input="handleInput($el)"
    x-on:keydown.enter="handleInput($el)"
    x-on:paste="handlePaste($event)"
    x-on:keydown.backspace="handleBackspace($event)"
    {{-- accessibilty addons --}}
    autocomplete="one-time-code"
    x-on:keydown.right="$focus.within($refs.inputsWrapper).next()"
    x-on:keydown.up="$focus.within($refs.inputsWrapper).next()"
    x-on:keydown.left="$focus.within($refs.inputsWrapper).prev()"
    x-on:keydown.down="$focus.within($refs.inputsWrapper).prev()"
/>
