<div>
    <x-components::toggle 
        wire:model="isPublic"
        notToggledClasses="dark:bg-white/15 bg-white"
        toggledClasses="bg-green-500"
        toggledIconColor="text-green-500"
    >
        <x-slot:label>
            can be public
        </x-slot:label>
        <x-slot:toggled-icon>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 text-green-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
            </svg>              
        </x-slot:toggled-icon>
        <x-slot:not-toggled-icon>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>              
        </x-slot:not-toggled-icon>
    </x-components::toggle>
</div>