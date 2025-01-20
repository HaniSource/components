<div 
    x-data="{
        isShown: false,
        init(){
            $nextTick(()=>{
                this.inputElement = this.$el.querySelector('input[type=password]');
            })
        },
        toggle() {
            this.isShown = !this.isShown;
            if (this.inputElement) {
                this.inputElement.type = this.isShown ? 'text' : 'password';
            }
        }
    }"
    class="input-wrapper flex rounded-lg bg-white/5 shadow-sm ring-1 ring-gray-950/10 transition duration-75 focus-within:ring-2 focus-within:ring-violet-600 dark:ring-white/20 dark:focus-within:ring-violet-500">
    {{ $slot }}
    <div class="flex items-center gap-x-3 border-s pe-3 ps-3 text-gray-400 dark:border-white/10">
        <button type="button" x-show="!isShown" style="display: none" x-on:click.stop="toggle()" class="ml-2">
            <x-icon.eye />
        </button>
        <button type="button" x-show="isShown" style="display: none" x-on:click.stop="toggle()" class="ml-2">
            <x-icon.eye-slash />
        </button>
    </div>
</div>
