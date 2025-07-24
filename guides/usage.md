---
name: usage
---

## About Usage

we build fluxtor to be used with typical laravel apps with no bigger js framework, but we're decide to  follow pattern for using fluxtor to be used with livewire and typlical blade (with alpinejs) smoothly. 

we're giving our components a global `state` that needs to be synced with a livewire component, or maybe sent throught the request, and this state is tracked using ``x-model``, or `wire:model`, so in any component you can either of them for your needs and everything will work as expected, but how we did it ? 

first of all caleb porzion was introduced the [`x-modelable`](https://alpinejs.dev/directives/modelable) it's one of the best feature is alpinejs, that help make reusable component and syncing the state easily when using other external `x-model`, or `wire:model`

```html
<div x-data="{ number: 5 }">
    <!-- x-modelable exposed the `count` property and bound it to `number` property -->
    <div x-data="{ count: 0 }" x-modelable="count" x-model="number">
        <button @click="count++">Increment</button>
    </div>
 
    Number: <span x-text="number"></span>
</div>
```
but this modelable api isn't flexible enough in lot of cases, when we want to have more control of the shape of states, so we expose and bound the state manually in two ways binding. 

but before we continue I need to show something 

