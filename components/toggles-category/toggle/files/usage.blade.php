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
    </x-components::toggle>
</div>