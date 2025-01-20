<div 
    class="max-w-md mx-auto text-center dark:bg-white/5 bg-white px-4 sm:px-8 py-10 rounded-xl shadow"
>
    <header class="mb-8">
        <h1 class="text-2xl font-bold mb-1 text-black dark:text-white">Mobile Phone Verification</h1>
        <p class="text-[15px] text-slate-500 dark:text-slate-300 ">Enter the verification code that was sent to your phone number.</p>
    </header>
    <form x-on:submit.prevent="verify" >
        <x-inputs.otp wire:model.live="otp"/>
        <div class="max-w-[260px] basis-1 mx-auto mt-4">
            <button
                type="button"
                class="w-full inline-flex justify-center whitespace-nowrap rounded-lg bg-violet-500 px-3.5 py-2.5 text-sm font-medium text-white shadow-sm shadow-violet-950/10 hover:bg-violet-600 focus:outline-none focus:ring focus:ring-violet-300 focus-visible:outline-none focus-visible:ring focus-visible:ring-violet-300 transition-colors duration-150"
            >
            Verify Account
        </button>
    </div>
    </form>
</div>
