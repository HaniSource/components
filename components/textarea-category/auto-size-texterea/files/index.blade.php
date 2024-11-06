@props([
    'rows' => null,
    'name' => null  
])

@php
    $initialHeight = (($rows ?? 10) * 1.5) + 0.75;
@endphp
    <textarea
        x-data="{
        initialHeight: @js($initialHeight) + 'rem',
        height: @js($initialHeight) + 'rem',
        name:@js($name),
        contents: window.Alpine.$persist('').as(this.name + '-value'),

        init() {
            
            {{-- if this inside a livewire component
             this.$watch('contents', () => {
                if (this.contents.length > 0) {
                    this.$wire.$set('form.body', this.contents);
                }
            }); --}}
            this.setInitialHeight();
            this.resize();
            this.setUpResizeObserver();
        },
        setInitialHeight() {
            this.$el.style.height = this.initialHeight;
        },
        resize() {
            this.$el.style.height = 'auto';
            let newHeight = this.$el.scrollHeight + 'px';

            if (this.$el.scrollHeight < parseFloat(this.initialHeight)) {
                this.$el.style.height = this.initialHeight;
            } else {
                this.$el.style.height = newHeight;
            }
        },

        setUpResizeObserver() {
            const observer = new ResizeObserver(() => {
                this.resize();
            });
            observer.observe(this.$el);
        },
    }"  
    {!! $attributes->merge([
    'class' => 'border-white/10 dark:bg-white/5 bg-white dark:text-gray-100 text-gray-900  focus:border-primary focus:ring-primary rounded-md shadow-sm',
        ]) !!}
        x-intersect.once="resize()"
        x-on:input="resize()"
        x-on:resize.window="resize()"
        x-on:keydown="resize()"
        x-model="contents"
        x-modelable="contents"
    ></textarea>
