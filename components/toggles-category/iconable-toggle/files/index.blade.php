@props([
    'toggledClasses' => null,
    'notToggledClasses' => null,
    'toggledIcon' => null,  
    'notToggledIcon' => null,   
])
<div
    x-data="{ 
        value: false,
        toggle() {
            this.value = !this.value;
        },
        isToggled(){
            return this.value === true;
        },
        handleClick(){
            btn = this.$refs.btn;
            btn.click();
            btn.focus();
        }
    }"
    x-modelable="value"
    {{ $attributes->merge(['class'=>'flex items-center justify-center']) }}
    x-id="['toggle-label']"
    >
        @if (filled($label))
            <label
                x-on:click="handleClick()"
                x-bind:id="$id('toggle-label')"
                {{ $label->attributes->merge(['class'=>'text-gray-900 dark:text-gray-100 font-medium']) }}
            >
                {{ $label }}
            </label>

        @endif
        <button
            x-ref="btn"
            x-on:click="toggle()"
            type="button"
            role="switch"
            x-bind:aria-checked="value"
            x-bind:aria-labelledby="$id('toggle-label')"
            x-bind:class="{
                '{{ $toggledClasses }}':isToggled(),
                '{{ $notToggledClasses }}':!isToggled(),
            }"
            class="relative ml-4 inline-flex w-14 rounded-full py-1 transition"
        >
            <span
                x-bind:class="value ? 'translate-x-7' : 'translate-x-1'"
                class="bg-gray-200 h-6 w-6 rounded-full flex items-center justify-center transition duration-300 shadow-md"
                aria-hidden="true"
            >
            @if (filled($toggledIcon))
                <span {{ $toggledIcon
                            ->attributes
                            ->merge(['class'=>' text-gray-400'])
                            ->merge(['style'=>'display:none;'])
                    }} 
                    x-show="isToggled()" 
                >
                    {{ $toggledIcon }}
                </span>
            @endif
            @if (filled($notToggledIcon))
                <span {{ $notToggledIcon
                            ->attributes
                            ->merge(['class'=>'   text-gray-400'])
                            ->merge(['style'=>'display:none;'])
                    }} 
                    x-show="!isToggled()" 
                >
                    {{ $notToggledIcon }}
                </span>
            @endif
            </span>
        </button>
</div>