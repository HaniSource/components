<div 
    x-data 
    class="flex items-center justify-center gap-1"
>
    <button 
        x-on:click="$dispatch('notify',{
            type: 'success',
            content:'this is a sucess taost',
            duration: 4000
        })"
        class="py-2 px-4  bg-green-500/15 rounded-xl dark:text-white text-green-500"
    >
    success toast
    </button>
    <button 
        x-on:click="$dispatch('notify',{
            type: 'info',
            content:'this is an info taost',
            duration: 4000
        })"
        class="py-2 px-4 dark:bg-white/10 bg-white rounded-xl dark:text-white text-gray-500"
    >
    info toast
    </button>
    <button 
        x-on:click="$dispatch('notify',{
            type: 'error',
            content:'this is an error taost',
            duration: 4000
        })"
        class="py-2 px-4  bg-red-500/15 rounded-xl dark:text-white text-red-500"
    >
    error toast
    </button>
</div>