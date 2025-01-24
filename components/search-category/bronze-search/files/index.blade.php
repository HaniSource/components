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
                    <svg class="mr-3 flex-none" aria-hidden="true" width="24" height="24" fill="none">
                        <path d="m19 19-3.5-3.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <circle cx="11" cy="11" r="6" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"></circle>
                    </svg>Quick search...<span class="ml-auto flex-none pl-3 text-xs font-semibold">Ctrl K</span>
                </button>
            </div>
        </div>
    </x-slot>
    <x-slot:header class="dark:border-gray-800 border-b border-gray-300 px-2">
        <form class="relative flex w-full items-center px-1 py-0.5">
            <label 
                class="dark:text-gray-600 flex items-center justify-center text-gray-400" 
                id="search-label"
                for="search-input"
            >
                <x-icon.search 
                    wire:loading.class="hidden" 
                    size="5" 
                    stroke="3"
                />
                <div 
                    class="hidden" 
                    wire:loading.class.remove="hidden"
                >
                    <x-icon.loading-indicator />
                </div>
            </label>
            <x-search.input />
        </form>
    </x-slot:header>
    <div class="py-2" x-data="bronzeSearch">
        @unless (empty($search))
            <x-search.copper.results :results="$results" />
        @else
            <div
            x-data="{
                handleKeyUp(){
                    focusedEl = $focus.focused()
                    {{-- $focus.getFirst() === $focus.focused() ? document.getElementById('search-input').focus() : $focus.previous(); --}}
                    if($focus.getFirst() === $focus.focused()){
                        document.getElementById('search-input').focus();return
                    }
                    if (focusedEl.hasAttribute('data-action')) {
                        const parentLi = focusedEl.closest('li');
                        if (parentLi) {
                            // If it's the first action button in the li, jump back to the li itself
                            const actions = parentLi.querySelectorAll('[data-action]');
                            if (Array.from(actions).indexOf(focusedEl) === 0) {
                                parentLi.focus();
                                return;
                            }
                        }
                    }
                    $focus.previous()
                },
                handleKeyDown(){
                    focusedEl = $focus.focused() 
                    // get the focused element
                    if(focusedEl.tagName == 'LI'){
                        actions = focusedEl.querySelectorAll('[data-action]');
                        // so we are now focusin the li we need to focus its first action 
                        if(actions.length > 0){
                            actions[0].focus();
                             return;
                        }
                    }
                    $focus.wrap().next(); 
                },
            }"   
            x-on:focus-first-element.window="$focus.first()"
            x-on:keydown.up.stop.prevent="handleKeyUp()"
            x-on:keydown.down.stop.prevent="handleKeyDown()" 
            class="global-search-modal w-full" >
                <template x-if="search_history.length <=0 && favorite_items.length <=0 ">
                    <p class="dark:text-gray-200 w-full p-4 text-center text-gray-700">Please enter a search term to get
                        started.
                    </p>
                </template>
                <template x-if="search_history.length > 0">
                    <div>
                        <div class="top-0 z-10">
                            <h3
                                class="relative flex flex-1 flex-col justify-center overflow-x-hidden text-ellipsis whitespace-nowrap px-4 py-2 text-start text-[0.9em] font-semibold capitalize text-violet-600 dark:text-violet-500   ">
                                Recent
                            </h3>
                        </div>
                        <ul x-animate>
                            <template x-for="(result,index) in search_history">
                                <x-search.copper.summary.item
                                    x-bind:key="index"
                                >
                                    <span x-html="result.title">
                                    </span>
                                    <x-slot:actions>
                                        <x-search.action-button
                                            title="delete"
                                            clickFunction="deleteFromHistory(result.title)"
                                            icon="x"
                                        />
                                        <x-search.action-button
                                            title="favorite this item"
                                            clickFunction="addToFavorites(result.title,result.url)"
                                            icon="favorite"
                                        />
                                    </x-slot:actions>
                                </x-search.copper.summary.item>
                            </template>
                        </ul>
                    
                </div>
            </template>
            <template x-if="favorite_items.length > 0">
                <div>
                    <div class="top-0 z-10">
                        <h3
                            class="relative flex flex-1 flex-col justify-center overflow-x-hidden text-ellipsis whitespace-nowrap px-4 py-2 text-start text-[0.9em] font-semibold capitalize text-violet-600 dark:text-violet-500   ">
                            Favorites
                        </h3>
                    </div>
                    <ul x-animate>
                        <template x-for="(result,index) in favorite_items">
                            <x-search.copper.summary.item
                                x-bind:key="index"
                                x-on:click="addToSearchHistory(result.title,result.url)"
                            >
                                <span x-html="result.title">
                                </span>
                                <x-slot:actions>
                                    <x-search.action-button
                                    title="delete"
                                    clickFunction="deleteFromFavorites(result.title,result.url)"
                                    icon="x"
                                    />
                                </x-slot:actions>
                            </x-search.copper.summary.item>
                        </template>
                    </ul>
            </div>
        </template>
            </div>
        @endunless
    </div>
    <x-slot:footer>
        <x-search.footer />
    </x-slot:footer>
</x-modal>
