@props([
    'closeOnClick' => true,
    'href'=>null,
    'iconable' => false
])
<div role="menuitem" tabindex="-1"
    {{ $attributes->merge([
        'class' => 'dropdown-item cursor-pointer hover:rounded px-2 py-0.5 dark:focus-within:bg-white/5 dark:hover:bg-white/5 hover:bg-white  dark:focus:bg-white/5 focus-within:bg-white hover:bg-white focus:bg-white',
    ]) }}
    x-data="{
        show: false,
        init() {
            $el.addEventListener('click', () => this.isClosedAfterClick())
        },
        isClosedAfterClick() {
            if (@js($closeOnClick)) {
                close();
            }
        }
    }" 
    x-ref="item"
    x-on:mouseenter="show = true" 
    x-on:mouseleave="show = false"
    x-on:keydown.enter.prevent="$el.click()">
    @if (filled($href))
        <a href="{{ $href }}" wire:navigate.hover>
            {{ $slot }}
        </a>
    @else
    <div class="flex items-center justify-between mr-0">
        {{ $slot }}
        @if($iconable)
            <svg class="size-5 text-gray-700 dark:text-gray-400 "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"></path>
            </svg>
        @endif
    </div>
    @endif
</div>
    