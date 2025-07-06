{{-- dropdown/group.blade.php --}}
@props(['label' => null])

<div {{ $attributes->merge(['class' => 'pt-1 contents']) }}>
    @if($label)
        <div class="text-xs text-start col-span-full px-[calc(--spacing(1.5)_+_var(--dropdown-padding))] font-medium text-gray-500 dark:text-gray-400 tracking-wide">
            {{ $label }}
        </div>
    @endif
    {{ $slot }}
</div>