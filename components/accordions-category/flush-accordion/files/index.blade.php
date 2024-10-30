<div 
    x-data="{ active: null }" 
    {{ $attributes->merge([
        'class'=>"w-full min-h-fit space-y-4 rounded-xl pb-4"
    ]) }}
>
    {{ $slot }}
</div>