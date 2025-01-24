<x-modal>
    <x-slot:trigger>
        <div 
            class="flex items-center w-60  justify-center" 
        >
            <div class="pointer-events-auto  relative bg-white dark:bg-black rounded-lg">
                <button
                    class="hidden w-full items-center rounded-lg py-1.5 pl-2 pr-3 text-sm leading-6 text-slate-400 shadow-sm ring-2  ring-purple-500/15 hover:ring-purple-500 transition-all duration-300 dark:hover:bg-[#02031C] lg:flex"
                    type="button"
                >
                <x-icon.search 
                    size="5"
                    class="mr-3"
                    stroke="3"
                />Quick search...<span class="ml-auto flex-none pl-3 text-xs font-semibold">Ctrl K</span>
                </button>
            </div>
        </div>
    </x-slot>
    <x-slot:header class="border-b border-gray-300 dark:border-gray-800 px-2">
        <form 
            class="relative flex w-full items-center px-1 py-0.5"
        >
            <label 
                class="flex items-center justify-center text-gray-400 dark:text-gray-600"
                id="search-label" 
                for="search-input"
            >
                <x-icon.search 
                    wire:loading.class="hidden" 
                    size="5"
                    stroke="3"
                />
                <div class="hidden" wire:loading.class.remove="hidden">
                    <x-icon.loading-indicator />
                </div>
            </label>
            <x-search.input/>
        </form>
    </x-slot:header>
        <div class="py-2">
            @unless(empty($search))
                <x-search.results :results="$results"/>
            @else
                <div class="w-full global-search-modal">
                    <p class="text-gray-700 p-4 dark:text-gray-200 w-full text-center">Please enter a search term to get started.
                    </p>
                </div>
            @endunless  
        </div>
    <x-slot:footer>
        <x-search.footer/>        
    </x-slot:footer>
</x-modal>

