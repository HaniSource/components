
@props([
    'disabled' => false,
    'resize' => 'vertical',
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'rows' => null,
    'persist' => null,
    'invalid' => null,
    ])
@php
    $rows ??= 3;

    $initialHeight = (($rows) * 1.5) + 0.75;

    $persist = filled($persistenceKey = $persist && $name ? $name . '-value' : null);

    $classes = [
        'block p-2 w-full text-base sm:text-sm text-gray-800 disabled:text-gray-500 placeholder-gray-400 disabled:placeholder-gray-400/70 dark:text-gray-300 dark:disabled:text-gray-400 dark:placeholder-gray-400 dark:disabled:placeholder-gray-500', // texts colors
        'bg-white dark:bg-white/10 dark:disabled:bg-white/[0.06]', // background
        'disabled:cursor-not-allowed', // cursor handling
        'transition-colors duration-200', // transition handling 
        'shadow-sm disabled:shadow-none border rounded-lg', // shadows
        'focus:ring-2 focus:ring-offset-0 focus:outline-none', // focus state
        'border-gray-300 focus:border-gray-500 focus:ring-gray-500/20 dark:border-gray-600 dark:focus:border-gray-400 dark:focus:ring-gray-400/20'=> !$invalid, //  focus state handling  
        'border-red-500 focus:border-red-500 focus:ring-red-500/20 dark:border-red-400 dark:focus:border-red-400 dark:focus:ring-red-400/20' => $invalid, // invalid focus state handling 
        match ($resize) {
            'none' => 'resize-none',
            'both' => 'resize',
            'horizontal' => 'resize-x',
            'vertical' => 'resize-y',
        }, 
    ];
@endphp


<textarea
    x-data="{
        initialHeight: @js($initialHeight) + 'rem',
        height: @js($initialHeight) + 'rem',
        name: @js($name),
        contents: @js($persist) ? window.Alpine.$persist('').as(@js($persistenceKey)) : '',
        resize() {
            if (!this.$el) return;
            this.$el.style.height = 'auto';
            let newHeight = this.$el.scrollHeight + 'px';

            if (this.$el.scrollHeight < parseFloat(this.initialHeight)) {
                this.$el.style.height = this.initialHeight;
            } else {
                this.$el.style.height = newHeight;
            }
        }
    }"  
    x-init="
        if(!this.$el) return;
        // give our textarea initial height based on the provided rows 
        this.$el.style.height = this.initialHeight;

        const observer = new ResizeObserver(() => {
            this.resize();
        });

        observer.observe(this.$el);
    "
    {{ $attributes->class(Arr::toCssClasses($classes)) }}
    @disabled($disabled)
    @if ($invalid) aria-invalid="true" data-slot="invalid" @endif
    data-slot="textarea"
    x-intersect.once="resize()"
    rows={{ $rows }}
    x-on:input="resize()"
    x-on:resize.window="resize()"
    x-on:keydown="resize()"
    x-model="contents"
    x-modelable="contents"
></textarea>

