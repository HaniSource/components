---
name: usage
---

## About Usage

we build fluxtor to be used with typical laravel apps with no bigger js framework, but we're decide to  follow pattern for using fluxtor to be used with livewire and typlical blade (with alpinejs) smoothly. 

### With Livewire
all our dynamic component can be integrated with livewire using the same manner

```html
<x-ui.key-value 
    wire:model="configurations" 
/>
```

### Theory
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

but before we continue I need to show something, if we dig deeper into livewire source code, `wire:model` is just `x-model` using `Alpine.bind()` utility, you can see it yourself [here](https://github.com/livewire/livewire/blob/main/js/directives/wire-model.js#L50)

so each time you see `wire:model` is just a typical `x-model` with some ingredients.

when alpine has a `x-model` directive it's `$el` magic hold a `_x_model` property for that `x-model`, and we can accessing and changes it programmaticaly even with no input dom elements 

- we can get the given value to that x-model using `$el._x_model.get()` 
- and changes it using  `$el._x_model.set()`

### Example 

if we check our [key value](/docs/key-value) component we initialize the state using 

```html
<div
    x-data="{
        state: [],
        ....
        init(){
            this.$nextTick(()=>{
                {+this.state = this.$root._x_model?.get() ?? [];+}
                ....
            })
            Alpine.effect(()=> {
                {+this.$root?._x_model?.set(this.state);+}
            })
        },
        ....
    }"
>
```
as we say at first we check if our external bindings has any initial state to use, and we listen to any changes to the global state `this.state` related the  component `Alpine.effect(()=> {})` then we sync our external state (`x-model` or `wire:model`) using `this.$root?._x_model?.set(this.state)` so like this we have better controle of we expose the state of the component to ouside 
