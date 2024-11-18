<div 
    x-data 
    class="flex items-center justify-center gap-1"
>
    <button 
        x-on:click="$dispatch('notify',{
            type: 'success',
            content:'this is taost component',
            duration: 4000
        })"
        class="py-2 px-4 bg-white/15 rounded-xl text-white"
    >
    success toast
    </button>
    <button 
        x-on:click="$dispatch('notify',{
            type: 'info',
            content:'this is taost component',
            duration: 4000
        })"
        class="py-2 px-4 bg-white/15 rounded-xl text-white"
    >
    info toast
    </button>
    <button 
        x-on:click="$dispatch('notify',{
            type: 'error',
            content:'this is taost component',
            duration: 4000
        })"
        class="py-2 px-4 bg-white/15 rounded-xl text-white"
    >
    error toast
    </button>
</div>