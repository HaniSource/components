---
name: button
---

## Introduction
the `button` component here to save from creating a big button element each time you want a button  

@blade
<x-demo>
    <x-ui.button>
        click
    </x-ui.button>    
    <x-ui.button variant="ghost" >
        click
    </x-ui.button>
    <x-ui.button variant="outline">
        click
    </x-ui.button>
    <x-ui.button class="filled">
        click
    </x-ui.button>
    <x-ui.button class="danger">
        click
    </x-ui.button>    
</x-demo>
@endblade

## Customization

you can customize the size, variant, color... for buttons components


### Sizes 

button components uses `md` size as default but you can change that to feet your needs


### Colors
colors are available for primary buttons

@blade
<x-demo>
    <div class="grid grid-cols-6 gap-4">
    {{-- test colors on primary variants --}}
    <x-ui.button color="zinc">Zinc</x-ui.button>
    <x-ui.button color="red">Red</x-ui.button>
    <x-ui.button color="orange">Orange</x-ui.button>
    <x-ui.button color="amber">Amber</x-ui.button>
    <x-ui.button color="yellow">Yellow</x-ui.button>
    <x-ui.button color="lime">Lime</x-ui.button>
    <x-ui.button color="green">Green</x-ui.button>
    <x-ui.button color="emerald">Emerald</x-ui.button>
    <x-ui.button color="teal">Teal</x-ui.button>
    <x-ui.button color="cyan">Cyan</x-ui.button>
    <x-ui.button color="sky">Sky</x-ui.button>
    <x-ui.button color="blue">Blue</x-ui.button>
    <x-ui.button color="indigo">Indigo</x-ui.button>
    <x-ui.button color="violet">Violet</x-ui.button>
    <x-ui.button color="purple">Purple</x-ui.button>
    <x-ui.button color="fuchsia">Fuchsia</x-ui.button>
    <x-ui.button color="pink">Pink</x-ui.button>
    <x-ui.button color="rose">Rose</x-ui.button>
    </div>  
</x-demo>
@endblade

### Variants 

### Icons 