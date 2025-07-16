@props([
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'label' => '',
    'placeholder' => null,
    'description' => '',
    'variant' => 'native',
    'error' => '',
    'searchable' => false,
    'filter' => false,
    'multiple' => false,
    'clearable' => false,
    'disabled' => false,
    'icon' => '',
    'iconTrailing' => 'chevron-up-down',
    'invalid' => null,
    'triggerClass' => '',
])

@php

@endphp

<div x-data="{
    search: '',
    open: false,
    isTyping: false,
    isMultiple: @js($multiple),
    isDisabled: @js($disabled),
    isSearchable: @js($searchable),
    selected: @js($multiple) ? [] : null,
    placeholder: @js($placeholder) ?? 'select...',


    get label() {

        if (!this.hasSelection) return this.placeholder;

        if (!this.isMultiple) return this.selected || this.placeholder;

        if (this.selected.length === 1) return this.selected[0];

        return ` ${this.selected.length} items selected`;
    },

    get hasSelection() {
        return this.isMultiple ? this.selected.length > 0 : this.selected !== null;
    },

    isSelected(option) {
        return this.isMultiple ? this.selected.includes(option) : this.selected === option;
    },

    select(option) {
        this.isTyping = false;
        this.search = '';

        if (!this.isMultiple) {
            this.open = false;
            this.selected = option;
            return;
        }

        const itemIndex = this.selected.findIndex(item => item === option);
        if ( itemIndex === -1) {
            this.selected.push(option);
        } else {
            this.selected.splice(itemIndex, 1);
        }

    },

    clear() {
        this.selected = this.isMultiple ? [] : '';
        this.open = false;
    },

    isItemShow(value) {
        if (!this.isSearchable) return true;

        if (!this.isTyping) return true;

        return value.includes(this.search);
    },

    close() {
        this.open = false;
        this.search = '';
        this.isTyping = false;
    },

    toggle() {

        if (this.isDisabled) return;
        this.open = !this.open;
    },
}" @class([
    'relative [--round:--spacing(2)] [--padding:--spacing(1)]',
    'dark:border-red-400! dark:shadow-red-400 text-red-400! placeholder:text-red-400!' => $invalid,
])>
    {{-- trigger --}}
    <div @class(['relative', ' mb-2' => $description])>
        <x-ui.select.trigger />
        <x-ui.select.options>{{ $slot }}</x-ui.select.options>
    </div>

    @if ($description)
        <p data-slot="select-description" class="pl-3 text-sm dark:text-gray-100">{{ $description }}</p>
    @endif
    {{-- dropdown --}}



</div>
