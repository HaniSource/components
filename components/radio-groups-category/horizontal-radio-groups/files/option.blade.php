@props([
    'value', 
    'classChecked' => '',
    'classNotChecked' => ''
])
<div
    x-data="{ 
        option: '{{ $value }}',
        importantClasses(classes) {
            return classes.split(' ').map(className => {
                return className.startsWith('!') ? className : '!' + className;
            }).join(' ');
        }
    }"
    x-on:click="check(option)"
    x-on:keydown.enter.stop.prevent="check(option)"
    x-on:keydown.space.stop.prevent="check(option)"
    x-bind:aria-checked="checked(option)"
    x-bind:tabindex="shouldHaveFocus(option, $el) ? 0 : -1"
    x-bind:aria-labelledby="$id('radio-option-label')"
    x-bind:aria-describedby="$id('radio-option-label')"
    x-id="['radio-option-label']"
    role="radio"
    {{ $attributes->merge([
        'class'=>"flex cursor-pointer rounded-xl font-semibold p-4 shadow"
    ]) }}
    x-bind:class="{ 
        [importantClasses('{{ $classChecked }}')]: checked(option),
        [importantClasses('{{ $classNotChecked }}')]: !checked(option)
    }"
>
    <div 
       
        x-bind:id="$id('radio-option-label')"
    >
            {{ $slot }}
    </div>
</div>