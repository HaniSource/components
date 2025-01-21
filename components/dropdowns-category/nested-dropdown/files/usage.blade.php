<x-dropdown>
    <x-slot:button class="dark:bg-white/10 bg-white">
        frameworks
    </x-slot:button>
    <x-slot:items>
        <x-dropdown.item>
            Tailwind
        </x-dropdown.item>
        <x-dropdown.item>
            AlpineJs
        </x-dropdown.item>
        <x-dropdown.item>
            Laravel
        </x-dropdown.item>
        <x-dropdown.item iconable>
            livewire 
            <x-dropdown.sub-items>
                <x-dropdown.item>
                    Full SPA 
                </x-dropdown.item>
                <x-dropdown.item>
                    easy uploading 
                </x-dropdown.item>
                <x-dropdown.item>
                    lazy loading
                </x-dropdown.item>
                </x-dropdown.sub-item>
        </x-dropdown.item>
        <x-dropdown.item iconable>
            inertia 
            <x-dropdown.sub-items>
                <x-dropdown.item>
                    scroll management
                </x-dropdown.item>
                <x-dropdown.item>
                    shared data
                </x-dropdown.item>
                <x-dropdown.item>
                    ssr
                </x-dropdown.item>
            </x-dropdown.sub-item>
        </x-dropdown.item>
    </x-slot:items>
    </x-dropdown>
