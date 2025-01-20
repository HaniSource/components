@props(['inputCount' => 4])

<div x-data="{
    state: [],
    length: @js($inputCount),
    type: 'text',
    init: function(){
        this.$refs[1].focus();
    },
    handleInput(e, i) {
        const input = e.target;

        if(typeof input.value ==! 'number'){
            return 
        }

        if(input.value.length > 1){
            input.value = input.value.substring(0, 1);
        }

        this.state = Array.from(Array(this.length), (element, i) => {
            const el = this.$refs[(i + 1)];
            return el.value ? el.value : '';
        }).join('');


        if (i < this.length) {
            this.$refs[i+1].focus();
            this.$refs[i+1].select();
        }
    },

    handlePaste(e) {
        const paste = e.clipboardData.getData('text');
        this.value = paste;
        const inputs = Array.from(Array(this.length));

        inputs.forEach((element, i) => {
            this.$refs[i+1].focus();
            this.$refs[i+1].value = paste[i] || '';
        });

        this.state = paste;
    },

    handleBackspace(e) {
        const ref = e.target.getAttribute('x-ref');
        e.target.value = '';
        const previous = ref - 1;
        this.$refs[previous] && this.$refs[previous].focus();
        this.$refs[previous] && this.$refs[previous].select();
        e.preventDefault();
    },
}"
x-modelable="state"
{{ $attributes->whereStartsWith('wire:model') }}
>
<div class="flex justify-between gap-6 pt-3 pb-2 h-16">

    @foreach (range(1, $inputCount) as $column)
        <div class="input-wrapper flex items-center rounded-lg bg-white/5 shadow-sm ring-1 ring-gray-950/10 transition duration-75 focus-within:ring-2 focus-within:ring-violet-600 dark:ring-white/20 dark:focus-within:ring-violet-500'"
        >
            <input
                type="text"
                maxlength="1"
                x-ref="{{ $column }}"
                required
                class="fi-input block w-full border-none text-base text-gray-950 transition duration-75 placeholder:text-gray-400 focus:ring-0 dark:text-white dark:placeholder:text-gray-500 sm:leading-6 bg-white/0 text-center"
                x-on:input="handleInput($event, {{ $column }})"
                x-on:paste="handlePaste($event)"
                x-on:keydown.backspace="handleBackspace($event)"
            />

        </x-div>
    @endforeach
</div>
</div>