@props(['label'=>null])
<div
    x-data="{
        value: null,
        check(option) { 
            this.value = option
        },
        checked(option) { return this.value === option },
        shouldHaveFocus(option, el) {
            if (this.value === null && Array.from(el.parentElement.children).indexOf(el) === 0) return true;
            return this.checked(option)
        },
        checkNext(e) {
            let el = e.target
            let siblings = Array.from(el.parentElement.children)
            let index = siblings.indexOf(el)
            let next = siblings[index === siblings.length - 1 ? 0 : index + 1]

            next.click(); next.focus();
        },
        checkPrevious(e) {
            let el = e.target
            let siblings = Array.from(el.parentElement.children)
            let index = siblings.indexOf(el)
            let previous = siblings[index === 0 ? siblings.length - 1 : index - 1]

            previous.click(); previous.focus();
        },
    }"
    x-on:keydown.down.stop.prevent="checkNext"
    x-on:keydown.right.stop.prevent="checkNext"
    x-on:keydown.up.stop.prevent="checkPrevious"
    x-on:keydown.left.stop.prevent="checkPrevious"
    x-modelable="value"
    {{ $attributes->whereStartsWith('wire:model') }} {{-- for linking the wire:model with x-modelable --}}
    x-bind:aria-labelledby="$id('radio-group-label')"
    x-id="['radio-group-label']"
    role="radiogroup"
    class="w-full"
    >
    @if (filled($label))
        <label 
            x-bind:id="$id('radio-group-label')" 
            role="none" 
            class="hidden">
            {{ $label }} 
            <span 
                x-text="value"
            >
            </span>
        </label>
    @endif
    <div
        {{ $attributes }}
    >
        {{ $slot }}
    </div>
</div>