<div 
    role="region" 
    x-data="{
        id: $id('accordion'),
        toggle() {
            this.isVisible = !this.isVisible;
        },
        get isVisible() {
            return this.active === this.id
        },
        set isVisible(value) {
            this.active = value ? this.id : null
        },
    }"
    {{ $attributes->merge([
        'class' => 'rounded-lg dark:text-gray-400 text-gray-800 ',
    ]) }}>
    <h2>
        <button
            {{ $question->attributes->merge(['class' => 'flex w-full items-center justify-between px-6 py-4 text-xl font-bold']) }}
            x-on:click="toggle()" x-bind:aria-expanded="isVisible">
            <span >{{ $question }}</span>
            <span class="ml-4" aria-hidden="true" x-show="isVisible">&minus;</span>
            <span class="ml-4" aria-hidden="true" x-show="!isVisible">&plus;</span>
        </button>
    </h2>

    <div style="display: none" x-show="isVisible" x-collapse>
        <div 
            {{ $response->attributes->merge(['class' => 'px-6 pb-4 pt-2']) }}
        >
            {{ $response }}
        </div>
    </div>
</div>
