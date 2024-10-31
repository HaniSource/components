<div>
    <x-components::toggle 
        wire:model="isSelected"
        notToggledClasses="dark:bg-white/15 bg-white"
        toggledClasses="bg-green-500"
        toggledIconColor="text-green-500"
    >
        <x-slot:label>
            can be visible
        </x-slot:label>
    </x-components::toggle>
</div>